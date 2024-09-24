<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpotReviewRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\SpotReview;
use App\Models\SpotReviewPhoto;
use App\Models\SpotMaster;
use App\Models\User;

class SpotReviewController extends Controller
{
    public function index(SpotReview $spot_review){
        $user= Auth::user();
        $spot_reviews=SpotReview::with('spot_master','user')->where('user_id','=',$user->id)->orderBy('updated_at','desc')->paginate(3);
        
        return view('spot_reviews.index')->with([
            'user' =>$user,
            'spot_reviews'=>$spot_reviews
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
    
    public function store(SpotReviewRequest $request,SpotReview $spot_review){
        
        $input=$request['spot_review'];
        $spot_review->fill($input)->save();
        
        $new_avg_spot_review_score=SpotReview::where('spot_master_id','=',$spot_review->spot_master_id)->avg('score');
        $spot_review_count=SpotReview::where('spot_master_id','=',$spot_review->spot_master_id)->count();
        
        $spot_master=SpotMaster::find($spot_review->spot_master_id);
        $spot_master->review_average_score=($new_avg_spot_review_score==0?0:$new_avg_spot_review_score);
        $spot_master->review_count=$spot_review_count;
        $spot_master->save();
        
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
    
    public function update(SpotReviewRequest $request,SpotReview $spot_review){
        $input=$request['spot_review'];
        $spot_review->fill($input)->save();
        
        $new_avg_spot_review_score=SpotReview::where('spot_master_id','=',$spot_review->spot_master_id)->avg('score');
        $spot_review_count=SpotReview::where('spot_master_id','=',$spot_review->spot_master_id)->count();
        
        $spot_master=SpotMaster::find($spot_review->spot_master_id);
        $spot_master->review_average_score=($new_avg_spot_review_score==0?0:$new_avg_spot_review_score);;
        $spot_master->review_count=$spot_review_count;
        $spot_master->save();
        
        return redirect('/review/'.$spot_review->id.'/show')->with([
        ]);
    }
    
    public function delete(SpotReview $spot_review){
        $spot_review ->delete();
        
        $new_avg_spot_review_score=SpotReview::where('spot_master_id','=',$spot_review->spot_master_id)->avg('score');
        $spot_review_count=SpotReview::where('spot_master_id','=',$spot_review->spot_master_id)->count();
        
        $spot_master=SpotMaster::find($spot_review->spot_master_id);
        $spot_master->review_average_score=($new_avg_spot_review_score==0?0:$new_avg_spot_review_score);;
        $spot_master->review_count=$spot_review_count;
        $spot_master->save();
        
        return redirect('/review/index');
    }
}