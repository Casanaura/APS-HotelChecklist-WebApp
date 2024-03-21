@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Hotel Orders</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <script>
                            $(document).ready( function () {
                                $('#dataTables').DataTable( {
                                        colReorder: true,
                                        responsive: true,
                                        buttons: true
                                    }
                                );
                            } );
                        </script>
                    <div class="container">
                        <table id="dataTables" class="table">
                            <thead>
                                <tr>
                                    <th>OS</th>
                                    <th>Airline</th>
                                    <th>Flight</th>
                                    <th>Type</th>
                                    <th>Passengers</th>
                                    <th>Food Service</th>
                                    <th>Phone</th>
                                    <th>Hotel</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>New Flight</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hotelOrders as $order)
                                    <tr>
                                        <td>{{ $order->os_number }}</td>
                                        <td>{{ $order->airline->display_name }}</td>
                                        <td>{{ $order->flight_number }}</td>
                                        <td>{{ $order->type }}</td>
                                        <td>{{ $order->passenger_names }}</td>
                                        <td>
                                            @if($order->breakfast !== null && $order->breakfast > 0)
                                                Breakfast: {{ $order->breakfast }}</br>
                                            @endif
                                            @if($order->meal !== null && $order->meal > 0)
                                                Meal: {{ $order->meal }}</br>
                                            @endif
                                            @if($order->dinner !== null && $order->dinner > 0)
                                                Dinner: {{ $order->dinner }}
                                            @endif
                                            @if($order->breakfast === null && $order->meal === null && $order->dinner === null)
                                                0
                                            @endif
                                        </td>
                                        <td>{{ $order->contact_number }}</td>
                                        <td>{{ $order->hotel->display_name }}</td>
                                        <td>{{ $order->checkin_date }} at {{ $order->checkin_time }}</td>
                                        <td>{{ $order->checkout_date }} at {{ $order->checkout_time }}</td>
                                        <td>{{ $order->new_flight_number }}</td>
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
@endsection