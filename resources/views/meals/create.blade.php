@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Meal Order</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/meal-orders" method="post" class="mt-4">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name:</label>
                            <input required type="text" name="name" class="form-control" placeholder="Passenger Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="age">Age:</label>
                            <select required name="age" class="form-control">
                                <option value="" disabled selected>Select an option</option>
                                <option value="Adult">Adult</option>
                                <option value="Minor">Minor</option>
                                <option value="Infant">Infant</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Gender:</label>
                            <select required name="gender" class="form-control">
                                <option value="" disabled selected>Select an option</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
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
                            <label for="nationality">Nationality:</label>
                            <input required ype="text" name="nationality" class="form-control" placeholder="Passenger Nationality">
                        </div>
                        <div class="form-group mb-3">
                            <label for="type">Type:</label>
                            <select required name="type" class="form-control">
                                <option value="" disabled selected>Select an option</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Meal">Meal</option>
                                <option value="Dinner">Dinner</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="delivery_date">Delivery Date:</label>
                            <input required type="date" name="delivery_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="delivery_time">Delivery Time:</label>
                            <input required type="time" name="delivery_time" class="form-control">
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
