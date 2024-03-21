@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Meal Orders</div>

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
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Nationality</th>
                                    <th>Airline</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mealOrders as $order)
                                    <tr>
                                        <td>{{ $order->type }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->age }}</td>
                                        <td>{{ $order->gender }}</td>
                                        <td>{{ $order->nationality }}</td>
                                        <td>{{ $order->airline->display_name }}</td>
                                        <td>{{ $order->delivery_date }}</td>
                                        <td>{{ $order->delivery_time }}</td>
                                        <td>
                                            @if($order->status == "Pending")
                                            <span class="badge bg-warning">{{ $order->status }}</span>
                                            @endif
                                            
                                            @if($order->status == "Delivered")
                                            <span class="badge bg-success">{{ $order->status }}</span>
                                            @endif

                                            @if($order->status == "Not Found")
                                            <span class="badge bg-danger">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form id="statusForm" action="{{ route('meal-orders.update-status', ['id' => $order->id]) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status">
                                                <select name="selected_status" id="statusSelect" class="form-select">
                                                    <option disabled selected>Change Status</option>
                                                        @if($order->status == "Pending")
                                                        <option value="Delivered">Delivered</option>
                                                        <option value="Not Found">Not Found</option>
                                                        @endif
                                                        
                                                        @if($order->status == "Delivered")
                                                        <option value="Pending">Pending</option>
                                                        <option value="Not Found">Not Found</option>
                                                        @endif

                                                        @if($order->status == "Not Found")
                                                        <option value="Pending">Pending</option>
                                                        <option value="Delivered">Delivered</option>
                                                        @endif
                                                </select>
                                            </form>
                                        </td>
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
<script>
    document.getElementById('statusSelect').addEventListener('change', function() {
        // Set the value of the hidden input field
        document.querySelector('input[name="status"]').value = this.value;
        // Submit the form
        document.getElementById('statusForm').submit();
    });
</script>
@endsection