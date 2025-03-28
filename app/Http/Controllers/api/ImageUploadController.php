<?php

namespace App\Http\Controllers\api;

use App\Models\WeddingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
{
    $request->validate([
        'image' => 'required|image',
        'userId' => 'required|numeric',
        'layout' => 'required|numeric',
        'position' => 'required|numeric'
    ]);

    try {
        // First, check if an image already exists with these parameters
        $existingImage = WeddingImage::where('user_id', $request->userId)
            ->where('layout', $request->layout)
            ->where('position', $request->position)
            ->first();

        $path = $request->file('image')->store('wedding-images', 'public');

        if ($existingImage) {
            // If exists, update the path
            Storage::disk('public')->delete($existingImage->path); // Delete old image
            $existingImage->path = $path;
            $existingImage->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Image updated successfully',
                'image' => [
                    'path' => $path,
                    'layout' => $existingImage->layout,
                    'position' => $existingImage->position
                ]
            ]);
        } else {
            // If doesn't exist, create new record
            $image = new WeddingImage([
                'user_id' => $request->userId,
                'path' => $path,
                'layout' => $request->layout,
                'position' => $request->position
            ]);
            $image->save();

            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully',
                'image' => [
                    'path' => $path,
                    'layout' => $image->layout,
                    'position' => $image->position
                ]
            ]);
        }
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to upload image: ' . $e->getMessage()
        ], 500);
    }
}

public function getAllImages($userId)
{
    try {
        // Get all images for the user, ordered by layout and position
        $images = WeddingImage::where('user_id', $userId)
            ->orderBy('layout')
            ->orderBy('position')
            ->get()
            ->map(function ($image) {
                return [
                    'id' => $image->id,
                    'path' => '/storage/' . $image->path, // Assuming images are stored in storage/app/public
                    'layout' => $image->layout,
                    'position' => $image->position
                ];
            });

        return response()->json([
            'success' => true,
            'images' => $images
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to fetch images: ' . $e->getMessage(),
            'images' => []
        ], 500);
    }
}
}