@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Transport Orders</div>

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
                                    <th>Car</th>
                                    <th>Name</th>
                                    <th>Airline</th>
                                    <th>Flight</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Fleet</th>
                                    <th>Eco</th>
                                    <th>Departure</th>
                                    <th>Time</th>
                                    <th>Return</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transportOrders as $order)
                                    <tr>
                                        <td>{{ $order->type }}</td>
                                        <td>{{ $order->passenger_names }}</td>
                                        <td>{{ $order->airline->display_name }}</td>
                                        <td>{{ $order->flight_number }}</td>
                                        <td>{{ $order->pickup_location }}</td>
                                        <td>{{ $order->destination }}</td>
                                        <td>{{ $order->fleet->display_name }}</td>
                                        <td>{{ $order->economy_number }}</td>
                                        <td>{{ $order->departure_date }}</td>
                                        <td>{{ $order->departure_time }}</td>
                                        <td>@if($order->return_date == null)N/A @endif</td>
                                        <td>@if($order->return_time == null)N/A @endif</td>
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