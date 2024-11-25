<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function storeview()
    {
        // Fetch all tables with their associated store names
        $stores = DB::table('stores')
            ->leftJoin('company', 'stores.company_id', '=', 'company.id')
            ->select('stores.*', 'company.company_name as company_name')
            ->get();

        // Return as JSON response
        return response()->json([
            'success' => true,
            'data' => $stores
        ], 200);
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

        return response()->json([
            'success' => true,
            'message' => 'Store created successfully.'
        ], 201);
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

        return view('stores.edit', compact('store', 'companies'));
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

        return response()->json([
            'success' => true,
            'message' => 'Store updated successfully.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete store using DB facade
        DB::table('stores')->where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Store deleted successfully.'
        ], 200);
    }
}
