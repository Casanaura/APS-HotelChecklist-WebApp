<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListAirline;

class ListAirlineController extends Controller
{
    public function airlineTransporOrder()
    {
        $airlines = ListAirline::all(); // Retrieve all records from the list_airlines table
        return view('transport.create', compact('airlines')); // Pass the $airlines data to the view
    }

    public function airlineMealOrder()
    {
        $airlines = ListAirline::all(); // Retrieve all records from the list_airlines table
        return view('meals.create', compact('airlines')); // Pass the $airlines data to the view
    }
}
