<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlanSpot;
use App\Models\TravelPlan;
use App\Models\SpotMaster;
use App\Http\Requests\TravelPlanSpotRequest;


class TravelPlanSpotController extends Controller
{
    public function create($travel_plan_id,Request $request)
    {
        $spot_master=SpotMaster::get();
        $budget=$request->budget;
        $total=$request->total;
        $use_money=($budget-$total);
        
        $first_day=$request->first_day;
        $long=$request->long;
        $last_day=date('Y-m-d',strtotime($first_day.$long."day"));
  
        return view('travel_plan_spots.create') ->with([
            'spot_masters' =>$spot_master,
            'travel_plan' =>$travel_plan_id,
            'use_money' =>$use_money,
            'first_day'=>$first_day,
            'last_day'=>$last_day,
        ]);
    }
    
    public function store(TravelPlanSpotRequest $request,TravelPlanSpot $travel_plan_spot)
    {
       
        $first_day=$request->first_day;
        $last_day=$request->last_day;
        $input=$request['travel_plan_spot'];
        $travel_plan_spot->fill($input);
        
        $registar_arrive=strtotime($travel_plan_spot->arrive_date.$travel_plan_spot->arrive_time);
        $registar_departure=strtotime($travel_plan_spot->departure_date.$travel_plan_spot->departure_time);
        
        $searchs_count=TravelPlanSpot::where('travel_plan_id','=',$travel_plan_spot->travel_plan_id)->count();
    
        $searchs=TravelPlanSpot::where('travel_plan_id','=',$travel_plan_spot->travel_plan_id)->get();
        
        
        foreach($searchs as $search){
            $search_arrive[]=strtotime($search->arrive_date.$search->arrive_time);
            $search_departure[]=strtotime($search->departure_date.$search->departure_time);
        }
        
        
        //$forNum =(Count($search_arrive));

        for($i=0;$i<$searchs_count;$i++){
            if($search_departure[$i]<$registar_arrive || $search_arrive[$i]>$registar_departure){
                
            }
            else{
                $spot_master=SpotMaster::get();
                return view('travel_plan_spots.create') ->with([
                    'spot_masters' =>$spot_master,
                    'travel_plan' =>$travel_plan_spot->travel_plan_id,
                    'use_money' =>$request->use_money,
                    'first_day'=>$first_day,
                    'last_day'=>$last_day
                ]);
            }
        }
            
        $travel_plan_spot->save();
            return redirect('/myplan/name/'.$travel_plan_spot->travel_plan_id);
    }
    
    public function edit(TravelPlanSpot $travel_plan_spot,Request $request)
    {
        $first_day=$request->first_day;
        $long=$request->long;
        $last_day=date('Y-m-d',strtotime($first_day.$long."day"));
        
        
        $spot_master=SpotMaster::get();
        $budget=$request->budget;
        $total=$request->total;
        $use_money=($budget-$total);
        
        return view('travel_plan_spots.edit') ->with
        ([
            'travel_plan_spot'=>$travel_plan_spot,
            'spot_masters'=>$spot_master,
            'use_money' =>$use_money,
            'first_day'=>$first_day,
            'last_day'=>$last_day
            
        ]);    
    }
    
    public function update(TravelPlanSpotRequest $request,TravelPlanSpot $travel_plan_spot)
    {
        $input=$request['travel_plan_spot'];
        $travel_plan_spot->fill($input)->save();
        
        return redirect('/myplan/name/'.$travel_plan_spot->travel_plan_id);
    }
    
    public function delete (TravelPlanSpot $travel_plan_spot)
    {
        $travel_plan_id=$travel_plan_spot->travel_plan_id;
        $travel_plan_spot->delete();
        return redirect('/myplan/name/'.$travel_plan_id);
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
