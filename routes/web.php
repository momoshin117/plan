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


//管理画面(駐車台数設定)
Route::post('/parking_cars',[ParkingCarController::class,'store']);

Route::get('/parking_cars', [ParkingCarController::class, 'index']); 

Route::get('/parking_cars/create', [ParkingCarController::class, 'create']); 
Route::get('/parking_cars/edit/{parking_car}', [ParkingCarController::class, 'edit']); 
Route::delete('/parking_cars/delete/{parking_car}', [ParkingCarController::class, 'delete']); 
Route::put('/parking_cars/{parking_car}', [ParkingCarController::class, 'update']);


//プラン名登録

Route::get('/myplan/name/index', [TravelPlanController::class, 'index']); 
Route::get('/myplan/name/create', [TravelPlanController::class, 'create']); 

Route::get('/myplan/name/{travel_plan}', [TravelPlanController::class, 'show']);
Route::post('/myplan/name/travel_plan', [TravelPlanController::class, 'store']);