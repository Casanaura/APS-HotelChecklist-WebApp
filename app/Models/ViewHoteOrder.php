<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ListAirline;

class ViewHoteOrder extends Model
{
    public function index()
    {
        // Obtén todos los registros de la tabla hotel_orders
        $hotelOrders = ViewHotelOrder::all();
    
        // Pasa los datos a la vista y devuelve la vista con los datos
        return view('hotels.view', compact('hotelOrders'));
    }

    public function airline()
    {
        return $this->belongsTo(ListAirline::class, 'airline_id');
    }
}
