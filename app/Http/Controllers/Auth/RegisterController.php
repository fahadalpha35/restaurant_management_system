<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }



    // Method to handle the form submission
    public function register(Request $request)
    {

        $validator = $this->validator($request->all());
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Attempt to create a new user
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->company_id = $request->company_id;
            $user->role_id = $request->role_id;
            $user->password = $request->password;
            
            // Save the data
            $user->save();

    return redirect()->route('login')->with('success', 'Register created successfully!');
            
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('User registration failed: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Registration failed, please try again.')->withInput();
        }
        
           
        // $validator = $this->validator($request->all());
    
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
    
        // try {
        //     // Attempt to create a new user
        //     $user = $this->create($request->all());
    
        //     // Log in the user
        //     auth()->login($user);
    
        //     // Redirect after registration
        //     return redirect($this->redirectTo);
        // } catch (\Exception $e) {
        //     // Log the error for debugging
        //     \Log::error('User registration failed: ' . $e->getMessage());
    
        //     // Redirect back with an error message
        //     return redirect()->back()->with('error', 'Registration failed, please try again.')->withInput();
        // }
    }
    



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'company_id' => $data['company_id'],
            'role_id' => $data['role_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
