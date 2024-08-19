<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingCar;

class ParkingCarController extends Controller
{
    public function index(ParkingCar $parking_car)
    {
        return view('parking_cars.index') ->with(['parking_cars'=>$parking_car ->get()]);
    }
}
