<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch 9 products per page without random ordering
        $products = Product::paginate(9);

        return view('product', compact('products'));
    }


    public function index2()
    {
        // Fetch 9 random products from the database
        $products = Product::all();

        return view('products.inventory', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.add');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_name' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'The product field is required.',
            'name.string' => 'Please enter a valid product name.',
            'description.required' => 'The description field is required.',
            'description.string' => 'Please enter a valid description.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'Please enter a valid numeric price.',
            'image_name.image' => 'Please upload a valid image file.',
            'image_name.mimes' => 'Supported image formats are jpeg, png, jpg, and gif.',
            'image_name.max' => 'The image size should not exceed 2048 kilobytes.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            // Custom error messages for each rule
            $errorMessage = [];
            foreach ($validator->failed() as $field => $rules) {
                $errorMessage[] = $errors->first($field);
            }

            return redirect()->back()->with('error', $errorMessage)->withInput();
        }

        $data = $validator->validated();

        $existingProduct = Product::where('name', $data['name'])->first();

        if ($existingProduct) {
            return redirect(route('product.inventory'))->with('error', 'Product already exists.');
        }

        // Set the slug to exactly what the name is
        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image_name')) {
            $file = $request->file('image_name');
            
            // Generate a unique filename using uniqid() and append the original file extension
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Store the file in the 'images' directory within the 'public' disk with the randomized filename
            $imagePath = $file->storeAs('images', $filename, 'public');
        
            // Assign the randomized filename to the 'image_name' attribute in the $data array
            $data['image_name'] = $filename;
        }
        
        

        Product::create($data);

        return redirect(route('product.inventory'))->with('success', 'Product added successfully');
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
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_name' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'The product field is required.',
            'name.string' => 'Please enter a valid product name.',
            'description.required' => 'The description field is required.',
            'description.string' => 'Please enter a valid description.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'Please enter a valid numeric price.',
            'image_name.image' => 'Please upload a valid image file.',
            'image_name.mimes' => 'Supported image formats are jpeg, png, jpg, and gif.',
            'image_name.max' => 'The image size should not exceed 2048 kilobytes.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            // Custom error messages for each rule
            $errorMessage = [];
            foreach ($validator->failed() as $field => $rules) {
                $errorMessage[] = $errors->first($field);
            }

            return redirect()->route('product.edit', ['[product]' => $product])
                ->with('error', $errorMessage)->withInput();
        }

        $data = $validator->validated();

        if ($request->hasFile('image_name')) {
            if ($product->image_name) {
                \Storage::disk('public')->delete($product->image_name);
            }
        
            $file = $request->file('image_name');
        
            // Generate a unique filename using uniqid() and append the original file extension
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        
            // Store the file in the 'images' directory within the 'public' disk with the randomized filename
            $imagePath = $file->storeAs('images', $filename, 'public');
        
            // Assign the randomized filename to the 'image_name' attribute in the $data array
            $data['image_name'] = $filename;
        }
        

        $product->update($data);

        return redirect(route('product.inventory'))->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image_name) {
            \Storage::disk('public')->delete($product->image_name);
        }
    
        $product->delete();
    
        return redirect(route('product.inventory'))->with('success', 'Product deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();

        return view('pages.search', compact('products'));
    }

}
