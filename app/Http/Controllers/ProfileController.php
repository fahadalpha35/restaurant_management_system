<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the profile of the logged-in user.
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $user = DB::table('users')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.role_name as role_name')
                ->where('users.id', $user_id)
                ->first();

        return view('profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = DB::table('users')->where('id', $id)->first();
        $companies = DB::table('company')->get();
        $role = DB::table('roles')->get();
        return view('profile.edit', compact('profile', 'companies', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
            'phone' => 'required|string|max:255',
            'gender' => 'required|string',
            'company_id' => 'required|string|max:255',
            'role_id' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        // Prepare the data for update
        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'company_id' => $request->company_id,
            'role_id' => $request->role_id,
        ];

        // Handle password update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Handle image upload if present
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            

            // Check and delete the old image if it exists
            $user = DB::table('users')->where('id', $id)->first();
            if ($user->image) {

                $filePath = public_path('images/users/' . $user->image);
                   
                if (!file_exists($filePath)) {
                    dd("File does not exist: " . $filePath);
                }

               unlink($filePath);

               // Get the uploaded image
            $image = $request->file('image');
            
            // Generate a new filename for the image
            $imageName = time() . '_' . $image->getClientOriginalName();
     
            // Move the image to the 'public/images/users' directory
            $image->move(public_path('images/users'), $imageName);  // Using move() to store the image

        
            // Update the data array with the new image name
            $data['image'] = $imageName;

            // Update the user in the database
            DB::table('users')->where('id', $id)->update($data);

            // Redirect with success message
            return redirect()->route('edit_profile', ['id' => $id])->with('success', 'Profile updated successfully.');
            }
     
        }else{
            // Redirect with success message
            return redirect()->route('edit_profile', ['id' => $id])->with('warning', 'No Changes is occured.');
        }

       
    }
}
