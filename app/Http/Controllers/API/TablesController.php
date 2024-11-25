<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all tables with their associated store names
        $tables = DB::table('tables')
            ->join('stores', 'tables.store_id', '=', 'stores.id')
            ->select('tables.*', 'stores.name as store_name')
            ->get();
        
        // Return as JSON response
        return response()->json([
            'success' => true,
            'data' => $tables
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all stores for dropdown
        $stores = DB::table('stores')->where('active', 1)->get();
        return view('tables.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        ]);

        return redirect()->route('tables.index')->with('success', 'Table created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the table and all stores
        $table = DB::table('tables')->where('id', $id)->first();
        $stores = DB::table('stores')->where('active', 1)->get();

        return view('tables.edit', compact('table', 'stores'));
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
