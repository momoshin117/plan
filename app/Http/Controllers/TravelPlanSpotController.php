<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlanSpot;
use App\Models\TravelPlan;
use App\Models\SpotMaster;


class TravelPlanSpotController extends Controller
{
    public function create($travel_plan_id)
    {
        $travel_plan_spot=TravelPlanSpot::with('spot_master')->get();
        return view('travel_plan_spots.create') ->with([
            'travel_plan_spots' =>$travel_plan_spot,
            'travel_plan' =>$travel_plan_id
            ]);
    }
    
    public function store(Request $request,TravelPlanSpot $travel_plan_spot)
    {
        $input=$request['travel_plan_spot'];
        $travel_plan_spot->fill($input)->save();
        
        
        return redirect('/myplan/name/'.$travel_plan_spot->travel_plan_id);
    }
    
    
    
    /*public function index(TravelPlanSpot $travel_plan_spot)
    {
    
        return view('travel_plan_spots.index') ->with([
            
            'travel_plan_spots' => $travel_plan_spot->get()
            
        ]);
    }
    
    public function show($travel_plan)
    {
        $travel_plan_ent=TravelPlan::with('travel_plan_spot')->find($travel_plan);
        return view('travel_plans.show') ->with([
            'travel_plan'=>$travel_plan_ent,
            'travel_plan_spots'=>$travel_plan_ent->travel_plan_spots
        ]);
    }
    
    public function create(TravelPlanSpot $travel_plan_spot)
    {
        return view('travel_plan_spots.create') ->with([
            'travel_plan_spots'=>$travel_plan_spot->get()
            ]);
    }
    
    public function store(Request $request,TravelPlanSpot $travel_plan_spot)
    {
        $input=$request['travel_plan_spot'];
        $travel_plan_spot->fill($input)->save();
        
        return redirect('/myplan/spot/'.$travel_plan_spot->id);
    
    }
*/
}
