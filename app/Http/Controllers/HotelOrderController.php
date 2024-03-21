<?php

namespace App\Http\Controllers;
use App\Models\ListAirline;
use App\Models\ListHotel;
use App\Models\HotelOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelOrderController extends Controller
{
    public function store(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $user_id = Auth::id();

        // Verificar si el usuario está autenticado
        if ($user_id) {
            // Obtener todos los datos del formulario
            $data = $request->all();

            // Asignar el user_id al dato del formulario
            $data['user_id'] = $user_id;

            if(isset($data['passenger_names']) && is_array($data['passenger_names'])){
                $names = implode(', ', $data['passenger_names']);
                $data['passenger_names'] = $names;
            }

            // Crear la orden de comidas
            HotelOrder::create($data);

            // Redireccionar con un mensaje de éxito
            return redirect()->back()->with('success', 'Orden de comida creada correctamente');
        } else {
            // Redireccionar con un mensaje de error si el usuario no está autenticado
            return redirect()->back()->with('error', 'Usuario no autenticado');
        }
    }

    public function list()
    {
        // Obtener todos los registros de la tabla hotel_orders
        $hotelOrders = HotelOrder::all();

        // Pasar los datos a la vista
        return view('hotels.list', ['hotelOrders' => $hotelOrders]);
    }

    public function new()
    {
        $airlines = ListAirline::all(); // Retrieve all records from the list_airlines table
        $hotels = ListHotel::all();
        return view('hotels.create', compact('airlines', 'hotels'));
    }
    
    public function index()
    {
        return view('hotels.checklist');
    }
}