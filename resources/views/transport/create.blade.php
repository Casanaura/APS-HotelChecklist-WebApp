@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Transport Order</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/transport-orders" method="post" class="mt-4">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="type">Car:</label>
                            <select required name="type" class="form-control">
                                <option value="" disabled selected>Select an option</option>
                                <option value="normal">Sedan</option>
                                <option value="suv">Suv</option>
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
                            <label for="flight_number">Flight:</label>
                            <input type="text" name="flight_number" class="form-control" placeholder="Flight Number">
                        </div>
                        <div class="form-group mb-3">
                            <label for="pickup_™location">From:</label>
                            <input required ype="text" name="pickup_location" class="form-control" placeholder="Current Location">
                        </div>
                        <div class="form-group mb-3">
                            <label for="destination">To:</label>
                            <input required type="text" name="destination" class="form-control" placeholder="Destination">
                        </div>
                        <div class="form-group mb-3">
                            <label for="transport_id">Fleet:</label>
                            <select required name="transport_id" class="form-control">
                                <option value="" disabled selected>Select an option</option>
                                @foreach($fleets as $fleet)
                                <option value="{{ $fleet->id }}">{{ $fleet->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="economy_number">Eco:</label>
                            <input required type="number" name="economy_number" class="form-control" placeholder="Car Number">
                        </div>
                        <div class="form-group mb-3">
                            <label for="pnr">PNR:</label>
                            <input type="text" name="pnr" class="form-control" placeholder="Car Plates">
                        </div>
                        <div class="form-group mb-3">
                            <label for="departure_date">Departure:</label>
                            <input required type="date" name="departure_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="departure_time">Departure time:</label>
                            <input required type="time" name="departure_time" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="return_date">Return:</label>
                            <input type="date" name="return_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="return_time">Return time:</label>
                            <input type="time" name="return_time" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="folio">Folio:</label>
                            <input type="number" name="folio" class="form-control" placeholder="Folio">
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
