<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Wedding;
use App\Models\WeddingDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WeddingController extends Controller
{
    public function showInvitation($wedding_id, $groom, $bride, $guest)
    {
        $wedding = Wedding::where('id', $wedding_id)
            ->where('bride_name', $bride)
            ->where('groom_name', $groom)
            ->firstOrFail();
        $guest = Guest::where('name', $guest)
            ->where('wedding_id', $wedding->id)
            ->firstOrFail();
        $weddingDetail = WeddingDetail::where('wedding_id', $wedding_id)->firstOrFail();
        return view('weddings.show', compact('wedding', 'guest', 'weddingDetail'));
    }
}
