<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all tables with their associated store names
        $stores = DB::table('stores')
            ->leftjoin('company', 'stores.company_id', '=', 'company.id')
            ->select('stores.*', 'company.company_name as company_name')
            ->get();
        
        return view('stores.index', compact('stores'));

        // $stores = DB::table('stores')->get(); // Fetch all stores using DB facade
        // return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $company = DB::table('company')->first();
        return view('stores.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
            'company_id' => 'required|integer|exists:company,id',
        ]);

        // Insert a new store using DB facade
        DB::table('stores')->insert([
            'name' => $request->name,
            'active' => $request->active,
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('stores.index')->with('success', 'Store created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $companies = DB::table('company')->get();

        $store = DB::table('stores')
                    ->where('id', $id)
                    ->first();

      
        return view('stores.edit', compact('store','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
            'company_id' => 'required|integer|exists:company,id'
        ]);

        // Update store using DB facade
        DB::table('stores')->where('id', $id)->update([
            'name' => $request->name,
            'active' => $request->active,
            'company_id' => $request->company_id
        ]);

        return redirect()->route('stores.index')->with('success', 'Store updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete store using DB facade
        DB::table('stores')->where('id', $id)->delete();

        return redirect()->route('stores.index')->with('success', 'Store deleted successfully.');
    }
}
