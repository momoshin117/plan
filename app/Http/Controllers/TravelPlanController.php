<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlan;
use App\Models\User;
use App\Models\TravelPlanSpot;
use App\Models\SpotMaster;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TravelPlanRequest;


class TravelPlanController extends Controller
{
     public function index(TravelPlan $travel_plan)
    {
        return view('travel_plans.index') ->with(['travel_plans'=>$travel_plan ->getPaginateByLimit()]);
    }
    
    public function create()
    {
        return view('travel_plans.create');
    }
    
    public function show($travel_plan)
    {
        $travel_plan_ent= TravelPlan::with('travel_plan_spots')->find($travel_plan);
        $travel_plan_spot=TravelPlanSpot::where('travel_plan_id','=',$travel_plan)->orderBy('arrive_date','asc')->orderBy('arrive_time', 'asc')->get();
        $money_total=TravelPlanSpot::selectRaw('SUM(money) as total')->where('travel_plan_id','=',$travel_plan)->first();
    
        return view('travel_plans.show') ->with([
            'travel_plan'=>$travel_plan_ent,
            'travel_plan_spots'=>$travel_plan_spot,
            'money_total'=>$money_total
            ]);
    }
    
    public function store(TravelPlanRequest $request, TravelPlan $travel_plan)
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
    public function update (TravelPlanRequest $request, TravelPlan $travel_plan)
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
    
    public function month(Request $request,TravelPlan $travel_plan)
    {
        $day=$request['departure'];
        $day_1=$day["year"]."-".$day["month"]."-"."01";
        
        if($day["month"]=='12')
        {
            $day_2=($day["year"]+1)."-".($day["month"]-11)."-"."01";
        }
        else
        {
            $day_2=$day["year"]."-".($day["month"]+1)."-"."01";
        }
        
        //$day_2=$day["year"]."-".$day["month"]."-"."31;
    
        $travel_plan = DB::table('travel_plans')
                ->where('departure_date', '>=',$day_1)
                ->where('departure_date', '<=',$day_2)
                ->orderBy('departure_date', 'ASC')
                ->get();
        
        return view('travel_plans.index_month') ->with(['travel_plans'=>$travel_plan,'day'=>$day]);
    }
    
}
