<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\ViewTransportOrder;
use App\Models\ListAirline;
use App\Models\ListTransport;

class ViewTransportOrderController extends Controller
{
    public function index()
    {
        // Obtén todos los registros de la tabla transport_orders
        $transportOrders = ViewTransportOrder::all();
    
        // Pasa los datos a la vista y devuelve la vista con los datos
        return view('transport.view', compact('transportOrders'));
    }

    public function airline()
    {
        return $this->belongsTo(ListAirline::class, 'airline_id');
    }

    public function transport()
    {
        return $this->belongsTo(ListTransport::class, 'transport_id');
    }
}
