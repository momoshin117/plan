<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotMaster;
use App\Models\SpotReviewPhoto;
use App\Models\SpotReview;

class SpotMasterReviewController extends Controller
{
    public function show($spot_master_id){
        
        $spot_master=SpotMaster::find($spot_master_id);
        $spot_reviews=SpotReview::with('user')->where('spot_master_id','=',$spot_master_id)->orderBy('updated_at','desc')->get();
        $spot_review_photos=SpotReviewPhoto::orderBy('updated_at','desc')->get();
        
        return view('spot_master_reviews.show')->with([
            'spot_master'=>$spot_master,
            'spot_reviews'=>$spot_reviews,
            'spot_review_photos'=>$spot_review_photos,
            
        ]);
    }
}
