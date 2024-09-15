<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotReview;
use App\Models\SpotReviewPhoto;
use Cloudinary;

class SpotReviewPhotoController extends Controller
{
    public function create(Request $request){
        $spot_review_id = $request->spot_review_id;
        $spot_review = SpotReview::with('spot_master')->find($spot_review_id);
        
        return view('spot_review_photos.create')->with([
            'spot_review' =>$spot_review,
        ]);
    }
    
    public function store(Request $request,SpotReviewPhoto $spot_review_photo){
        
        $input = $request['spot_review_photo'];
        $image_url = Cloudinary::upload($request->file('path')->getRealPath())->getSecurePath();
        $input += ['path' => $image_url];
        $spot_review_photo->fill($input)->save();
        
        $spot_review=SpotReview::find($input['spot_review_id']);
        
        $spot_review_photos=SpotReviewPhoto::where('spot_review_id','=',$spot_review->id)->get();
        
        return redirect('/review/'.$spot_review->id.'/show')->with([
            'spot_review'=>$spot_review,
            'spot_review_photos' =>$spot_review_photos,
        ]);
    }
    
    public function delete(SpotReviewPhoto $spot_review_photo){
        $spot_review_id=$spot_review_photo->spot_review->id;
        $spot_review_photo->delete();
        
        $spot_review = SpotReview::with('spot_master')->find($spot_review_id);
        $spot_review_photos=SpotReviewPhoto::where('spot_review_id','=',$spot_review->id)->get();
        
        return redirect('/review/'.$spot_review->id.'/show')->with([
            'spot_review'=>$spot_review,
            'spot_review_photos' =>$spot_review_photos,
        ]);
    }
}
