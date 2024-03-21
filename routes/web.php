<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRank;
use App\Http\Controllers\TransportOrderController;
use App\Http\Controllers\HotelChecklistController;

// Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* 
Enable registration with this line of code
Auth::routes();

Disable registration using this line of code instead
Auth::routes(['register' => false]);

Only one Auth::routes must be active at the same time.
*/

// Authentication
Auth::routes(['register' => false]);
Route::view('/unauthorized', 'auth.unauthorized');

// Protected routes
Route::middleware(['auth'])->group(function () {

    // Transportation
    Route::get('/new-transport-order', [TransportOrderController::class, 'new'])->name('new-transport-order');
    Route::get('/view-transport-orders', [TransportOrderController::class, 'list'])->name('view-transport-orders');
    Route::post('/transport-orders', [TransportOrderController::class, 'store']);

    // Meals
    Route::get('/new-meal-order', [App\Http\Controllers\MealOrderController::class, 'new'])->name('new-meal-order');
    Route::get('/view-meal-orders', [App\Http\Controllers\MealOrderController::class, 'list'])->name('view-meal-orders');
    Route::post('/meal-orders', [App\Http\Controllers\MealOrderController::class, 'store']);
    Route::post('/meal-orders/update-status/{id}', [App\Http\Controllers\MealOrderController::class, 'updateStatus'])->name('meal-orders.update-status');

    // Hotels
    Route::get('/new-hotel-order', [App\Http\Controllers\HotelOrderController::class, 'new'])->name('new-hotel-order');
    Route::get('/view-hotel-orders', [App\Http\Controllers\HotelOrderController::class, 'list'])->name('view-hotel-orders');
    Route::get('/view-hotel-checklist', [HotelChecklistController::class, 'index'])->name('view-hotel-checklist');
    Route::put('/hotel-checklist/update', [HotelChecklistController::class, 'update'])->name('hotel.checklist.update');
    Route::post('/hotel-orders', [App\Http\Controllers\HotelOrderController::class, 'store']);

    // Routes accessible only to users with rank_id "1" - sys_admin_rank
    Route::middleware(CheckRank::class . ':1')->group(function () {
        // Reset beds from the hotel checklist
        Route::get('/hotel-checklist/reset-beds', [App\Http\Controllers\HotelChecklistController::class, 'resetBeds'])->name('hotel.checklist.reset_beds');
    });

});
