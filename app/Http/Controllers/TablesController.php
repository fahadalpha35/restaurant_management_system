<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_company_id = Auth::user()->company_id;

        // Fetch branches and floors for the dropdown filters
        $branches = DB::table('branch')
            ->where('company_id', $user_company_id)
            ->pluck('name', 'id');

        $floors = DB::table('stores')
            ->where('company_id', $user_company_id)
            ->pluck('name', 'id');

        // Filter tables based on selected branch and floor
        $query = DB::table('tables')
            ->join('stores', 'tables.store_id', '=', 'stores.id')
            ->join('branch', 'stores.branch_id', '=', 'branch.id')
            ->select('tables.*', 'stores.name as store_name', 'branch.name as branch_name')
            ->where('tables.company_id', $user_company_id);

        if ($request->has('branch') && $request->branch) {
            $query->where('branch.id', $request->branch);
        }

        if ($request->has('floor') && $request->floor) {
            $query->where('stores.id', $request->floor);
        }

        $tables = $query->get();

        return view('tables.index', compact('tables', 'branches', 'floors'));
    }
    public function getFloor($floorId)
    {
        $user_company_id = Auth::user()->company_id;
    
            // Fetch stores for the logged-in user's company where active status is 1
            $stores = DB::table('stores')
                        ->where('active', 1)
                        ->where('company_id', $user_company_id)
                        ->get();
        return response()->json($stores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_company_id = Auth::user()->company_id;

        $branches = DB::table('branch')
                    ->where('active', 1)
                    ->where('company_id', $user_company_id)
                    ->get();

        // Fetch stores for the logged-in user's company where active status is 1
        $stores = DB::table('stores')
                    ->where('active', 1)
                    ->where('company_id', $user_company_id)
                    ->get();

        return view('tables.create', compact('stores','branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_company_id = Auth::user()->company_id;
        // Validate incoming data
        $request->validate([
            'table_name' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'available' => 'required|integer',
            'active' => 'required|integer',
            'store_id' => 'required|integer|exists:stores,id',
        ]);

        // Insert new table record
        DB::table('tables')->insert([
            'table_name' => $request->table_name,
            'capacity' => $request->capacity,
            'available' => $request->available,
            'active' => $request->active,
            'store_id' => $request->store_id,
            'company_id' => $user_company_id
        ]);

        return redirect()->route('tables.index')->with('success', 'Table created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $table = DB::table('tables')
            ->join('stores', 'tables.store_id', '=', 'stores.id')
            ->join('branch', 'stores.branch_id', '=', 'branch.id') // Join the branches table
            ->select(
                'tables.*',
                'stores.name as store_name',
                'stores.id as selectedStoreId',
                'branch.name as branch_name',
                'branch.id as selectedBranchId'
                ) // Select branch name
            ->where('tables.id', $id)
            ->first();


        $branch = $table->selectedBranchId;

            $user_company_id = Auth::user()->company_id;

            $branches = DB::table('branch')
                        ->where('active', 1)
                        ->where('company_id', $user_company_id)
                        ->get();
    
            // Fetch stores for the logged-in user's company where active status is 1
            $stores = DB::table('stores')
                        ->where('active', 1)
                        ->where('branch_id', $branch)
                        ->where('company_id', $user_company_id)
                        ->get();
    
        return view('tables.edit', compact('table', 'branches', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming data
        $request->validate([
            'table_name' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'available' => 'required|integer',
            'active' => 'required|integer',
            'store_id' => 'required|integer|exists:stores,id',
        ]);

        // Update table record
        DB::table('tables')->where('id', $id)->update([
            'table_name' => $request->table_name,
            'capacity' => $request->capacity,
            'available' => $request->available,
            'active' => $request->active,
            'store_id' => $request->store_id,
        ]);

        return redirect()->route('tables.index')->with('success', 'Table updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete table record
        DB::table('tables')->where('id', $id)->delete();

        return redirect()->route('tables.index')->with('success', 'Table deleted successfully!');
    }
}
