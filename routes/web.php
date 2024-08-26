<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingCarController;
use App\Http\Controllers\TravelPlanController;
use App\Http\Controllers\LoginWithGoogleController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//プラン名登録

Route::controller(TravelPlanController::class)->middleware(['auth'])->group(function(){
    Route::get('/myplan/name/index','index')->name('travel_plans');
    Route::get('/myplan/name/create','create'); 

    Route::get('/myplan/name/{travel_plan}','show');
    Route::post('/myplan/name/travel_plan', 'store');
});



//管理画面(駐車台数設定)

Route::controller(ParkingCarController::class)->middleware(['auth'])->group(function(){
    Route::post('/parking_cars','store');
    Route::get('/parking_cars', 'index'); 
    Route::get('/parking_cars/create','create'); 
    Route::get('/parking_cars/edit/{parking_car}', 'edit'); 
    Route::delete('/parking_cars/delete/{parking_car}', 'delete'); 
    Route::put('/parking_cars/{parking_car}', 'update');
});

//Googleログイン

Route::get('/auth/google', [LoginWithGoogleController::class, 'redirectToGoogle'])
    ->name('login.google');

Route::get('/auth/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback'])
    ->name('login.google.callback');

require __DIR__.'/auth.php';
