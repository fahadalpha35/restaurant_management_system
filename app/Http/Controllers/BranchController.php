<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_company_id = Auth::user()->company_id;

        $branches = DB::table('branch')
            ->leftjoin('company', 'branch.company_id', '=', 'company.id')
            ->select('branch.*', 'company.company_name as company_name')
            ->where('company_id',$user_company_id)
            ->get();
        
        return view('branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_company_id = Auth::user()->company_id;

        $company = DB::table('company')
                      ->where('id', $user_company_id)
                       ->first();

        $user_company_name = $company->company_name;

        return view('branch.create', compact('user_company_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('dsfdsfds');
        
        $user_company_id = Auth::user()->company_id;
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
            // 'company_id' => 'required|integer|exists:company,id',
        ]);

        // Insert a new store using DB facade
        DB::table('branch')->insert([
            'name' => $request->name,
            'active' => $request->active,
            // 'company_id' => $request->company_id,
            'company_id' => $user_company_id
        ]);

        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_company_id = Auth::user()->company_id;

        $companies = DB::table('company')
        ->where('id', $user_company_id)
         ->first();

        $store = DB::table('branch')
                    ->where('id', $id)
                    ->first();

        $user_company_name = $companies->company_name;
      
        return view('branch.edit', compact('store','companies','user_company_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_company_id = Auth::user()->company_id;
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
            // 'company_id' => 'required|integer|exists:company,id'
        ]);

        // Update store using DB facade
        DB::table('branch')->where('id', $id)->update([
            'name' => $request->name,
            'active' => $request->active,
            'company_id' => $user_company_id
        ]);

        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete store using DB facade
        DB::table('branch')->where('id', $id)->delete();

        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully.');
    }
}
