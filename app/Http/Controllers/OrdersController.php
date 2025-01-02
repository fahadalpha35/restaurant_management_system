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
        $user_company_id = Auth::user()->company_id;
        $orders = DB::table('orders')
            ->join('stores', 'stores.id', '=', 'orders.store_id')
            ->select('orders.*', 'stores.name as store_name')
            ->orderBy('orders.id', 'desc')
            ->where('orders.company_id', $user_company_id)
            ->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order_unique_id = 'ORD-' . strtoupper(uniqid());
        
        $user_company_id = Auth::user()->company_id;
        $tables = DB::table('tables')
        ->where('tables.company_id', $user_company_id)->get();
        $branch = DB::table('branch')
        ->where('branch.company_id', $user_company_id)->get();
        $store = DB::table('stores')
        ->where('stores.company_id', $user_company_id)->get();
        $products = DB::table('products')
        ->where('products.company_id', $user_company_id)->get();
        $orders = DB::table('orders')
        ->where('orders.company_id', $user_company_id)->get();
        return view('orders.create', compact('tables', 'products', 'orders','branch','store', 'order_unique_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_company_id = Auth::user()->company_id;
        $request->validate([
            'table' => 'required|exists:tables,id',
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.qty' => 'required|numeric|min:1',
            'products.*.rate' => 'required|numeric|min:0',
            'products.*.amount' => 'required|numeric|min:0',
        ]);

        // Calculate totals
        $grossAmount = array_sum(array_column($request->products, 'amount'));
        $serviceChargeRate = 10; // Dummy value
        $serviceChargeAmount = ($serviceChargeRate / 100) * $grossAmount;
        $vatChargeRate = 15; // Dummy value
        $vatChargeAmount = ($vatChargeRate / 100) * $grossAmount;
        $discount = $request->discount ?? 0;
        $netAmount = $grossAmount + $serviceChargeAmount + $vatChargeAmount - $discount;

        // Store order data
        $orderData = [
            // 'bill_no' => 'ORD-' . strtoupper(uniqid()),
            'bill_no' => $request->bill_no,
            'date_time' => now(),
            'gross_amount' => $grossAmount,
            'service_charge_rate' => $serviceChargeRate,
            'service_charge_amount' => $serviceChargeAmount,
            'vat_charge_rate' => $vatChargeRate,
            'vat_charge_amount' => $vatChargeAmount,
            'discount' => $discount,
            'net_amount' => $netAmount,
            'user_id' => Auth::id(),
            'table_id' => $request->table,
            'paid_status' =>  $request->paid_status,
            'store_id' => $request->store,
            'company_id' => $user_company_id,
            'branch_id' => $request->branch,
            'order_status' => 1
        ];

        $orderId = DB::table('orders')->insertGetId($orderData);

        // Store order items
        foreach ($request->products as $product) {
            DB::table('order_items')->insert([
                'order_id' => $orderId,
                'product_id' => $product['product_id'],
                'qty' => $product['qty'],
                'rate' => $product['rate'],
                'amount' => $product['amount'],
                'company_id' => $user_company_id,
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function destroy(string $id)
    {
        // Delete table record
        DB::table('orders')->where('id', $id)->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
