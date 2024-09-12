<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotReview;
use App\Models\SpotReviewPhoto;
use App\Models\SpotMaster;

class SpotReviewController extends Controller
{
    public function index(SpotReview $spot_review){
        
        return view('spot_reviews.index')->with([
            'spot_reviews'=>$spot_review->getPaginateByLimit()
        ]);
    }
    
    public function show(SpotReview $spot_review){
        return view('spot_reviews.show')->with([
            'spot_review'=>$spot_review
        ]);
    }
    
    public function create(){
        $spot_master=SpotMaster::get();
        
        return view('spot_reviews.create')->with([
            'spot_masters' =>$spot_master,
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