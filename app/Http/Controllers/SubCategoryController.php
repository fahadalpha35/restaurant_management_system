<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_company_id = Auth::user()->company_id;
        $subcategories = DB::table('subcategory')
            ->join('category', 'subcategory.category_id', '=', 'category.id')
            ->select('subcategory.*', 'category.name as category_name')
            ->where('company_id', $user_company_id)
            ->get();

        return view('categories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_company_id = Auth::user()->company_id;
        $categories = DB::table('category')->where('active', 1)
        ->where('company_id', $user_company_id)
        ->get();
        return view('subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_company_id = Auth::user()->company_id;
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'required|integer'
        ]);

        DB::table('subcategory')->insert([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active,
            'company_id' => $user_company_id
        ]);

        return redirect()->route('categories.index')->with('success', 'Subcategory created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory = DB::table('subcategory')->where('id', $id)->first();
        $categories = DB::table('category')->where('active', 1)->get();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'required|integer'
        ]);

        DB::table('subcategory')->where('id', $id)->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active
        ]);

        return redirect()->route('categories.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('subcategory')->where('id', $id)->delete();
        return redirect()->route('categories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
