<?php

namespace App\Http\Controllers\Auth;

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

     public function showRegisterForm()
     {
         return view('auth.register');
     }

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
            return redirect('/register')->with('registerfailed', 'Registration Failed! Register Again!');
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

            return redirect('/')->with('registersuccess', 'Registered Successfully! Please Login!');

        } catch (\Exception $e) {
            // Log the error and return failure response
            \Log::error('Registration failed: ' . $e->getMessage());
            return response()->json(['error' => 'Registration failed, please try again.'], 500);
        }
    }


    public function showLoginForm()
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            // Redirect to the dashboard if the user is authenticated
            return redirect()->route('dashboard');
        }

        // Show the login form if the user is not authenticated
        return view('auth.login');
    }

   
    public function login(Request $request)
    {
        // Validate login credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('ORMS')->plainTextToken;

            // return response()->json([
            //     'message' => 'Login successful',
            //     'token' => $token,
            //     'user' => $user,
            // ], 200);

            return redirect('/dashboard')->with('logsuccess', 'LoggedIn Successfully!');
        }else{
            return redirect('/')->with('logfailed', 'Wrong Credential LogIn Failed!');
        }

        // return response()->json(['error' => 'Unauthorized'], 401);
        
    }

   
    public function logout(Request $request)
    {
        // Delete all user's tokens
        $user = Auth::user();
        if ($user) {
            $user->tokens()->delete();
        }

        // Use the Auth facade to logout the user
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully!');
    }
}
