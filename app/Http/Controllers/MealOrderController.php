<?php

namespace App\Http\Controllers;
use App\Models\ListAirline;
use App\Models\MealOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealOrderController extends Controller
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

            // Crear la orden de comidas
            MealOrder::create($data);

            // Redireccionar con un mensaje de éxito
            return redirect()->back()->with('success', 'Orden de comida creada correctamente');
        } else {
            // Redireccionar con un mensaje de error si el usuario no está autenticado
            return redirect()->back()->with('error', 'Usuario no autenticado');
        }
    }

    public function list()
    {
        // Obtener todos los registros de la tabla meal_orders
        $mealOrders = MealOrder::all();

        // Pasar los datos a la vista
        return view('meals.list', ['mealOrders' => $mealOrders]);
    }

    public function new()
    {
        $airlines = ListAirline::all(); // Retrieve all records from the list_airlines table
        return view('meals.create', compact('airlines'));
    }

    public function updateStatus(Request $request, $id)
    {
        $mealOrder = MealOrder::findOrFail($id);
        $mealOrder->status = $request->status;
        $mealOrder->save();
    
        return redirect()->back()->with('success', 'Status updated successfully');
    }
    

}