<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    // Register
    public function register(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ]);

            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['token' => $token, 'message' => 'User registered successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // Login
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if (Auth::attempt($credentials)) {
                $user = $request->user();
                $token = $user->createToken('auth_token', ['user:read'])->plainTextToken;

                return response()->json(['token' => $token, 'user' => $user->name, 'message' => 'Login successful'], 200);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // Get Token
    public function getUser(Request $request)
    {
        try {
            $user = $request->user();

            if ($user) {
                $token = $user->createToken('auth_token', ['user:read'])->plainTextToken;

                return response()->json(['token' => $token, 'user' => $user->name, 'message' => 'User session retrieved successfully'], 200);
            } else {
                throw new \Exception('Internal Service Error');
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    // Logout
    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();

            return response()->json(['message' => 'Logout successful']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
