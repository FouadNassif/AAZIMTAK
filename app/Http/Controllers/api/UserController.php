<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request inputs
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Attempt to authenticate the user
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user(); // Get authenticated user
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => $user,
            ]);
        }

        // Authentication failed
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials. Please try again.',
        ], 401);
    }
}
