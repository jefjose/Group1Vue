<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::get();

        return view('order', compact('orders'));
    }

    public function index2()
    {
        // Get the authenticated user's ID inside the method
        $userId = Auth::id();

        // Retrieve orders for the authenticated user
        $orders = Order::where('user_id', $userId)->get();

        return view('myorder', compact('orders'));
    }

    public function orderAdmin($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('orders.admin', compact('order'));
    }

    public function orderStatusAdmin(Request $request, $orderId)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:Processing,Completed,Cancelled',
        ]);

        // Find the order by its ID
        $order = Order::findOrFail($orderId);

        // Update the status of the order
        $order->status = $request->status;
        $order->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function orderDeleteAdmin($orderId)
{
    $order = Order::find($orderId);

    if (!$order) {
        return response()->json(['message' => 'Order not found'], 404);
    }

    // Update the status of the order to "Cancelled"
    $order->status = 'Cancelled';
    $order->save();

    return redirect()->back();
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'items' => 'required|array',
            'items.*.id' => 'required|numeric',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);
        $userId = auth()->id();
        // Create a new order
        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_first_name' => $request->input('firstname'),
            'customer_last_name' => $request->input('lastname'),
            'customer_contact' => $request->input('phone'),
            'customer_address' => $request->input('address'),
            'status' => 'Pending',
        ]);

        // Create order items
        $totalAmount = 0;
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            // Calculate and accumulate total amount for the order
            $totalAmount += $item['quantity'] * $item['price'];
        }

        // Update the total_amount column for the order
        $order->total_amount = $totalAmount;
        $order->save();

        // Return success response
        return response()->json(['message' => 'Order placed successfully', 'order_id' => $order->id], 201);
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
