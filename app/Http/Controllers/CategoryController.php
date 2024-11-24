<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('category')->get();
        $subcategories = DB::table('subcategory')
            ->join('category', 'subcategory.category_id', '=', 'category.id')
            ->select('subcategory.*', 'category.name as category_name')
            ->get();
        return view('categories.index', compact('categories','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'required|boolean',
        ]);

        DB::table('category')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = DB::table('category')->where('id', $id)->first();
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'required|boolean',
        ]);

        DB::table('category')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active,
            'updated_at' => now(),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('category')->where('id', $id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
