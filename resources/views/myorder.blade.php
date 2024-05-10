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

    <div class="pt-5 mt-5">
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
    <div class="pt-5">
        <div class="container">
            <div class="row"></div>
        </div>
    </div>
    <div class="pt-0 pb-0 mb-5 mt-5">
        <div class="container">
            <div class="row"></div>
            <div class="row">
            <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1 class="text-center border-top border-bottom border-dark">MY ORDERS</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4"></div>
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
                            
                            <div class="row mx-0 px-0">
                                <div class="col-md-12 mt-5"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">

                                </div>




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
                                                <th>Date</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Total</th>
                                                <th>Order Number</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                    <tr>
                                                        
                                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y') }}</td>
                                                        <td>{{ $order->customer_first_name }}</td>
                                                        <td>{{ $order->customer_last_name }}</td>
                                                        <td>{{ $order->customer_contact }}</td>
                                                        <td>{{ $order->customer_address }}</td>
                                                        <td>{{ $order->total_amount}}</td>
                                                        <td>{{ $order->id }}</td>
                                                        <td>
                                                            @if ($order->status === 'Pending')
                                                                <i class="fas fa-exclamation-circle text-warning"></i> 
                                                            @elseif ($order->status === 'Processing')
                                                                <i class="fas fa-hourglass-half text-info"></i> 
                                                            @elseif ($order->status === 'Completed')
                                                                <i class="fas fa-check-circle text-success"></i> 
                                                            @elseif ($order->status === 'Cancelled')
                                                                <i class="fas fa-times-circle text-danger"></i> 
                                                            @endif
                                                            {{ $order->status }}
                                                        </td>
                                                        <td class="">
                                                            <div class="btn-group">
                                                                <form method="get" action="{{ route('order.show.user', ['orderId' => $order->id]) }}">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-success ml-2"><b>View</b></button>
                                                                </form>
                                                                @if ($order->status == "Pending")
                                                                    <form method="post" action="{{ route('order.delete.admin', ['orderId' => $order->id]) }}" onsubmit="return confirm('Are you sure you want to delete this order?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger ml-2"><b>Cancel</b></button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                            @endforeach
                                            @if ($orders->where('user_id', auth()->id())->isEmpty())
                                                <tr>
                                                    <td colspan="9" class="text-center">No Current Orders</td>
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
