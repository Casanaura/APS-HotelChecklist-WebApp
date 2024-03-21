<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportOrder;
use App\Models\ListAirline;
use App\Models\ListTransport;
use Illuminate\Support\Facades\Auth;


class TransportOrderController extends Controller
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
    
            // Procesar los nombres para concatenarlos
            if(isset($data['passenger_names']) && is_array($data['passenger_names'])){
                $names = implode(', ', $data['passenger_names']);
                $data['passenger_names'] = $names;
            }
    
            // Crear la orden de transporte
            TransportOrder::create($data);
    
            // Redireccionar con un mensaje de éxito
            return redirect()->back()->with('success', 'Orden de transporte creada correctamente');
        } else {
            // Redireccionar con un mensaje de error si el usuario no está autenticado
            return redirect()->back()->with('error', 'Usuario no autenticado');
        }
    }
    

    public function list()
    {
        // Obtener todos los registros de la tabla transport_orders
        $transportOrders = TransportOrder::all();

        // Pasar los datos a la vista
        return view('transport.list', ['transportOrders' => $transportOrders]);
    }

    public function new()
    {
        $airlines = ListAirline::all(); // Retrieve all records from the list_airlines table
        $fleets = ListTransport::all(); // Retrieve all records from the list_transport table
        return view('transport.create', compact('airlines', 'fleets')); // Pass the data to the view
    }
}
