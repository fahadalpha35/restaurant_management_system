<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_company_id = Auth::user()->company_id;
        $products = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->join('subcategory', 'products.subcategory_id', '=', 'subcategory.id')
            ->select('products.*', 'category.name as category_name', 'subcategory.name as subcategory_name')
            ->where('products.company_id', $user_company_id)
            ->get();

        return view('products.index', compact('products'));
    }

    public function getSubcategories($categoryId)
    {
        $user_company_id = Auth::user()->company_id;
        $subcategories = DB::table('subcategory')->where('category_id', $categoryId)
        ->where('subcategory.company_id', $user_company_id)
        ->get();
        return response()->json($subcategories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_company_id = Auth::user()->company_id;
        $categories = DB::table('category')
        ->where('category.company_id', $user_company_id)->get();
        $subcategories = DB::table('subcategory')
        ->where('subcategory.company_id', $user_company_id)->get();
        $store = DB::table('stores')
        ->where('stores.company_id', $user_company_id)->get();
        return view('products.create', compact('categories','subcategories','store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_company_id = Auth::user()->company_id;
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'active' => 'required',
        ]);

        $data = $request->only([
            'category_id',
            'subcategory_id',
            'store_id', // Set a default value for store_id if not available
            'name',
            'price',
            'description',
            'active',
        ]);

        $data['company_id'] = $user_company_id;

            // Handle image upload
            if ($request->hasFile('image')) {
                // Store the new image
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                $data['image'] = $imageName;
            } else {
                // Set a default image if none is uploaded
                $data['image'] = 'item.png'; 
            }

        // Insert the new product into the 'products' table
         DB::table('products')->insert($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $categories = DB::table('category')->get();
        $subcategories = DB::table('subcategory')->get();
        $store = DB::table('stores')->get();

        return view('products.edit', compact('product', 'categories', 'subcategories','store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'active' => 'required',
        ]);

        $data = $request->only([
            'category_id',
            'subcategory_id',
            'store_id',
            'name',
            'price',
            'description',
            'active',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $product = DB::table('products')->where('id', $id)->first();

            // Delete old image if it exists
            if ($product && $product->image) {
                $oldImagePath = public_path('images/products/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $imageName);
            $data['image'] = $imageName;
        }

        // Update the database record
        DB::table('products')->where('id', $id)->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
