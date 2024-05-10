@extends('layouts.frontend')

@section('content')
    <div class="section-overlapping">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto px-0">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5">
        <div class="container">
            <div class="row"></div>
        </div>
    </div>
    <div class="pt-0 pb-0 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h1 class="text-center">Inventory</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center" style="">
        <div class="container">

            <div class="bg-white row mb-5 pb-5 shadow w-100 mx-auto" style=" box-shadow: 0px 0px 4px  black;">
                <div class="col-md-12">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-5">
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="col-md-12">
                        <div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <h2>Manage Inventory</h2>

                                    <div class="my-3">
                                        <a href="{{ route('product.create') }}">
                                            <button class="btn btn-primary" id="addProductBtn"><b>Add New Product</b></button>
                                        </a>
                                    </div>
                                </div>


                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td style="max-width: 500px; word-break: break-word; text-align: left;">{{ $item->description }}</td>
                                                <td style="min-width: 300px; max-width: 500px;">
                                                    @if ($item->image_name)
                                                        <a href="{{ asset('storage/images/' . $item->image_name) }}" download>
                                                            <img src="{{ asset('storage/images/' . $item->image_name) }}" class="img-thumbnail" alt="Product Image">
                                                        </a>
                                                    @else
                                                        <img src="placeholder.jpg" alt="Product Image">
                                                    @endif
                                                </td>
                                                <td>&#8369;{{ number_format($item->price, 2) }}</td>
                                                <td class="actions">
                                                    <div class="btn-group">
                                                        <form method="get" action="{{ route('product.edit', ['product' => $item]) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning ml-2"><b>Edit</b></button>
                                                        </form>
                                            
                                                        <form method="post" action="{{ route('product.destroy', ['product' => $item]) }}" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary ml-2"><b>Delete</b></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            @endforeach
                                            @if ($products->isEmpty())
                                                <tr>
                                                    <td colspan="8" class="text-center">No Current Product</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
