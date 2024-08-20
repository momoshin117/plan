<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlan;


class TravelPlanController extends Controller
{
     public function index(TravelPlan $travel_plan)
    {
        return view('travel_plans.index') ->with(['travel_plans'=>$travel_plan ->get()]);
    }
    
    public function create()
    {
        return view('travel_plans.create');
    }
    
    
}
