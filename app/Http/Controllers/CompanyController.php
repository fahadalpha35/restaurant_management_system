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
        // Fetch company data using DB facade
        $id = 1;
        $company = DB::table('company')->where('id', $id)->first();

        // Return the edit view with the fetched data
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
        ]);

        // Update the company information using DB facade
        DB::table('company')->where('id', $id)->update([
            'company_name' => $request->company_name,
            'service_charge_value' => $request->service_charge_value,
            'vat_charge_value' => $request->vat_charge_value,
            'address' => $request->address,
            'phone' => $request->phone,
            'country' => $request->country,
            'message' => $request->message,
            'currency' => $request->currency,
        ]);

        // Redirect back with success message
        return redirect()->route('company.index')->with('success', 'Company profile updated successfully.');
    }
}
