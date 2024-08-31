<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guest;

class AdminApi extends Controller
{
    public function getGuests(Request $request)
    {
        $weddingId = $request->input('wedding_id');
        $timeframe = $request->input('timeframe');

        $query = Guest::where('wedding_id', $weddingId);

        if ($timeframe) {
            $date = $this->getDateRange($timeframe);
            $query->whereBetween('status_changed', [$date['start'], $date['end']]);
        }

        $guestCount = $query->count();
        return response()->json([
            'wedding_id' => $weddingId,
            'guest_count' => $guestCount,
            'date' => $date,
            'query' => $query->toSql()
        ]);
    }

    private function getDateRange($timeframe)
    {
        $now = Carbon::now();
        switch ($timeframe) {
            case 'today':
                return ['start' => $now->format('Y-m-d'), 'end' => $now->format('Y-m-d')];
            case 'last_week':
                return [
                    'start' => $now->subDays(7)->format('Y-m-d'),
                    'end' => Carbon::now()->format('Y-m-d')  // Resetting $now to today's date
                ];
            case 'last_month':
                return [
                    'start' => $now->subDays(30)->format('Y-m-d'),
                    'end' => Carbon::now()->format('Y-m-d')  // Resetting $now to today's date
                ];
            default:
                return ['start' => $now->format('Y-m-d'), 'end' => $now->format('Y-m-d')];
        }
    }
}
