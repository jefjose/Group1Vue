<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.checkout');
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
    $product = Product::find($request->get('product_id'));
    $productFoundInCart = Cart::where('product_id', $request->get('product_id'))
                                ->where('user_id', auth()->id())
                                ->first();

    // Count User's Cart Items
    $userItems = Cart::where('user_id', auth()->user()->id)->sum('quantity');

    if (!$productFoundInCart) {
        // Add To Cart
        $cart = Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price,
        ]);
    } else {
        // Increment Product In Cart
        $productFoundInCart->increment('quantity');
        $cart = $productFoundInCart;
    }

    if ($cart) {
        return [
            'message' => 'Cart Updated',
            'items' => $userItems
        ];
    }

    dd($product);
}



public function clearCart()
{
    $userId = auth()->id();
    Cart::where('user_id', $userId)->delete();

    return response()->json(['message' => 'Cart cleared']);
}

public function deleteItem($itemId)
{
    $cartItem = Cart::where('product_id', $itemId)
                    ->where('user_id', auth()->id())
                    ->first();

    if (!$cartItem) {
        return response()->json(['message' => 'Item not found'], 404);
    }

    if ($cartItem->quantity > 1) {
        $cartItem->decrement('quantity');
    } else {
        $cartItem->delete();
    }

    return response()->json(['message' => 'Item deleted successfully']);
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

    public function getCartItemsForCheckout()
{
    $cartItems = Cart::with('product')->where('user_id', auth()->user()->id)->get();
    $finalData = [];
    $totalAmount = 0;

    if ($cartItems) {
        foreach ($cartItems as $cartItem) {
            if ($cartItem->product) {
                foreach ($cartItem->product as $cartProduct) {
                    if ($cartProduct->id == $cartItem->product_id) {
                        $finalData[] = [
                            'id' => $cartProduct->id,
                            'name' => $cartProduct->name,
                            'quantity' => $cartItem->quantity,
                            'price' => $cartItem->price,
                            'total' => $cartItem->price * $cartItem->quantity,
                        ];
                        $totalAmount += $cartItem->price * $cartItem->quantity;
                    }
                }
            }
        }
    }
    return response()->json($finalData);
}

    public function processPayment(Request $request){
        dd($request->all());
    }
}
