<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ListAirline;
use App\Models\ListTransport;

class ViewMealOrder extends Model
{
    public function index()
    {
        // Obtén todos los registros de la tabla meal_orders
        $mealOrders = ViewMealOrder::all();
    
        // Pasa los datos a la vista y devuelve la vista con los datos
        return view('meals.view', compact('mealOrders'));
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
