<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingCarController;
use App\Http\Controllers\TravelPlanController;
use App\Http\Controllers\TravelPlanSpotController;
use App\Http\Controllers\SpotMasterController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\SpotPhotoController;
use App\Http\Controllers\SpotReviewController;
use App\Http\Controllers\SpotReviewPhotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpotMasterReviewController;

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
/*

Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', function () {
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
    Route::post('/myplan/name', 'store');
    Route::get('/myplan/name/{travel_plan}/edit','edit');
    Route::PUT('/myplan/name/{travel_plan}','update');
    Route::delete('/myplan/name/{travel_plan}','delete');
    
    Route::post('/myplan/name/month', 'month');
});

//訪問スポット登録

Route::controller(TravelPlanSpotController::class)->middleware(['auth'])->group(function(){
    Route::get('/myplan/spot/{travel_plan_id}/create','create');
    Route::post('/myplan/spot/store','store');
    Route::get('/myplan/spot/{travel_plan_spot}/edit','edit');
    Route::delete('/myplan/spot/{travel_plan_spot}/delete','delete');
    Route::PUT('/myplan/spot/{travel_plan_spot}/update','update');

});


//口コミ登録
Route::controller(SpotReviewController::class)->middleware(['auth'])->group(function(){
    Route::get('/review/index','index');
    Route::get('/review/create','create');
    Route::post('/review/store','store');
    Route::get('/review/{spot_review}/show','show');
    Route::get('/review/{spot_review}/edit','edit');
    Route::put('/review/{spot_review}/update','update');
    Route::delete('/review/{spot_review}/delete','delete');
});

//口コミ写真登録
Route::controller(SpotReviewPhotoController::class)->middleware(['auth'])->group(function(){
    Route::get('/review/photo/create','create');
    Route::post('/review/photo/store','store');
    Route::delete('/review/photo/{spot_review_photo}/delete','delete');
});


//施設詳細情報
Route::controller(SpotMasterController::class)->middleware(['auth'])->group(function(){
    Route::get('/spot_master/{spot_master}/show','show');
});

//口コミ(施設詳細)
Route::controller(SpotMasterReviewController::class)->middleware(['auth'])->group(function(){
    Route::get('/spot_master/review/{spot_master}/show','show');
});


//管理画面(駐車台数設定)

Route::controller(ParkingCarController::class)->middleware(['auth','can:admin'])->group(function(){
    Route::post('/parking_cars','store');
    Route::get('/parking_cars', 'index'); 
    Route::get('/parking_cars/create','create'); 
    Route::get('/parking_cars/edit/{parking_car}', 'edit'); 
    Route::delete('/parking_cars/delete/{parking_car}', 'delete'); 
    Route::put('/parking_cars/{parking_car}', 'update');
});

//管理画面(スポットマスターへの画像挿入)
Route::controller(SpotPhotoController::class)->middleware(['auth','can:admin'])->group(function(){
    Route::get('/maneger/spot_photo/create','create');
    Route::post('/maneger/spot_photo/store','store');
    Route::get('/manager/spot_photo/index','index');
    Route::delete('/maneger/spot_photo/{spot_photo}/delete','delete');
});

//ニックネーム登録
Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    Route::get('/user/nickname/index','index');
    Route::get('/user/nickname/create','create');
    Route::post('/user/nickname/store','store');
    Route::get('/user/nickname/edit','edit');
    Route::put('/user/nickname/update','update');
});

//Googleログイン

Route::get('/auth/google', [LoginWithGoogleController::class, 'redirectToGoogle'])
    ->name('login.google');

Route::get('/auth/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback'])
    ->name('login.google.callback');

require __DIR__.'/auth.php';
