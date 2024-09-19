<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReadSpotMasterRequest;
use App\Models\SpotMaster;
use App\Models\SpotReviewPhoto;
use App\Models\Category;
use App\Models\Prefecture;

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
    
    public function search(ReadSpotMasterRequest $request){
        
        $input=$request['read_spot_master_search'];
        $category_id=$input['category_id'];
        $prefecture_id=$input['prefecture_id'];
        $spot_review_photos=SpotReviewPhoto::with('spot_review')->get();
        
        if($category_id !=""){
            if($prefecture_id !=""){
                $category=Category::find($category_id);
                $prefecture=Prefecture::find($prefecture_id);
                $spot_masters=SpotMaster::where('category_id','=',$category_id)->where('prefecture_id','=',$prefecture_id)->paginate(3);
                
                return view('read_spot_masters.search_category_prefecture')->with([
                    'spot_masters' =>$spot_masters,
                    'spot_review_photos' =>$spot_review_photos,
                    'category' =>$category,
                    'prefecture' =>$prefecture
                ]);
            }else{
                $category=Category::find($category_id);
                $spot_masters=SpotMaster::where('category_id','=',$category_id)->orderBy('prefecture_id','asc')->paginate(3);
                
                return view('read_spot_masters.search_category')->with([
                    'spot_masters' =>$spot_masters,
                    'spot_review_photos' =>$spot_review_photos,
                    'category' =>$category,
                ]);
            }
        }else{
            if($prefecture_id !=""){
                $prefecture=Prefecture::find($prefecture_id);
                $spot_masters=SpotMaster::where('prefecture_id','=',$prefecture_id)->orderBy('category_id','asc')->paginate(3);
                
                return view('read_spot_masters.search_prefecture')->with([
                    'spot_masters' =>$spot_masters,
                    'spot_review_photos' =>$spot_review_photos,
                    'prefecture' =>$prefecture
                ]);
            }
        }
    }
}
