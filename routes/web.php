<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingCarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/parking_cars',[ParkingCarController::class,'store']);

Route::get('/parking_cars', [ParkingCarController::class, 'index']); 


Route::get('/parking_cars/create', [ParkingCarController::class, 'create']); 

Route::get('/parking_cars/{parking_car}', [ParkingCarController::class, 'index']); 