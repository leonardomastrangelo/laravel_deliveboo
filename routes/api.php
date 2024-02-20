<?php

use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\SetOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{slug}', [RestaurantController::class, 'show']);

# Rotta per processare il pagamanto
Route::post('/process-payment', [PaymentController::class, 'process']);

# Rotta per salvare l'ordine nel db
Route::post('/order', [SetOrderController::class, 'store']);

