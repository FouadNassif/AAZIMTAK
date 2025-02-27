<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageUploadController extends Controller
{
    public function uploadImages(Request $request)
    {
        // Validate images (only accept image files)
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);

        $user = User::find($request->userId); // Find user by userId
        $uploadedImages = [];

        foreach ($request->file('images') as $image) {
            // Store image in the storage folder
            $path = $image->store("user_images/{$user->id}", 'public'); // Store file in public storage
            $uploadedImages[] = $path;

            // Save the image path in the database
            UserImage::create([
                'user_id' => $user->id,
                'path' => $path,
                'layout' => 1,
                "position" => 1
            ]);
        }

        return response()->json([
            'message' => 'Images uploaded successfully!',
            'paths' => array_map(function ($path) {
                return url('storage/' . $path);
            }, $uploadedImages),
        ]);
    }

    public function getAllUserImages(Request $request)
    {
        $user = User::find($request->userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Fetch images grouped by layout and ordered by position
        $uploadedImages = UserImage::where('user_id', $user->id)
            ->orderBy('layout')
            ->orderBy('position')
            ->get(['layout', 'position', 'path']);

        $groupedImages = [];

        foreach ($uploadedImages as $image) {
            // Group by layout
            if (!isset($groupedImages[$image->layout])) {
                $groupedImages[$image->layout] = [];
            }

            // Assign image path to the corresponding position
            $groupedImages[$image->layout][$image->position] = $image->path;
        }

        return response()->json($groupedImages);
    }
}
