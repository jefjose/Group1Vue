<!DOCTYPE html>
<html>

<head>
    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style type="text/css">
        th,
        td {
            border: solid 1px #777;
            padding: 2px;
            margin: 2px;
        }
    </style>
</head>

<body>
    <header>
        <h2 class="text-center mb-5">
            <img style="max-width: 100px; max-height: 100px; width: 100px; height: 100px;">
        <h2 class="mb-0">Peachy's Collection</h2>
            @if($startMonthYear)
                {{ $startMonthYear !== $endMonthYear
                    ? $startOfMonth->format('F Y') . ' - ' . $endOfMonth->format('F Y')
                    : $startOfMonth->format('F Y') }}
                Order Report
            @else
                Order Report
            @endif
        </h2>
    </header>

    <div class="col-md-12">
        @php
            $ordersCompleted = $orders->where('status', 'Completed');
            $ordersCancelled = $orders->where('status', 'Cancelled');
        @endphp

        @if ($ordersCompleted->count() > 0)
            <h3 class="">Completed Orders</h3>
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Order Number</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Amount</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordersCompleted as $order)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer_first_name }} {{ $order->customer_last_name }}</td>
                                <td>{{ $order->customer_contact }}</td>
                                <td>{{ $order->customer_address }}</td>
                                <td>P{{ $order->total_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <p class="font-weight-bold">
                    Completed Orders for
                    @if($startMonthYear)
                        {{ $startMonthYear !== $endMonthYear
                            ? $startOfMonth->format('F Y') . ' - ' . $endOfMonth->format('F Y')
                            : $startOfMonth->format('F Y') }}: <span style="color: green; font-weight: bold;">P{{ $totalCompletedOrders }}</span>
                    @else
                        <span style="color: green;  font-weight: bold;">P{{ $totalCompletedOrders }}</span>
                    @endif
                </p>
            </div>
        @endif
            
        @if ($ordersCancelled->count() > 0)
            <h3 class="">Cancelled Orders</h3>
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Order Number</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Amount</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordersCancelled as $order)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer_first_name }} {{ $order->customer_last_name }}</td>
                                <td>{{ $order->customer_contact }}</td>
                                <td>{{ $order->customer_address }}</td>
                                <td>P{{ $order->total_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <p class="font-weight-bold">
                    Orders Cancelled for
                    @if($startMonthYear)
                        {{ $startMonthYear !== $endMonthYear
                            ? $startOfMonth->format('F Y') . ' - ' . $endOfMonth->format('F Y')
                            : $startOfMonth->format('F Y') }}: <span style="color: red; font-weight: bold;">P{{ $totalCancelledOrders }}</span>
                    @else
                        <span style="color: red; font-weight: bold;">P{{ $totalCancelledOrders }}</span>
                    @endif
                </p>
            </div>
        @endif

        @if ($ordersCompleted->count() == 0 && $ordersCancelled->count() == 0)
            <h4 class="text-center">No Orders</h4>
        @elseif ($ordersCompleted->count() == 0)
            <h4 class="text-center">No Completed Orders</h4>
        @elseif ($ordersCancelled->count() == 0)
            <h4 class="text-center">No Cancelled Orders</h4>
        @endif

        <p>Last Updated: {{ now()->format('m/d/Y') }}</p>
    </div>
</body>

</html>
