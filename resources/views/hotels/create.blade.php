@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Hotel Order</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/hotel-orders" method="post" class="mt-4">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="os_number">OS:</label>
                            <input required type="number" name="os_number" class="form-control" placeholder="OS Number">
                        </div>
                        <div class="form-group mb-3">
                            <label for="hotel_id">Hotel:</label>
                            <select required name="hotel_id" class="form-control">
                                <option value="" disabled selected>Select an option</option>
                                @foreach($hotels as $hotel)
                                <option value="{{ $hotel->id }}">{{ $hotel->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="passenger_names">Name:</label>
                            <input required type="text" name="passenger_names[]" class="form-control" placeholder="Passenger Name">
                        </div>
                        <div id="nameFields" class="form-group mb-3">
                        </div>
                        <button type="button" id="addNameField" class="btn btn-secondary mb-3">Add Passengers</button>
                        <div class="form-group mb-3">
                            <label for="airline_id">Airline:</label>
                            <select required name="airline_id" class="form-control">
                                <option value="" disabled selected>Select an option</option>
                                @foreach($airlines as $airline)
                                <option value="{{ $airline->id }}">{{ $airline->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="flight_number">Affected Flight:</label>
                            <input required ype="text" name="flight_number" class="form-control" placeholder="Affected Flight Number">
                        </div>
                        <div class="form-group mb-3">
                            <label for="new_flight_number">New Flight:</label>
                            <input required type="text" name="new_flight_number" class="form-control" placeholder="New Flight Number">
                        </div>
                        <div class="form-group mb-3">
                            <label for="contact_number">Contact Number:</label>
                            <input type="text" name="contact_number" class="form-control" placeholder="Contact Numer">
                        </div>
                        <div class="form-group mb-3">
                            <label for="checkin_date">Check-in Date:</label>
                            <input required type="date" name="checkin_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="checkin_time">Check-in Time:</label>
                            <input required type="time" name="checkin_time" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="checkout_date">Check-out Date:</label>
                            <input required type="date" name="checkout_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="checkout_time">Check-out Time:</label>
                            <input required type="time" name="checkout_time" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="breakfast">Breakfast:</label>
                            <input type="number" name="breakfast" class="form-control" placeholder="Breakfast">
                        </div>
                        <div class="form-group mb-3">
                            <label for="meal">Meal:</label>
                            <input type="number" name="meal" class="form-control" placeholder="Meal">
                        </div>
                        <div class="form-group mb-3">
                            <label for="dinner">Dinner:</label>
                            <input type="number" name="dinner" class="form-control" placeholder="Dinner">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    document.getElementById('addNameField').addEventListener('click', function () {
        var nameFieldsDiv = document.getElementById('nameFields');
        var count = nameFieldsDiv.querySelectorAll('.form-group').length + 1;
        var newField = document.createElement('div');
        newField.classList.add('form-group');
        newField.innerHTML = `
            <label for="passenger_names${count}">Name #${count}:</label>
            <input type="text" class="form-control" name="passenger_names[]" id="passenger_names${count}" placeholder="Passenger Name">
        `;
        nameFieldsDiv.appendChild(newField);
    });
</script>

@endsection
