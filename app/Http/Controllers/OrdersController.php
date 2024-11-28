<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders')
            ->join('stores', 'stores.id', '=', 'orders.store_id')
            ->select('orders.*', 'stores.name as store_name')
            ->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = DB::table('tables')->get();
        $products = DB::table('products')->get();
        return view('orders.create', compact('tables', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'table' => 'required|exists:tables,id',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.qty' => 'required|numeric|min:1',
            'products.*.rate' => 'required|numeric|min:0',
        ]);

        // Insert Order
        $orderData = [
            'bill_no' => 'ORD-' . strtoupper(uniqid()),
            'date_time' => now(),
            'gross_amount' => $request->gross_amount,
            'service_charge_rate' => $request->service_charge_rate,
            'service_charge_amount' => $request->service_charge_amount,
            'vat_charge_rate' => $request->vat_charge_rate,
            'vat_charge_amount' => $request->vat_charge_amount,
            'discount' => $request->discount,
            'net_amount' => $request->net_amount,
            'user_id' => Auth::id(),  // Assuming the user is logged in
            'table_id' => $request->table,
            'paid_status' => 0,  // Assuming the order is unpaid by default
            'store_id' => 1,  // Assuming 1 is the store_id, you can adjust based on your setup
        ];

        $orderId = DB::table('orders')->insertGetId($orderData);

        // Insert Order Items
        foreach ($request->products as $product) {
            DB::table('order_items')->insert([
                'order_id' => $orderId,
                'product_id' => $product['product_id'],
                'qty' => $product['qty'],
                'rate' => $product['rate'],
                'amount' => $product['amount'],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Order has been placed successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
