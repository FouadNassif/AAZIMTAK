<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Guest;
use App\Models\Wedding;
use App\Models\UserImage;
use Illuminate\Http\Request;
use App\Models\WeddingDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminApi extends Controller
{
    public function adminDashboard()
    {
        try {
            // Wedding Statistics
            $weddingStats = [
                'totalWeddings' => Wedding::count(),
                'upcomingWeddings' => WeddingDetail::where('wedding_date', '>=', now())->count(),
                'totalGuests' => Guest::count(),
                'monthlyWeddings' => WeddingDetail::whereMonth('wedding_date', now()->month)->count(),
            ];

            // Guest Response Statistics
            $guestResponses = [
                'attending' => Guest::where('attending_status', 'yes')->count(),
                'notAttending' => Guest::where('attending_status', 'no')->count(),
                'pending' => Guest::where('attending_status', 'maybe')->count(),
            ];

            // Upcoming Weddings
            $upcomingWeddings = Wedding::select('weddings.*', 'wedding_details.wedding_date', 'wedding_details.ceremony_city')
                ->join('wedding_details', 'weddings.id', '=', 'wedding_details.wedding_id')
                ->where('wedding_details.wedding_date', '>=', now())
                ->orderBy('wedding_details.wedding_date')
                ->take(5)
                ->get()
                ->map(function ($wedding) {
                    return [
                        'id' => $wedding->id,
                        'bride_name' => $wedding->bride_name,
                        'groom_name' => $wedding->groom_name,
                        'wedding_date' => $wedding->wedding_date,
                        'ceremony_city' => $wedding->ceremony_city,
                        'guest_count' => Guest::where('wedding_id', $wedding->id)->count(),
                    ];
                });

            // Recent Guest Updates
            $recentGuestUpdates = Guest::with('wedding')
                ->whereNotNull('status_changed')
                ->orderBy('status_changed', 'desc')
                ->take(5)
                ->get()
                ->map(function ($guest) {
                    return [
                        'id' => $guest->id,
                        'name' => $guest->name,
                        'attending_status' => $guest->attending_status,
                        'number_of_people' => $guest->number_of_people,
                        'number_of_kids' => $guest->number_of_kids,
                        'status_changed' => $guest->status_changed,
                        'wedding_name' => $guest->wedding->bride_name . ' & ' . $guest->wedding->groom_name,
                    ];
                });

            // City Distribution
            $cityDistribution = WeddingDetail::select('ceremony_city', DB::raw('count(*) as count'))
                ->whereNotNull('ceremony_city')
                ->groupBy('ceremony_city')
                ->orderBy('count', 'desc')
                ->take(5)
                ->get();

            // System Statistics
            $systemStats = [
                'activeSessions' => DB::table('sessions')->count(),
                'totalUsers' => User::count(),
                'totalImages' => UserImage::count(),
                'storageUsed' => $this->calculateStorageUsed(),
            ];

            return response()->json([
                'status' => true,
                'weddingStats' => $weddingStats,
                'guestResponses' => $guestResponses,
                'upcomingWeddings' => $upcomingWeddings,
                'recentGuestUpdates' => $recentGuestUpdates,
                'cityDistribution' => $cityDistribution,
                'systemStats' => $systemStats,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error fetching dashboard data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getGuests(Request $request)
    {
        try {
            $weddingId = $request->input('wedding_id');
            $timeframe = $request->input('timeframe');

            $query = Guest::where('wedding_id', $weddingId);

            if ($timeframe) {
                $date = $this->getDateRange($timeframe);
                $query->whereBetween('status_changed', [$date['start'], $date['end']]);
            }

            $guests = $query->get();
            $guestCount = $guests->count();

            return response()->json([
                'status' => true,
                'wedding_id' => $weddingId,
                'guest_count' => $guestCount,
                'guests' => $guests,
                'timeframe' => $timeframe ? $date : null
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error fetching guests',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function addWedding(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'bride_name' => 'required|string|min:1',
                'bride_lastname' => 'required|string|min:1',
                'groom_name' => 'required|string|min:1',
                'groom_lastname' => 'required|string|min:1',
                'username' => 'required|string|unique:users',
                'password' => 'required|string|min:6',
            ]);

            DB::beginTransaction();

            $wedding = Wedding::create([
                'bride_name' => $validatedData['bride_name'],
                'bride_lastname' => $validatedData['bride_lastname'],
                'groom_name' => $validatedData['groom_name'],
                'groom_lastname' => $validatedData['groom_lastname'],
            ]);

            WeddingDetail::create([
                'wedding_id' => $wedding->id,
            ]);

            $user = User::create([
                'username' => $validatedData['username'],
                'password' => bcrypt($validatedData['password']),
                'wedding_id' => $wedding->id,
                'role' => 'client',
            ]);

            for ($i = 2; $i <= 6; $i++) {
                $maxPositions = ($i === 6) ? 5 : $i;
                for ($j = 1; $j <= $maxPositions; $j++) {
                    UserImage::create([
                        'user_id' => $user->id,
                        'path' => $this->randomDefaultImage(),
                        'layout' => $i,
                        'position' => $j,
                    ]);
                }
            }


            for ($j = 1; $j <= 5; $j++) {
                UserImage::create([
                    'user_id' => $user->id,
                    'path' => $this->randomDefaultImage(),
                    'layout' => 5, // Another 5 layout
                    'position' => $j,
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Wedding created successfully',
                'wedding_id' => $wedding->id
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Error creating wedding',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    private function randomDefaultImage()
    {
        return "default_wedding_images/Default" . random_int(1, 5) . ".jpg";
    }

    private function getDateRange($timeframe)
    {
        $now = Carbon::now();

        return match ($timeframe) {
            'today' => [
                'start' => $now->startOfDay()->format('Y-m-d H:i:s'),
                'end' => $now->endOfDay()->format('Y-m-d H:i:s')
            ],
            'last_week' => [
                'start' => $now->subWeek()->startOfDay()->format('Y-m-d H:i:s'),
                'end' => Carbon::now()->endOfDay()->format('Y-m-d H:i:s')
            ],
            'last_month' => [
                'start' => $now->subMonth()->startOfDay()->format('Y-m-d H:i:s'),
                'end' => Carbon::now()->endOfDay()->format('Y-m-d H:i:s')
            ],
            default => [
                'start' => $now->startOfDay()->format('Y-m-d H:i:s'),
                'end' => $now->endOfDay()->format('Y-m-d H:i:s')
            ]
        };
    }

    private function calculateStorageUsed()
    {
        try {
            // Calculate total storage used by images
            $totalBytes = UserImage::sum(DB::raw('CHAR_LENGTH(path)'));

            // Convert to appropriate unit
            $units = ['B', 'KB', 'MB', 'GB'];
            $bytes = max($totalBytes, 0);
            $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
            $pow = min($pow, count($units) - 1);

            $bytes /= pow(1024, $pow);

            return round($bytes, 2) . ' ' . $units[$pow];
        } catch (\Exception $e) {
            return '0 B';
        }
    }

    public function getAllWeddings()
    {
        return response()->json([
            "weddings" => Wedding::all(),
        ]);
    }
}
