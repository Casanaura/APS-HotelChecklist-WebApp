<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelChecklist;
use App\Models\ListHotel;
use Illuminate\Support\Facades\Auth;

class HotelChecklistController extends Controller
{
    public function index()
    {
        // Retrieve all hotels
        $hotels = HotelChecklist::all();
        
        // Calculate total beds (single beds + double beds)
        $totalBeds = $hotels->sum(function ($hotel) {
            return $hotel->single_bed + $hotel->double_bed;
        });

        // Calculate total beds for Airport locations
        $totalBedsAirport = $hotels->filter(function ($hotel) {
            return $hotel->location === 'Airport';
        })->sum(function ($hotel) {
            return $hotel->single_bed + $hotel->double_bed;
        });

        // Calculate total beds for City locations
        $totalBedsCity = $hotels->filter(function ($hotel) {
            return $hotel->location === 'City';
        })->sum(function ($hotel) {
            return $hotel->single_bed + $hotel->double_bed;
        });

        // Get the authenticated user's name
        $userName = Auth::user()->name;

        // Retrieve all hotels from list_hotels table
        $allHotels = ListHotel::all();

        // Calculate total beds for each hotel and construct hotel details
        $hotelDetails = [];
        foreach ($allHotels as $hotel) {
            $totalBedsHotel = $hotel->single_bed + $hotel->double_bed;
            $hotelDetails[] = '*' . $hotel->display_name . '*' . ': ' . $totalBedsHotel . ' Habitaciones';
        }

        // Pass all necessary data to the view
        return view('hotels.checklist', compact('hotels', 'totalBeds', 'totalBedsAirport', 'totalBedsCity', 'userName', 'hotelDetails'));
    }

    public function update(Request $request)
    {
        foreach ($request->hotels as $hotelId => $data) {
            $hotel = HotelChecklist::findOrFail($hotelId);
            $hotel->update($data);
        }

        return redirect()->back()->with('success', 'Hotel checklist updated successfully.');
    }

    public function resetBeds()
    {
        // Reset all single_bed and double_bed values to zero
        ListHotel::query()->update(['single_bed' => 0, 'double_bed' => 0]);
    
        return redirect()->back()->with('success', 'All beds reset successfully.');
    }

}
