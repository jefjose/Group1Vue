@extends('layouts.frontend')

@section('css')
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
              <div class="col-md-12 text-right"> <!-- Align to the right -->
                  <cart-button/>
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
    width: 250px;"> <!-- Set a fixed height for card-body -->
                            <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p><span>&#8369;</span>{{ number_format($product->price, 2) }}</p>
                            <!-- Pass the product ID and user ID to the add-to-cart-button component -->
                            <add-to-cart-button :product-id="{{$product->id}}" :user-id="{{auth()->user()->id ?? 0}}"/>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
