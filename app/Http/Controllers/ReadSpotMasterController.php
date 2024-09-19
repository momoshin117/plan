<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotMaster;
use App\Models\SpotReviewPhoto;

class ReadSpotMasterController extends Controller
{
    public function index(){
        $spot_masters=SpotMaster::get();
        $spot_review_photos=SpotReviewPhoto::with('spot_review')->get();
        
        return view('read_spot_masters.index')->with([
            'spot_masters' =>$spot_masters,
            'spot_review_photos' =>$spot_review_photos,
        ]);
    }
}
