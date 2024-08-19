<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingCar;

class ParkingCar extends Controller
{
    public function index(ParkingCar $parking_car)
    {
        return $parking_car ->get();
    }
    
}
