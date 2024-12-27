<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guest;
use App\Models\Wedding;
use App\Models\WeddingImage;
use Illuminate\Http\Request;
use App\Models\WeddingDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod("POST")) {
            $credentials = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                return redirect()->intended('/');
            } else {
                return back()->withErrors(['email' => 'Invalid Email or password']);
            }
        }
        return view('aazimtak.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function allGuest()
    {
        return view('user.allGuest');
    }

    public function showDashboard()
    {
        $user = Auth::user();
        $guests = Guest::where('wedding_id', $user->wedding_id)->get();
        $weddingId = Wedding::where('id', $user->wedding_id)->get('id');

        // Count guests by status
        $attendingCount = $guests->where('attending_status', 'attending')->count();
        $notAttendingCount = $guests->where('attending_status', 'not attending')->count();
        $pendingCount = $guests->where('attending_status', 'pending')->count();

        // Calculate total guests
        $totalPeople = $guests->sum('number_of_people');
        $totalKids = $guests->sum('number_of_kids');
        $totalGuests = $totalPeople + $totalKids;
        $totalGuest = $guests->count();

        // Calculate percentages
        $attendingPercentage = $totalGuests ? ($attendingCount / $totalGuests) * 100 : 0;
        $pendingPercentage = $totalGuests ? ($pendingCount / $totalGuests) * 100 : 0;
        $notAttendingPercentage = $totalGuests ? ($notAttendingCount / $totalGuests) * 100 : 0;

        // Calculate percentages for people and kids
        $peoplePercentage = $totalGuests ? ($totalPeople / $totalGuests) * 100 : 0;
        $kidsPercentage = $totalGuests ? ($totalKids / $totalGuests) * 100 : 0;

        return view('user.dashboard', compact(
            'weddingId',
            'attendingCount',
            'notAttendingCount',
            'pendingCount',
            'attendingPercentage',
            'pendingPercentage',
            'notAttendingPercentage',
            'peoplePercentage',
            'kidsPercentage',
            'totalPeople',
            'totalKids',
            'totalGuests',
            'totalGuest'
        ));
    }


    public function filterGuestsByStatus(Request $request)
    {
        $status = $request->input('status');
        $user = Auth::user();

        $query = Guest::where('wedding_id', $user->wedding_id);

        if ($status) {
            $query->where('attending_status', $status);
        }

        $guests = $query->get();

        return response()->json(['guests' => $guests]);
    }


    public function addGuest(Request $request)
    {
        if ($request->isMethod("POST")) {
            $request->validate([
                'name' => 'required|string',
                'num_of_people' => 'required|integer',
                'num_of_kids' => 'required|integer',
            ]);

            $user = Auth::user();
            $wedding_id = $user->wedding_id;

            // Check if the name is already taken for this wedding
            $exists = Guest::where('wedding_id', $wedding_id)
                ->where('name', $request->name)
                ->exists();

            if ($exists) {
                return back()->withErrors(['name' => 'The name is already taken for this wedding.']);
            }

            $wedding = Wedding::where('id', $wedding_id)->firstOrFail();

            $weddingLink = "/" . $wedding_id . "/" . $wedding->groom_name . "And" . $wedding->bride_name . "/" . $request->name;
            $guest = Guest::create([
                "wedding_id" => $wedding_id,
                "wedding_link" => $weddingLink,
                "name" => $request->name,
                "attending_status" => "pending",
                "number_of_people" => $request->num_of_people,
                "number_of_kids" => $request->num_of_kids,
                "message" => "null",
            ]);

            return redirect('/user/dashboard/allguests');
        }
        return view('user.addGuest');
    }


    public function editGuest(Request $request)
    {
        if ($request->isMethod('post')) {
            $body = $request->all();
            $guest = Guest::find($body['guestID']);
            if (!$guest) {
                return response()->json(['message' => 'Guest not found'], 404);
            }

            return response()->json($guest, 200);
        }
    }

    public function saveGuest(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'guestID' => 'required|integer|exists:guests,id',
            'name' => 'required|string|max:255',
            'number_of_people' => 'required|integer|min:1',
            'number_of_kids' => 'required|integer|min:1',
        ]);

        // Find the guest
        $guest = Guest::find($validated['guestID']);
        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        // Update guest details and regenerate the wedding link
        $user = Auth::user();
        $wedding = Wedding::where('id', $user->wedding_id)->firstOrFail();

        $newWeddingLink = "/" . $user->wedding_id . "/" . $wedding->groom_name . "And" . $wedding->bride_name . "/" . $validated['name'];

        $guest->wedding_link = $newWeddingLink;
        $guest->name = $validated['name'];
        $guest->number_of_people = $validated['number_of_people'];
        $guest->number_of_kids = $validated['number_of_kids'];
        $guest->save();

        session()->flash('status', 'Guest info saved successfully!');
        return response()->json(['message' => 'Guest info saved successfully!'], 200);
    }



    // app/Http/Controllers/GuestController.php
    public function deleteGuest(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'guestID' => 'required|integer|exists:guests,id',
        ]);

        // Find and delete the guest
        $guest = Guest::find($validated['guestID']);
        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->delete();

        return response()->json(['message' => 'Guest deleted successfully!'], 200);
    }

    public function showWedding()
    {
        $user = Auth::user();

        $wedding = Wedding::where('id', $user->wedding_id)->firstOrFail();
        $weddingDetail = WeddingDetail::where('wedding_id', $user->wedding_id)->firstOrFail();

        return view('user.weddingDashboard', compact('wedding', 'weddingDetail'));
    }

    public function editWedding(Request $request)
    {
        if ($request->isMethod("POST")) {


            $request->validate([
                'bride_name' => 'required|string',
                'bride_lastname' => 'required|string',
                'groom_name' => 'required|string',
                'groom_lastname' => 'required|string',
                'wedding_date' => 'required',
                'ceremony_time' => 'required',
                'ceremony_place' => 'required|string',
                'ceremony_city' => 'required|string',
                'ceremony_maps' => 'required|string',
                'party_time' => 'required',
                'party_place' => 'required|string',
                'party_city' => 'required|string',
                'party_maps' => 'required|string',
                'gift_type' => 'required|string',
                'gift_details' => 'required|string',
            ]);

            $user = Auth::user();
            $wedding = Wedding::where('id', $user->wedding_id)->firstOrFail();
            $weddingDetail = WeddingDetail::where('wedding_id', $user->wedding_id)->firstOrFail();

            // Update the wedding details
            $wedding->update([
                'bride_name' => $request->bride_name,
                'bride_lastname' => $request->bride_lastname,
                'groom_name' => $request->groom_name,
                'groom_lastname' => $request->groom_lastname,
            ]);

            $test = $weddingDetail->update([
                'wedding_date' => $request->wedding_date,
                'ceremony_time' => $request->ceremony_time,
                'ceremony_place' => $request->ceremony_place,
                'ceremony_city' => $request->ceremony_city,
                'ceremony_maps' => $request->ceremony_maps,
                'party_time' => $request->party_time,
                'party_place' => $request->party_place,
                'party_city' => $request->party_city,
                'party_maps' => $request->party_maps,
                'gift_type' => $request->gift_type,
                'gift_details' => $request->gift_details,
            ]);
            return redirect()->back()->with('status', 'Wedding details updated successfully!');
        }
        $user = Auth::user();
        $wedding = Wedding::where('id', $user->wedding_id)->first();
        $weddingDetail = WeddingDetail::where('wedding_id', $user->wedding_id)->first();

        if (!$weddingDetail) {
            $weddingDetail = new WeddingDetail(); // or handle the case as you see fit
        }

        return view('user.editWedding', [
            'wedding' => $wedding,
            'weddingDetail' => $weddingDetail
        ]);
    }

    public function accountSettings(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'username' => 'required|string|max:255|unique:users,username,' . $user->id,
                'old_password' => 'required_with:password|string',
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            // Verify that the old password is correct
            if (!empty($validatedData['password']) && !Hash::check($validatedData['old_password'], $user->password)) {
                return redirect()->route('user.account.settings')
                    ->withErrors(['old_password' => 'The provided old password does not match our records.'])
                    ->withInput();
            }

            $user->username = $validatedData['username'];

            if (!empty($validatedData['password'])) {
                $user->password = Hash::make($validatedData['password']);
            }

            $user->save();

            return redirect()->route('user.account.settings')->with('status', 'Account settings updated successfully!');
        }

        return view('user.settings', compact('user'));
    }

    public function storeImages(Request $request, $weddingId)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('weddings/' . $weddingId . '/photos', $imageName, 'public');
                $imagePaths[] = $imagePath;

                WeddingImage::create([
                    'wedding_id' => $weddingId,
                    'path' => $imagePath,
                ]);
            }
        }

        return back()->with('success', 'Images uploaded successfully');
    }

    public function showImages($weddingId)
    {
        $images = WeddingImage::where('wedding_id', $weddingId)->get();
        return view('wedding_images', compact('images'));
    }

    public function generateTokensForAllUsers()
    {
        $users = User::all();

        foreach ($users as $user) {
            $token = $user->createToken('UserToken')->plainTextToken;

            $user->forceFill(['remember_token' => $token])->save();
        }

        return response()->json([
            'message' => 'Tokens generated for all users'
        ]);
    }
}
