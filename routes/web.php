<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingCarController;
use App\Http\Controllers\TravelPlanController;

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


//プラン名登録

Route::get('/myplan/name/index', [TravelPlanController::class, 'index']); 
Route::get('/myplan/name/create', [TravelPlanController::class, 'create']); 