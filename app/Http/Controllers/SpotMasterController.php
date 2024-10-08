<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SpotMaster;
use App\Models\SpotPhoto;
use App\Models\SpotReview;
use App\Models\Favorite;
use App\Models\User;
use App\Models\TravelPlanSpot;

class SpotMasterController extends Controller
{
    public function show($spot_master_id,Request $request)
    {
        $user_id= Auth::id();
        $favorite_exit=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->exists();
        
        $favorite_count=Favorite::where('spot_master_id','=',$spot_master_id)->count();
        $user_count=User::count();
        
        if($favorite_exit){
            $favorite=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->first();
        }else{
            $favorite=NULL;
        }
        
        $travel_plan_id=$request->travel_plan_id;
        $url_before=$request->before;
        $spot_review_id=$request->spot_review_id;
        
        $new_avg_spot_review_score=SpotReview::where('spot_master_id','=',$spot_master_id)->avg('score');
        $spot_review_count=SpotReview::where('spot_master_id','=',$spot_master_id)->count();
        $spot_master=SpotMaster::with('category','prefecture','parking_car')->find($spot_master_id);
        $spot_master->review_average_score=($new_avg_spot_review_score==0?0:$new_avg_spot_review_score);
        $spot_master->review_count=$spot_review_count;
        $spot_master->save();
        
        $google_map_url='https://maps.googleapis.com/maps/api/js?key='.config('services.google_map.key').'&callback=initMap';
        $spot_photo=SpotPhoto::with('spot_master')->where('spot_master_id','=',$spot_master_id)->get();
        
        $spot_review_recently=SpotReview::with('spot_review_photos','user')->where('spot_master_id','=',$spot_master_id)->orderBy('updated_at','desc')->first();
        
        $travel_plan_spots_isset=NULL;
        $travel_plan_spots_isset=TravelPlanSpot::with('travel_plan')->where('spot_master_id','=',$spot_master_id)->select('travel_plan_spots.travel_plan_id','travel_plan_spots.spot_master_id','travel_plan_spots.updated_at as travel_plan_spot_updated_at','travel_plans.user_id','travel_plans.plan_name','users.nickname')->join('travel_plans','travel_plan_spots.travel_plan_id','=','travel_plans.id')->where('disclose','=','公開')->join('users','travel_plans.user_id','=','users.id')->where('travel_plans.user_id','!=',$user_id)->orderBy('travel_plan_spot_updated_at','desc')->first();
        $travel_plan_spots=TravelPlanSpot::with('travel_plan')->where('spot_master_id','=',$spot_master_id)->select('travel_plan_spots.travel_plan_id','travel_plan_spots.spot_master_id','travel_plan_spots.updated_at as travel_plan_spot_updated_at','travel_plans.user_id','travel_plans.plan_name','users.nickname')->join('travel_plans','travel_plan_spots.travel_plan_id','=','travel_plans.id')->where('disclose','=','公開')->join('users','travel_plans.user_id','=','users.id')->where('travel_plans.user_id','!=',$user_id)->orderBy('travel_plan_spot_updated_at','desc')->take(3)->get();
        
        $rakuten_hotel_basic_info=NULL;
        
        if($spot_master->category->category=="ホテル"){
            $client = new \GuzzleHttp\Client();
            $applicationID =config('services.rakuten_travel.id');
            $url = 'https://app.rakuten.co.jp/services/api/Travel/HotelDetailSearch/20170426?format=json&datumType=1&hotelNo='.$spot_master->rakuten_hotel_id.'&applicationId='.$applicationID;

            $response = $client->request(
                'GET',
                $url,
            );
        
            $rakuten = json_decode($response->getBody(), true);
            $rakuten_hotel_basic_info=$rakuten['hotels'][0]['hotel'][0]['hotelBasicInfo'];
        }
            
        return view('spot_masters.show')->with([
            'spot_master'=>$spot_master,
            'spot_photos'=>$spot_photo,
            'travel_plan_id'=>$travel_plan_id,
            'google_map_url' =>$google_map_url,
            'rakuten'=>$rakuten_hotel_basic_info,
            'spot_review_recently'=>$spot_review_recently,
            'url_before' =>$url_before,
            'spot_review_id'=>$spot_review_id,
            'favorite_exit' =>$favorite_exit,
            'favorite' =>$favorite,
            'favorite_count' =>$favorite_count,
            'user_count' =>$user_count,
            'travel_plan_spots'=>$travel_plan_spots,
            'travel_plan_spots_isset' =>$travel_plan_spots_isset,
        ]);
    }
    
    public function do_favorite(Request $request,Favorite $favorite){
        $user_id=Auth::id();
        $input=$request['favorite'];
        $input+=['user_id' => $user_id];
        $favorite->fill($input)->save();
        
        $spot_master_id=$request->spot_master_id;
        
        
        $favorite_exit=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->exists();
        $favorite=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->first();
        
        $favorite_count=Favorite::where('spot_master_id','=',$spot_master_id)->count();
        $user_count=User::count();
        
        $travel_plan_id=$request->travel_plan_id;
        $url_before=$request->url_before;
        $spot_review_id=$request->spot_review_id;
        
        $new_avg_spot_review_score=SpotReview::where('spot_master_id','=',$spot_master_id)->avg('score');
        $spot_review_count=SpotReview::where('spot_master_id','=',$spot_master_id)->count();
        $spot_master=SpotMaster::with('category','prefecture','parking_car')->find($spot_master_id);
        $spot_master->review_average_score=($new_avg_spot_review_score==0?0:$new_avg_spot_review_score);
        $spot_master->review_count=$spot_review_count;
        $spot_master->save();
        
        $google_map_url='https://maps.googleapis.com/maps/api/js?key='.config('services.google_map.key').'&callback=initMap';
        $spot_photo=SpotPhoto::with('spot_master')->where('spot_master_id','=',$spot_master_id)->get();
        
        $spot_review_recently=SpotReview::with('spot_review_photos','user')->where('spot_master_id','=',$spot_master_id)->orderBy('updated_at','desc')->first();
       
        $travel_plan_spots_isset=NULL;
        $travel_plan_spots_isset=TravelPlanSpot::with('travel_plan')->where('spot_master_id','=',$spot_master_id)->select('travel_plan_spots.travel_plan_id','travel_plan_spots.spot_master_id','travel_plan_spots.updated_at as travel_plan_spot_updated_at','travel_plans.user_id','travel_plans.plan_name','users.nickname')->join('travel_plans','travel_plan_spots.travel_plan_id','=','travel_plans.id')->where('disclose','=','公開')->join('users','travel_plans.user_id','=','users.id')->where('travel_plans.user_id','!=',$user_id)->orderBy('travel_plan_spot_updated_at','desc')->first();
        $travel_plan_spots=TravelPlanSpot::with('travel_plan')->where('spot_master_id','=',$spot_master_id)->select('travel_plan_spots.travel_plan_id','travel_plan_spots.spot_master_id','travel_plan_spots.updated_at as travel_plan_spot_updated_at','travel_plans.user_id','travel_plans.plan_name','users.nickname')->join('travel_plans','travel_plan_spots.travel_plan_id','=','travel_plans.id')->where('disclose','=','公開')->join('users','travel_plans.user_id','=','users.id')->where('travel_plans.user_id','!=',$user_id)->orderBy('travel_plan_spot_updated_at','desc')->take(3)->get();
        
        $rakuten_hotel_basic_info=NULL;
    
        if($spot_master->category->category=="ホテル"){
            $client = new \GuzzleHttp\Client();
            $applicationID =config('services.rakuten_travel.id');
            $url = 'https://app.rakuten.co.jp/services/api/Travel/HotelDetailSearch/20170426?format=json&datumType=1&hotelNo='.$spot_master->rakuten_hotel_id.'&applicationId='.$applicationID;
        
            $response = $client->request(
                'GET',
                $url,
            );
        
            $rakuten = json_decode($response->getBody(), true);
            $rakuten_hotel_basic_info=$rakuten['hotels'][0]['hotel'][0]['hotelBasicInfo'];
        }
            
        return view('spot_masters.show')->with([
            'spot_master'=>$spot_master,
            'spot_photos'=>$spot_photo,
            'travel_plan_id'=>$travel_plan_id,
            'google_map_url' =>$google_map_url,
            'rakuten'=>$rakuten_hotel_basic_info,
            'spot_review_recently'=>$spot_review_recently,
            'url_before' =>$url_before,
            'spot_review_id'=>$spot_review_id,
            'favorite_exit' =>$favorite_exit,
            'favorite' =>$favorite,
            'favorite_count' =>$favorite_count,
            'user_count' =>$user_count,
            'travel_plan_spots'=>$travel_plan_spots,
            'travel_plan_spots_isset' =>$travel_plan_spots_isset,
        ]);
    }
    
    public function dis_favorite($spot_master_id,Request $request){
        $user_id=Auth::id();
        
        Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->delete();
        
        $favorite_exit=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->exists();
        $favorite=NULL;
        
        $favorite_count=Favorite::where('spot_master_id','=',$spot_master_id)->count();
        $user_count=User::count();
        
        $travel_plan_id=$request->travel_plan_id;
        $url_before=$request->url_before;
        $spot_review_id=$request->spot_review_id;
        
        $new_avg_spot_review_score=SpotReview::where('spot_master_id','=',$spot_master_id)->avg('score');
        $spot_review_count=SpotReview::where('spot_master_id','=',$spot_master_id)->count();
        $spot_master=SpotMaster::with('category','prefecture','parking_car')->find($spot_master_id);
        $spot_master->review_average_score=($new_avg_spot_review_score==0?0:$new_avg_spot_review_score);;
        $spot_master->review_count=$spot_review_count;
        $spot_master->save();
        
        $google_map_url='https://maps.googleapis.com/maps/api/js?key='.config('services.google_map.key').'&callback=initMap';
        $spot_photo=SpotPhoto::with('spot_master')->where('spot_master_id','=',$spot_master_id)->get();
        
        $spot_review_recently=SpotReview::with('spot_review_photos','user')->where('spot_master_id','=',$spot_master_id)->orderBy('updated_at','desc')->first();
    
        $travel_plan_spots_isset=NULL;
        $travel_plan_spots_isset=TravelPlanSpot::with('travel_plan')->where('spot_master_id','=',$spot_master_id)->select('travel_plan_spots.travel_plan_id','travel_plan_spots.spot_master_id','travel_plan_spots.updated_at as travel_plan_spot_updated_at','travel_plans.user_id','travel_plans.plan_name','users.nickname')->join('travel_plans','travel_plan_spots.travel_plan_id','=','travel_plans.id')->where('disclose','=','公開')->join('users','travel_plans.user_id','=','users.id')->where('travel_plans.user_id','!=',$user_id)->orderBy('travel_plan_spot_updated_at','desc')->first();
        $travel_plan_spots=TravelPlanSpot::with('travel_plan')->where('spot_master_id','=',$spot_master_id)->select('travel_plan_spots.travel_plan_id','travel_plan_spots.spot_master_id','travel_plan_spots.updated_at as travel_plan_spot_updated_at','travel_plans.user_id','travel_plans.plan_name','users.nickname')->join('travel_plans','travel_plan_spots.travel_plan_id','=','travel_plans.id')->where('disclose','=','公開')->join('users','travel_plans.user_id','=','users.id')->where('travel_plans.user_id','!=',$user_id)->orderBy('travel_plan_spot_updated_at','desc')->take(3)->get();
        
        $rakuten_hotel_basic_info=NULL;
        
        if($spot_master->category->category=="ホテル"){
            $client = new \GuzzleHttp\Client();
            $applicationID =config('services.rakuten_travel.id');
            $url = 'https://app.rakuten.co.jp/services/api/Travel/HotelDetailSearch/20170426?format=json&datumType=1&hotelNo='.$spot_master->rakuten_hotel_id.'&applicationId='.$applicationID;
        
            $response = $client->request(
                'GET',
                $url,
            );
        
            $rakuten = json_decode($response->getBody(), true);
            $rakuten_hotel_basic_info=$rakuten['hotels'][0]['hotel'][0]['hotelBasicInfo'];
        }
            
        return view('spot_masters.show')->with([
            'spot_master'=>$spot_master,
            'spot_photos'=>$spot_photo,
            'travel_plan_id'=>$travel_plan_id,
            'google_map_url' =>$google_map_url,
            'rakuten'=>$rakuten_hotel_basic_info,
            'spot_review_recently'=>$spot_review_recently,
            'url_before' =>$url_before,
            'spot_review_id'=>$spot_review_id,
            'favorite_exit' =>$favorite_exit,
            'favorite' =>$favorite,
            'favorite_count' =>$favorite_count,
            'user_count' =>$user_count,
            'travel_plan_spots'=>$travel_plan_spots,
            'travel_plan_spots_isset' =>$travel_plan_spots_isset,
        ]);
    }
}
