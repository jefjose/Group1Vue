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
                    <h1 class="text-center">Orders</h1>
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
                            
                            <div class="row mx-0 px-0">
                                <div class="col-md-12 mt-5"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <form action="{{ route('product') }}" method="GET">
                                        <div class="form-group">
                                            <label for="startMonthYear">Select Start Month and Year:</label>
                                            <input type="month" class="form-control" id="startMonthYear" name="startMonthYear"
                                                value="{{ Carbon\Carbon::now()->format('Y-m') }}" />
                                        </div>

                                        <div class="form-group">
                                            <label for="endMonthYear">Select End Month and Year:</label>
                                            <input type="month" class="form-control" id="endMonthYear" name="endMonthYear"
                                                value="{{ Carbon\Carbon::now()->format('Y-m') }}" />
                                        </div>

                                        <div class="my-3">
                                            <button type="submit" class="btn btn-primary" id="generateReportBtn"><b>Generate
                                                Report</b></button>
                                        </div>
                                    </form>


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
                                                <th>To Pay</th>
                                                <th>Order Number</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->whereIn('status', ['Processing', 'Pending']) as $order)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y') }}</td>
                                                    <td>{{ $order->customer_first_name }}</td>
                                                    <td>{{ $order->customer_last_name }}</td>
                                                    <td>{{ $order->customer_contact }}</td>
                                                    <td>{{ $order->customer_address }}</td>
                                                    <td>{{ $order->total_amount }}</td>
                                                    <td>{{ $order->id }}</td>
                                                    <td>
                                                        <form action="{{ route('order.update.admin', ['orderId' => $order->id]) }}" method="POST"> 
                                                            @csrf
                                                            <div class="input-group">
                                                                <select name="status" class="form-control">
                                                                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                                    <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                                                    <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                                </select>
                                                                <div class="input-group-append ml-1">
                                                                    <button type="submit" class="btn btn-warning">Update Status</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td class="">
                                                        <div class="btn-group"> 
                                                            <form method="get" action="{{ route('order.show.admin', ['orderId' => $order->id]) }}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success ml-2"><b>View</b></button>
                                                            </form>
                                                            <form method="post" action="{{ route('order.delete.admin', ['orderId' => $order->id]) }}" onsubmit="return confirm('Are you sure you want to delete this order?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-primary ml-2"><b>Delete</b></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if ($orders->where('status', 'Processing')->isEmpty())
                                                <tr>
                                                    <td colspan="13" class="text-center">No Current Orders</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                

                                <div class="table-responsive table-bordered mt-5">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>To Pay</th>
                                                <th>Order Number</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->where('status', 'Completed') as $order)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y') }}</td>
                                                    <td>{{ $order->customer_first_name }}</td>
                                                    <td>{{ $order->customer_last_name }}</td>
                                                    <td>{{ $order->customer_contact }}</td>
                                                    <td>{{ $order->customer_address }}</td>
                                                    <td>{{ $order->total_amount }}</td>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->status }}</td>
                                                </tr>
                                            @endforeach
                                            @if ($orders->where('status', 'Completed')->isEmpty())
                                                <tr>
                                                    <td colspan="13" class="text-center">No Completed Orders</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive table-bordered mt-5">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>To Pay</th>
                                                <th>Order Number</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->where('status', 'Cancelled') as $order)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y') }}</td>
                                                    <td>{{ $order->customer_first_name }}</td>
                                                    <td>{{ $order->customer_last_name }}</td>
                                                    <td>{{ $order->customer_contact }}</td>
                                                    <td>{{ $order->customer_address }}</td>
                                                    <td>{{ $order->total_amount }}</td>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->status }}</td>
                                                </tr>
                                            @endforeach
                                            @if ($orders->where('status', 'Cancelled')->isEmpty())
                                                <tr>
                                                    <td colspan="13" class="text-center">No Cancelled Orders</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
</div>          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
