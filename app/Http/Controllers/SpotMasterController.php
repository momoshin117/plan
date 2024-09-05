<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotMaster;

class SpotMasterController extends Controller
{
    public function show($spot_master_id,Request $request)
    {
        $travel_plan_id=$request->travel_plan_id;
        $spot_master=SpotMaster::with('category','prefecture','parking_car')->find($spot_master_id);

        return view('spot_masters.show')->with([
            'spot_master'=>$spot_master,
            'travel_plan_id'=>$travel_plan_id
        ]);
        
    }
}
