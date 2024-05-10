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
        </div>
    </div>
    <div class="pt-0 pb-0 mb-5 mt-5">
        <div class="container">
            <div class="row"></div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h1 class="text-center">Order Number: {{ $order->id }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Order Date: {{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center" style="">
        <div class="order-container">
            <div class="bg-white row mb-5 pb-5 shadow w-100 mx-auto" style="box-shadow: 0px 0px 4px black;">
                <div class="col-md-12">
                    <div class="row ">
                       
                    </div>
                    <div class="card mx-0 p-0">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabone" role="tabpanel">
                            
                                <div class="container">
                                    <div class="col-md-12">
                                        <form action="{{ route('product') }}" method="GET" id="filterForm">
                                            <div class="row">
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-2">
                                                </div>
                                                <div class="col-md-6 d-flex justify-content-end">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td>{{ $item->product->description }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->product->price }}</td>
                                                </tr>
                                            @endforeach
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
</div>
@endsection
