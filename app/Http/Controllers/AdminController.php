<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\User;
use App\Models\Wedding;
use App\Models\WeddingDetail;
use App\Models\Weddings;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addNewGuest($wedding_id, Request $request)
    {
        $wedding = Wedding::where('id', $wedding_id)->firstOrFail();
        if ($request->isMethod('post')) {
            $request->validate([
                "guestName" => "required|string",
            ]);

            $weddingLink = "/" . $wedding_id . "/" . $wedding->groom_name . "And" . $wedding->bride_name . "/" . $request->guestName;
            $guest = Guest::create([
                'wedding_id' => $wedding_id,
                'attending_status' => "pending",
                'name' => $request->guestName,
                'message' => null,
                'wedding_link' => $weddingLink,
                'number_of_people' => 4,
            ]);
        }
        return view('admin.addNewGuest', compact('wedding'));
    }

    public function adminDashboard()
    {
        $totalWeddings = Wedding::count();
        $recentlyAddedWeddings = Wedding::where('created_at', '>=', now()->subMonth())->count();
        $recentActivities = $this->getRecentActivities();

        return view('admin.dashboard', compact('totalWeddings', 'recentlyAddedWeddings', 'recentActivities'));
    }

    private function getRecentActivities()
    {
        $recentUpdates = WeddingDetail::orderBy('updated_at', 'desc')->limit(5)->get();

        $activities = [];

        foreach ($recentUpdates as $update) {
            if ($update->wedding_id) {
                $wedding = Wedding::where('id', $update->wedding_id)->firstOrFail();
                $activities[] = [
                    'date' => $update->updated_at->format('Y-m-d H:i'),
                    'description' => "Wedding details updated for: {$wedding->groom_name} & {$wedding->bride_name}",
                ];
            } else {
                $activities[] = [
                    'date' => $update->updated_at->format('Y-m-d H:i'),
                    'description' => "Wedding details updated for an unknown wedding",
                ];
            }
        }
        usort($activities, function ($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });
        return array_slice($activities, 0, 10);
    }


    function weddingList()
    {
        $weddings = Wedding::all();
        return view('admin.wedding.weddingList', compact('weddings'));
    }

    function allGuests()
    {
        $weddings = Wedding::all();
        return view('admin.guests.allGuests', compact('weddings'));
    }

    public function addWedding(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                "bride_name" => "required|min:1|string",
                "bride_lastname" => "required|min:1|string",
                "groom_name" => "required|min:1|string",
                "groom_lastname" => "required|min:1|string",
                "username" => "required|unique:Users|string",
                "password" => "required",
            ]);

            $wedding = Wedding::create([
                "bride_name" => $request->bride_name,
                "groom_name" => $request->groom_name,

                "bride_lastname" => $request->bride_lastname,
                "groom_lastname" => $request->groom_lastname,
            ]);

            $weddingDetails = WeddingDetail::create([
                'wedding_id' => $wedding->id,
            ]);

            $user = User::create([
                "username" => $request->username,
                "password" => $request->password,
                "wedding_id" => $wedding->id,
                "role" => "admin"
            ]);
        }

        return view('admin.wedding.addWedding');
    }
}
