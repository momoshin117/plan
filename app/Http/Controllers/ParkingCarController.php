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
    
    public function create()
    {
        return view('parking_cars.create');
    }
    
    public function store(Request $request,ParkingCar $parking_car)
    {
        $input=$request['parking_cars'];
        $parking_car->fill($input) ->save();
        return redirect('/parking_cars');
    }
    
    public function edit(ParkingCar $parking_car)
    {
        return view('parking_cars.edit') ->with(['parking_car'=>$parking_car]);
    }
    
    public function update(Request $request,ParkingCar $parking_car)
    {
        $input_2=$request['parking_car'];
        $parking_car->fill($input_2) ->save();
        return redirect('/parking_cars');
    }
    
    public function delete(ParkingCar $parking_car)
    {
        $parking_car->delete();
        return redirect('/parking_cars');
    }
}
