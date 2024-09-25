<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TravelPlan;
use App\Models\SpotMaster;
use App\Models\TravelPlanSpot;

class ReadTravelPlanController extends Controller
{
    public function index(){
        $user_id=Auth::id();
        $travel_plans=TravelPlan::with('user')->where('user_id','!=',$user_id)->OrderBy('updated_at','desc')->paginate(5);
        $spot_masters=SpotMaster::get();
        
        return view('read_travel_plans.index')->with([
            'travel_plans' => $travel_plans,
            'spot_masters' =>$spot_masters
        ]);
    }
    
    public function search(Request $request){
        
        $request->validate([
            'spot_master.spot_name'=>[
                function ($attribute, $value, $fail){
                    $spot_master=SpotMaster::where('spot_name','=',$value)->first();
                    if($spot_master==null){
                        $fail('該当のスポットは存在しません。');
                    }
                },
            ],
        ]);
        
        $user_id=Auth::id();
        
        $input=$request['spot_master'];
        $spot_master_name=$input['spot_name'];
        $spot_master=SpotMaster::where('spot_name','=',$spot_master_name)->first();
     
        $spot_master_id=$spot_master->id;
        $travel_plan_spots=TravelPlanSpot::with('travel_plan')->where('spot_master_id','=',$spot_master_id)->select('travel_plan_spots.travel_plan_id','travel_plan_spots.spot_master_id','travel_plan_spots.updated_at as travel_plan_spot_updated_at','travel_plans.user_id','travel_plans.plan_name','users.nickname')->join('travel_plans','travel_plan_spots.travel_plan_id','=','travel_plans.id')->where('disclose','=','公開')->join('users','travel_plans.user_id','=','users.id')->where('travel_plans.user_id','!=',$user_id)->orderBy('travel_plan_spot_updated_at','desc')->paginate(5);
        
        return view('read_travel_plans.index_search')->with([
            'travel_plan_spots' => $travel_plan_spots,
            'spot_master' =>$spot_master
        ]);
        
    }
}
