<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlan;
use App\Models\User;


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
    
    public function show(TravelPlan $travel_plan)
    {
        return view('travel_plans.show') ->with(['travel_plan'=>$travel_plan]);
    }
    
    public function store(Request $request, TravelPlan $travel_plan)
    {
        $input=$request['travel_plan'];
        $travel_plan->user_id = \Auth::id();
        $travel_plan->fill($input)->save();
        return redirect('/myplan/name/'.$travel_plan->id);
    }
    
    public function edit(TravelPlan $travel_plan)
    {
        return view('travel_plans.edit') ->with(['travel_plan'=>$travel_plan]);
    }
    public function update (Request $request, TravelPlan $travel_plan)
    {
        $input=$request['travel_plan'];
        $travel_plan->fill($input)->save();
        return redirect('/myplan/name/'.$travel_plan->id);
    }
    
    public function delete(TravelPlan $travel_plan)
    {
        $travel_plan->delete();
        return redirect('myplan/name/index');
    }
    
}
