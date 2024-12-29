<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_company_id = Auth::user()->company_id;

        // Fetch all tables with their associated store names
        $stores = DB::table('stores')
            ->leftjoin('company', 'stores.company_id', '=', 'company.id')
            ->leftjoin('branch', 'stores.branch_id', '=', 'branch.id')
            ->select('stores.*', 'company.company_name as company_name', 'branch.name as branch_name')
            ->where('stores.company_id',$user_company_id)
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
        $user_company_id = Auth::user()->company_id;

        // Fetch the logged-in user's company details
        $companies = DB::table('company')
            ->where('id', $user_company_id)
            ->first();

        $user_company_name = $companies ? $companies->company_name : null;

        // Fetch branches related to the logged-in user's company_id
        $branches = DB::table('branch')
            ->where('company_id', $user_company_id) // Filter by company_id
            ->get();

        return view('stores.create', compact('companies', 'branches', 'user_company_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_company_id = Auth::user()->company_id;
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
            'branch_id' => 'required|integer|exists:branch,id',
        ]);

        DB::table('stores')->insert([
            'name' => $request->name,
            'active' => $request->active,
            'company_id' => $user_company_id,
            'branch_id' => $request->branch_id,
        ]);

        return redirect()->route('stores.index')->with('success', 'Store created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user_company_id = Auth::user()->company_id;

        // Fetch the logged-in user's company details
        $companies = DB::table('company')
            ->where('id', $user_company_id)
            ->first();

        $user_company_name = $companies ? $companies->company_name : null;

        // Fetch all branches for the user's company
        $branches = DB::table('branch')
            ->where('company_id', $user_company_id)
            ->get();

        // Fetch the store details from the `stores` table
        $store = DB::table('stores')
            ->where('id', $id)
            ->where('company_id', $user_company_id) // Ensure it belongs to the user's company
            ->select('id', 'name', 'branch_id', 'active') // Ensure `branch_id` is selected
            ->first();

        if (!$store) {
            return redirect()->route('stores.index')->with('error', 'Store not found or unauthorized access.');
        }

        return view('stores.edit', compact('store', 'branches', 'user_company_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user_company_id = Auth::user()->company_id;
        
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'branch_id' => 'required|exists:branch,id', // Validate branch_id
            'active' => 'required|boolean',
        ]);

        // Update store using DB facade
        DB::table('stores')->where('id', $id)->update([
            'name' => $request->name,
            'branch_id' => $request->branch_id, // Ensure branch_id is updated
            'active' => $request->active,
            'company_id' => $user_company_id
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
