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
            
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center"><a class="btn btn-primary"
                        href="{{ route('product')  }}"><b>Add New Order</b></a></div>
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
                                            @foreach ($orders as $order)
                                                @if ($order->id !== null)
                                                @foreach ($order->orderItems as $item)
                                                    <tr>
                                                        
                                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y') }}</td>
                                                        <td>{{ $order->customer_first_name }}</td>
                                                        <td>{{ $order->customer_last_name }}</td>
                                                        <td>{{ $order->customer_contact }}</td>
                                                        <td>{{ $order->customer_address }}</td>
                                                        <td>{{ $order->total_amount}}</td>
                                                        <td>{{$item->order_id}}</td>
                                                        <td>{{$order->status}}</td>
                                                        @endforeach
                                                        <td class="">
                                                            <div class="btn-group">
                                                            <form method="get"
                                                                    action="{{ route('product') }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-success ml-2"><b>View</b></button>
                                                                </form>
                                                                <form method="get"
                                                                    action="{{ route('product') }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-warning ml-2"><b>Edit</b></button>
                                                                </form>
                                                                <form method="post"
                                                                    action="{{ route('product')  }}"
                                                                    onsubmit="return confirm('Are you sure you want to delete this order?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-primary ml-2"><b>Delete</b></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            @if ($orders->where('order_id', '!=', null)->where('status', '!=', 'Claimed')->isEmpty())
                                                <tr>
                                                    <td colspan="13" class="text-center">No Current
                                                        Orders</td>
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
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                                <th>Total</th>
                                                <th>Proof of Payment</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                @if ($order->status === 'Claimed')
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y') }}</td>
                                                        <td>{{ $order->first_name }}</td>
                                                        <td>{{ $order->last_name }}</td>
                                                        <td>{{ $order->contact }}</td>
                                                        <td>{{ $order->product }}</td>
                                                        <td>{{ $order->qty }}</td>
                                                        <td>{{ $order->subtotal }}</td>
                                                        <td>{{ $order->total }}</td>
                                                        <td style="width: 300px;">
                                                            @if ($order->image)
                                                            <a href="{{ Storage::url($order->image) }}" download>
                                                                <img src="{{ Storage::url($order->image) }}" alt="img"
                                                                    class="img-thumbnail"></a>
                                                            @else
                                                                <img src="{{ asset('placeholder.jpg') }}" alt="img"
                                                                    class="img-thumbnail">
                                                            @endif
                                                        </td>
                                                        <td>{{ $order->status }}</td>
                                                        <td class="">
                                                            <div class="btn-group">
                                                                <form method="post"
                                                                    action="{{ route('product')  }}"
                                                                    onsubmit="return confirm('Are you sure you want to delete this order?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-primary ml-2"><b>Delete</b></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            @if ($orders->where('status', '=', 'Claimed')->isEmpty())
                                                <tr>
                                                    <td colspan="13" class="text-center">No Claimed
                                                        Orders</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
</div></div>
<div class="tab-pane fade @if (session('activeTab') == 'tabtwo') show active @endif" id="tabtwo"
                                role="tabpanel">
                                <div>
                                <div class="col-md-8 mx-auto">
                            
                                    <h2 class="mt-5">Other Donations</h2>
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
</div>

                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Account Type</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Amount</th>
                                                <th>Proof of Donation</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                @if ($order->order_id === null)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y') }}</td>
                                                        @if ($order->user_id == 'Guest')
                                                            <td>Guest</td>
                                                        @else
                                                            <td>Registered User</td>
                                                        @endif
                                                        <td>{{ $order->first_name }}</td>
                                                        <td>{{ $order->last_name }}</td>
                                                        <td>{{ $order->email }}</td>
                                                        <td>{{ $order->total }}</td>
                                                        <td style="width: 300px;">  @if ($order->image)
                                                            <a href="{{ Storage::url($order->image) }}" download>
                                                            <img src="{{ Storage::url($order->image) }}" alt="img" class="img-thumbnail"></a>
                                                        @else
                                                            <img src="{{ asset('placeholder.jpg') }}" alt="img" class="img-thumbnail">
                                                        @endif</td>
                                                        <td>
                                                            <form method="post"
                                                                    action="{{route('product')  }}"
                                                                    onsubmit="return confirm('Are you sure you want to update this status?')">
                                                                    @csrf
                                                                    @method('PUT')
                                                            <select class="form-control" name="status">
                                                                <option value="Processing"
                                                                    {{ $order->status == 'Processing' ? 'selected' : '' }}>
                                                                    Processing</option>
                                                                    <option value="Received"
                                                                    {{ $order->status == 'Received' ? 'selected' : '' }}>
                                                                    Received</option>
                                                                    <option value="Not Received"
                                                                    {{ $order->status == 'Not Received' ? 'selected' : '' }}>
                                                                    Not Received</option>
                                                            </select>
                                                        </td>
                                                        <td class="">
                                                            <div class="btn-group">
                                                                    <button type="submit"
                                                                        class="btn btn-primary ml-2"><b>Update</b></button>
                                                                </form>
                                                                <form method="post"
                                                                    action="{{route('product')  }}"
                                                                    onsubmit="return confirm('Are you sure you want to delete this donation?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-primary ml-2"><b>Delete</b></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            @if ($orders->where('order_id', '===', null)->isEmpty())
                                                <tr>
                                                    <td colspan="9" class="text-center">No Current
                                                        Donations</td>
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