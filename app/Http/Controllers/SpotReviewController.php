<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SpotReview;
use App\Models\SpotReviewPhoto;
use App\Models\SpotMaster;
use App\Models\User;

class SpotReviewController extends Controller
{
    public function index(SpotReview $spot_review){
        $user= Auth::user();
        
        return view('spot_reviews.index')->with([
            'spot_reviews'=>$spot_review->getPaginateByLimit(),
            'user' =>$user,
        ]);
    }
    
    public function show(SpotReview $spot_review){
        $spot_review_photos=SpotReviewPhoto::where('spot_review_id','=',$spot_review->id)->get();
        $user_id= Auth::id();
            
        return view('spot_reviews.show')->with([
            'spot_review'=>$spot_review,
            'spot_review_photos' =>$spot_review_photos,
            'user_id' =>$user_id,
        ]);
    }
    
    public function create(){
        $spot_master=SpotMaster::get();
        $user = Auth::user();
        
        return view('spot_reviews.create')->with([
            'spot_masters' =>$spot_master,
            'user' =>$user,
        ]);
    }
    
    public function store(Request $request,SpotReview $spot_review){
        
        $input=$request['spot_review'];
        $spot_review->fill($input)->save();
        
        return redirect('/review/'.$spot_review->id.'/show')->with([
            'spot_review' => $spot_review,
        ]);
    }
    
    public function edit(SpotReview $spot_review){
        $spot_master=SpotMaster::get();
        
        return view('spot_reviews.edit')->with([
            'spot_masters' =>$spot_master,
            'spot_review' =>$spot_review,
        ]);
    }
    
    public function update(Request $request,SpotReview $spot_review){
        $input=$request['spot_review'];
        $spot_review->fill($input)->save();
        
        return redirect('/review/'.$spot_review->id.'/show')->with([
        ]);
    }
    
    public function delete(SpotReview $spot_review){
        $spot_review ->delete();
        return redirect('/review/index');
    }
}