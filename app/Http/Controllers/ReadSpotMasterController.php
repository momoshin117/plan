<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SpotMaster;
use App\Models\SpotReviewPhoto;
use App\Models\Category;
use App\Models\Prefecture;
use App\Models\Favorite;

class ReadSpotMasterController extends Controller
{
    public function index(){
        $categories=Category::get();
        $prefectures=Prefecture::get();
        $spot_masters=SpotMaster::paginate(3);
        $spot_review_photos=SpotReviewPhoto::with('spot_review')->get();
        
        return view('read_spot_masters.index')->with([
            'spot_masters' =>$spot_masters,
            'spot_review_photos' =>$spot_review_photos,
            'categories' =>$categories,
            'prefectures' =>$prefectures
        ]);
    }
    
    public function search(Request $request){
        
        $input=$request['read_spot_master_search'];
        $category_id=$input['category_id'];
        $prefecture_id=$input['prefecture_id'];
        $favorite_exit=$input['favorite'];
        $spot_review_photos=SpotReviewPhoto::with('spot_review')->get();
        
        $user_id=Auth::id();
        
        if($favorite_exit==1){
            if($category_id !=""){
                if($prefecture_id !=""){
                    $category=Category::find($category_id);
                    $prefecture=Prefecture::find($prefecture_id);
                    $spot_masters=SpotMaster::with('prefecture','category')->where('category_id','=',$category_id)->where('prefecture_id','=',$prefecture_id)->join('favorites','spot_masters.id','=','favorites.spot_master_id')->where('favorites.user_id','=',$user_id)->paginate(3);
                }else{
                    $category=Category::find($category_id);
                    $prefecture=new Prefecture();
                    $spot_masters=SpotMaster::with('prefecture','category')->where('category_id','=',$category_id)->join('favorites','spot_masters.id','=','favorites.spot_master_id')->where('favorites.user_id','=',$user_id)->paginate(3);
                }
            }else{
                if($prefecture_id !=""){
                    $category=new Category();
                    $prefecture=Prefecture::find($prefecture_id);
                    $spot_masters=SpotMaster::with('prefecture','category')->where('prefecture_id','=',$prefecture_id)->join('favorites','spot_masters.id','=','favorites.spot_master_id')->where('favorites.user_id','=',$user_id)->paginate(3);
                }else{
                    $category=new Category();
                    $prefecture=new Prefecture();
                    $spot_masters=SpotMaster::with('prefecture','category')->join('favorites','spot_masters.id','=','favorites.spot_master_id')->where('favorites.user_id','=',$user_id)->paginate(3);
                }
            }
        }else{
            if($category_id !=""){
                if($prefecture_id !=""){
                    $category=Category::find($category_id);
                    $prefecture=Prefecture::find($prefecture_id);
                    $spot_masters=SpotMaster::with('prefecture','category')->where('category_id','=',$category_id)->where('prefecture_id','=',$prefecture_id)->paginate(3);
                }else{
                    $category=Category::find($category_id);
                    $prefecture=new Prefecture();
                    $spot_masters=SpotMaster::with('prefecture','category')->where('category_id','=',$category_id)->paginate(3);
                    
                }
            }else{
                if($prefecture_id !=""){
                    $category=new Category();
                    $prefecture=Prefecture::find($prefecture_id);
                    $spot_masters=SpotMaster::with('prefecture','category')->where('prefecture_id','=',$prefecture_id)->paginate(3);
                }else{
                    $category=new Category();
                    $prefecture=new Prefecture();
                    $spot_masters=SpotMaster::with('prefecture','category')->paginate(3);
                }
            }
        };
        
        return view('read_spot_masters.index_search')->with([
                'spot_review_photos' =>$spot_review_photos,
                'category' =>$category,
                'prefecture' =>$prefecture,
                'favorite_exit'=>$favorite_exit,
                'spot_masters' =>$spot_masters,
        ]);
    }
}
