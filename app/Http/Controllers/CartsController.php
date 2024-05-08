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
        //
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
        $product = Product::where('id', $request->get('product_id'))->first();
        $productFoundInCart = Cart::where('product_id', $request->get('product_id'))->pluck('id');
        
        //Count User's Cart Items
        $userItems = Cart::where('user_id', auth()->user()->id)->sum('quantity');

        if($productFoundInCart->isEmpty()){
            //Add To Cart
            $cart = Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        } else {
            //Increment Product In Cart
            $cart = Cart::where('product_id', $request->get('product_id'))->increment('quantity');
        }

        if($cart){
            return [
                'message' => 'Cart Updated',
                'items' => $userItems
            ];
        }

        dd($product);
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
