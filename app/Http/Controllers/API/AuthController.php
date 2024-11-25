<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller
{
    /**
     * Register a new user and issue a Sanctum token.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'integer', 'max:255'],
            'company_id' => ['required', 'integer', 'max:255'],
            'role_id' => ['required', 'integer', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Registration failed! Please check the input and try again.'], 400);
        }

        try {
            // Create the new user
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'company_id' => $request->company_id,
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password),
            ]);

            // Issue a token for the user using Sanctum
            $token = $user->createToken('ORMS')->plainTextToken;

            return response()->json([
                'message' => 'Registration successful!',
                'token' => $token,
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Registration failed: ' . $e->getMessage());
            return response()->json(['error' => 'Registration failed, please try again.'], 500);
        }
    }

    public function login(Request $request)
    {
        // Validate login credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('ORMS')->plainTextToken;

            return response()->json([
                'message' => 'Login successful!',
                'token' => $token,
                'user' => $user,
            ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
        // Revoke the token for the logged-in user
        $user = Auth::user();
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json([
            'message' => 'Logout successful!'
        ], 200);
    }
}
