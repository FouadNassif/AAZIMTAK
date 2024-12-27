<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',  // Ensure password confirmation
            'wedding_id' => 'required|string',
        ]);

        try {
            // Hash the password before saving
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password), // Hash the password
                'wedding_id' => $request->wedding_id,
            ]);

            return response()->json(['message' => 'User registered successfully'], 201);
        } catch (\Exception $e) {
            // Catch any exceptions and return a custom error message
            return response()->json(['error' => 'Failed to register user: ' . $e->getMessage()], 500);
        }
    }



    // User Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['Invalid credentials.'],
            ]);
        }

        // Revoke existing tokens (for security)
        $user->tokens()->delete();

        // Generate a new token
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }


    // Get Authenticated User
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    // User Logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
