<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;



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

    public function orderUser($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('orders.user', compact('order'));
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

    public function orderDelete($orderId)
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

public function generateOrderReport(Request $request)
{
    $startMonthYear = $request->input('startMonthYear');
    $endMonthYear = $request->input('endMonthYear');

    // If $startMonthYear or $endMonthYear is not provided or is invalid, default to the current month and year
    $startOfMonth = $startMonthYear
        ? Carbon::createFromFormat('Y-m', $startMonthYear)->startOfMonth()
        : Carbon::now()->startOfMonth();

    $endOfMonth = $endMonthYear
        ? Carbon::createFromFormat('Y-m', $endMonthYear)->endOfMonth()
        : Carbon::now()->endOfMonth();

    // Validate the date range
    if ($startOfMonth->gt($endOfMonth)) {
        return redirect()->back()->with('error', 'Invalid date range. Start date cannot be later than end date.');
    }

    // Fetch orders completed and cancelled within the date range
    $ordersCompleted = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->where('status', 'Completed')
        ->sum('total_amount');

    $ordersCancelled = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->where('status', 'Cancelled')
        ->sum('total_amount');

    // Fetch all orders within the date range
    $orders = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->orderBy('created_at')
        ->get();
    
    $totalCompletedOrders = $orders->where('status', 'Completed')->sum('total_amount');
    $totalCancelledOrders = $orders->where('status', 'Cancelled')->sum('total_amount');


    // Generate PDF report
    $pdf = Pdf::loadView('reports.orders', compact('orders', 'ordersCompleted', 'ordersCancelled', 'totalCompletedOrders', 'totalCancelledOrders', 'startMonthYear', 'endMonthYear', 'startOfMonth', 'endOfMonth'))->setPaper('a4', 'landscape');

    // Generate filename for the PDF report
    $fileName = 'orders-report-' . ($startMonthYear !== $endMonthYear
        ? $startOfMonth->format('M-Y') . '_to_' . $endOfMonth->format('M-Y')
        : $startOfMonth->format('M-Y')) . '.pdf';

    // Stream the PDF report for viewing
    return $pdf->stream($fileName);
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
