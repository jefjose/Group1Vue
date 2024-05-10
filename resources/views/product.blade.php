@extends('layouts.frontend')

@section('css')
<style>
    .pagination {
        margin-top: 10px; /* Adjust the top margin as needed */
    }

    .pagination .page-item {
        display: inline-block;
        margin-right: 10px; /* Adjust the right margin between buttons as needed */
    }

    .pagination .page-item a.page-link {
        padding: 5px 10px; /* Adjust button padding as needed */
    }
</style>
@endsection


@section('scripts')
@endsection

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
        @auth
            @if (auth()->user()->is_admin == 0)
                <div class="col-md-12 text-right" style="margin-top: 20px;">
                    <cart-button />
                </div>

            @endif
        @endauth
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="search-form"
                    style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px; background-color: #f8f9fa; border-radius: 5px; padding: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
                    <form action="{{ route('products.search') }}" method="GET" style="display: flex; flex-grow: 1;">
                        <input type="text" name="query" placeholder="Search..."
                            style="flex-grow: 1; border: none; padding: 8px; border-radius: 5px; outline: none;">
                        <button type="submit"
                            style="padding: 8px 12px; border: none; border-radius: 5px; background-color: #000000; color: #fff; cursor: pointer;">Search</button>
                    </form>
                </div>
                <br>
                <h1 class="text-center border-top border-bottom border-dark">PRODUCTS</h1>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

<div class="pt-0 pb-0 mb-5">
    <div class="container">
        <div class="row">
            @if(isset($products))
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-12 p-3">
                        <div style="width: 350px;margin-left:auto; margin-right:auto;" class="card ">
                            <img class="card-img-top" src="{{$product->image_name}}" alt="Card image cap">
                            <div class="card-body" style="height: 200px; 
                                                                                                            width: 250px;">
                                <!-- Set a fixed height for card-body -->
                                <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p><span>&#8369;</span>{{ number_format($product->price, 2) }}</p>
                                <!-- Pass the product ID and user ID to the add-to-cart-button component -->
                                <add-to-cart-button :product-id="{{$product->id}}" :user-id="{{auth()->user()->id ?? 0}}" />
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Apply pagination styles -->
                <div class="col-lg-12 text-center">
                    <p>
                        <!-- Show the status of how many items are being shown -->
                        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} items
                    </p>
                    <nav aria-label="Products Pagination" class="d-inline-block">
                        <ul class="pagination justify-content-center d-inline-flex">
                            <!-- Previous link -->
                            @if ($products->previousPageUrl())
                                <li class="page-item">
                                    <a href="{{ $products->previousPageUrl() }}" class="page-link">&laquo; Previous</a>
                                </li>
                            @endif
                            <!-- Next link -->
                            @if ($products->nextPageUrl())
                                <li class="page-item">
                                    <a href="{{ $products->nextPageUrl() }}" class="page-link">Next &raquo;</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif

        </div>
    </div>
</div>

@endsection