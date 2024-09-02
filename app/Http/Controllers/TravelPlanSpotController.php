<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlanSpot;
use App\Models\TravelPlan;


class TravelPlanSpotController extends Controller
{
   /* public function index(TravelPlanSpot $travel_plan_spot)
    {
    
        return view('travel_plan_spots.index') ->with([
            
            'travel_plan_spots' => $travel_plan_spot->get()
            
        ]);
    }
    
    public function show(TravelPlanSpot $travel_plan_spot)
    {
        return view('travel_plan_spots.show') ->with([
            'travel_plan_spot'=>$travel_plan_spot,
        ]);
    }
    */
    
    public function create(TravelPlanSpot $travel_plan_spot,$travel_plan)
    {
        return view('travel_plan_spots.create') ->with([
            'travel_plan_spots'=>$travel_plan_spot->get(),
            'travel_plan_id'=>$travel_plan
            ]);
    }
    
    public function store(Request $request,TravelPlanSpot $travel_plan_spot)
    {
        $input=$request['travel_plan_spot'];
        $travel_plan_spot->fill($input)->save();
        
        return redirect('/myplan/name/'.$travel_plan_spot->id);
    }
    
    public function edit(TravelPlanSpot $travel_plan_spot)
    {
        return view('travel_plan_spots.edit')->with([
            'travel_plan_spot'=>$travel_plan_spot,
            
        ]);
        
    }
    
}
