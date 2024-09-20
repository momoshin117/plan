<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TravelPlanSpot;
use App\Models\TravelPlan;
use App\Models\SpotMaster;
use App\Models\Category;
use App\Models\Prefecture;
use App\Models\Favorite;
use App\Http\Requests\TravelPlanSpotRequest;


class TravelPlanSpotController extends Controller
{
    public function create($travel_plan_id,Request $request)
    {
        $spot_master=SpotMaster::get();
        $categories=Category::get();
        $prefectures=Prefecture::get();
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
            'categories'=>$categories,
            'prefectures'=>$prefectures,
        ]);
    }
    
    public function create_search($travel_plan_id,Request $request)
    {
        $input=$request['travel_plan_spot_search'];
        $category_id=$input['category_id'];
        $prefecture_id=$input['prefecture_id'];
        $favorite_exit=$input['favorite'];
        
        $user_id=Auth::id();
        
        $use_money=$request->use_money;
        $first_day=$request->first_day;
        $last_day=$request->last_day;
        
        if($favorite_exit==1){
            if($category_id !=""){
                if($prefecture_id !=""){
                    $category=Category::find($category_id);
                    $prefecture=Prefecture::find($prefecture_id);
                    $spot_masters=Favorite::where('user_id','=',$user_id)->join('spot_masters','favorites.spot_master_id','=','spot_masters.id')->where('category_id','=',$category_id)->where('prefecture_id','=',$prefecture_id)->get();
                }else{
                    $category=Category::find($category_id);
                    $prefecture=new Prefecture();
                    $spot_masters=Favorite::where('user_id','=',$user_id)->join('spot_masters','favorites.spot_master_id','=','spot_masters.id')->where('category_id','=',$category_id)->get();
                    
                }
            }else{
                if($prefecture_id !=""){
                    $category=new Category();
                    $prefecture=Prefecture::find($prefecture_id);
                    $spot_masters=Favorite::where('user_id','=',$user_id)->join('spot_masters','favorites.spot_master_id','=','spot_masters.id')->where('prefecture_id','=',$prefecture_id)->get();
                }else{
                    $category=new Category();
                    $prefecture=new Prefecture();
                    $spot_masters=Favorite::where('user_id','=',$user_id)->join('spot_masters','favorites.spot_master_id','=','spot_masters.id')->get();
                    
                }
                
            }
        }else{
            if($category_id !=""){
                if($prefecture_id !=""){
                    $category=Category::find($category_id);
                    $prefecture=Prefecture::find($prefecture_id);
                    $spot_masters=SpotMaster::where('category_id','=',$category_id)->where('prefecture_id','=',$prefecture_id)->get();
                }else{
                    $category=Category::find($category_id);
                    $prefecture=new Prefecture();
                    $spot_masters=SpotMaster::where('category_id','=',$category_id)->get();
                    
                }
            }else{
                if($prefecture_id !=""){
                    $category=new Category();
                    $prefecture=Prefecture::find($prefecture_id);
                    $spot_masters=SpotMaster::where('prefecture_id','=',$prefecture_id)->get();
                }else{
                    $category=new Category();
                    $prefecture=new Prefecture();
                    $spot_masters=SpotMaster::get();
                }
            }
        };
        
        return view('travel_plan_spots.create_search') ->with([
            'category' =>$category,
            'prefecture' =>$prefecture,
            'favorite_exit'=>$favorite_exit,
            'spot_masters' =>$spot_masters,
            'travel_plan' =>$travel_plan_id,
            'use_money' =>$use_money,
            'first_day'=>$first_day,
            'last_day'=>$last_day,
        ]);
    }
    
    public function store(TravelPlanSpotRequest $request,TravelPlanSpot $travel_plan_spot)
    {
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
        
        $count_else=0;

        for($i=0;$i<$searchs_count;$i++){
            if($search_departure[$i]<$registar_arrive || $search_arrive[$i]>$registar_departure){
                
            }
            else{
                session()->flash('flashWarning', '重複した予定があります。確認してください。');
                $count_else++;
            }
        }
        
        if($count_else ==0){
            session()->flash('flashSuccess', '登録が完了しました。');
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
        $travel_plan_spot->fill($input);
        
        $registar_arrive=strtotime($travel_plan_spot->arrive_date.$travel_plan_spot->arrive_time);
        $registar_departure=strtotime($travel_plan_spot->departure_date.$travel_plan_spot->departure_time);
        
        $searchs_count=TravelPlanSpot::where('travel_plan_id','=',$travel_plan_spot->travel_plan_id)->count();
    
        $searchs=TravelPlanSpot::where('travel_plan_id','=',$travel_plan_spot->travel_plan_id)->get();
        
        
        foreach($searchs as $search){
            $search_arrive[]=strtotime($search->arrive_date.$search->arrive_time);
            $search_departure[]=strtotime($search->departure_date.$search->departure_time);
        }
        
        $count_else=0;

        for($i=0;$i<$searchs_count;$i++){
            if($search_departure[$i]<$registar_arrive || $search_arrive[$i]>$registar_departure){
                
            }
            else{
                session()->flash('flashWarning', '重複した予定があります。確認してください。');
                $count_else++;
            }
        }
        
        if($count_else ==0){
            session()->flash('flashSuccess', '登録が完了しました。');
        }
            
        $travel_plan_spot->save();
        return redirect('/myplan/name/'.$travel_plan_spot->travel_plan_id);
    }
    
    public function delete (TravelPlanSpot $travel_plan_spot)
    {
        $travel_plan_id=$travel_plan_spot->travel_plan_id;
        $travel_plan_spot->delete();
        return redirect('/myplan/name/'.$travel_plan_id);
    }

}
