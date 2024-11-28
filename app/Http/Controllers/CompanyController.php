<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = DB::table('company')->first();
        return view('company.index', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = DB::table('company')->where('id', $id)->first();
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form data
        $request->validate([
            'company_name' => 'required|string|max:255',
            'service_charge_value' => 'required|string|max:255',
            'vat_charge_value' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'message' => 'required|string',
            'currency' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        $data = $request->only([
            'company_name',
            'service_charge_value',
            'vat_charge_value',
            'address',
            'phone',
            'country',
            'message',
            'currency',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $company = DB::table('company')->where('id', $id)->first();

            // Delete old image if it exists
            if ($company && $company->image) {
                $oldImagePath = public_path('images/company/' . $company->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/company'), $imageName);
            $data['image'] = $imageName;
        }

        // Update the database record
        DB::table('company')->where('id', $id)->update($data);

        return redirect()->route('edit_company', $id)->with('success', 'Company profile updated successfully.');
    }
}
