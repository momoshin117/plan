<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SpotMaster;
use App\Models\SpotPhoto;
use App\Models\SpotReview;
use App\Models\Favorite;

class SpotMasterController extends Controller
{
    public function show($spot_master_id,Request $request)
    {
        $user_id= Auth::id();
        $favorite_exit=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->exists();
        
        if($favorite_exit){
            $favorite=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->first();
        }else{
            $favorite=NULL;
        }
        
        
        $travel_plan_id=$request->travel_plan_id;
        $url_before=$request->before;
        $spot_review_id=$request->spot_review_id;
        $spot_master=SpotMaster::with('category','prefecture','parking_car')->find($spot_master_id);
        
        $google_map_url='https://maps.googleapis.com/maps/api/js?key='.config('services.google_map.key').'&callback=initMap';
        $spot_photo=SpotPhoto::with('spot_master')->where('spot_master_id','=',$spot_master_id)->get();
        
        $spot_review_recently=SpotReview::with('spot_review_photos','user')->where('spot_master_id','=',$spot_master_id)->orderBy('updated_at','desc')->first();
        $avg_spot_review_score=Spotreview::where('spot_master_id','=',$spot_master_id)->avg('score');
        $count_spot_review_score=Spotreview::where('spot_master_id','=',$spot_master_id)->count();
        
    
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
            
            return view('spot_masters.show')->with([
                'spot_master'=>$spot_master,
                'spot_photos'=>$spot_photo,
                'travel_plan_id'=>$travel_plan_id,
                'google_map_url' =>$google_map_url,
                'rakuten'=>$rakuten_hotel_basic_info,
                'spot_review_recently'=>$spot_review_recently,
                'avg_spot_review_score'=>$avg_spot_review_score,
                'count_spot_review_score'=>$count_spot_review_score,
                'url_before' =>$url_before,
                'spot_review_id'=>$spot_review_id,
                'favorite_exit' =>$favorite_exit,
                'favorite' =>$favorite,
                
            ]);
            
        }else{
            return view('spot_masters.show')->with([
                'spot_master'=>$spot_master,
                'spot_photos'=>$spot_photo,
                'travel_plan_id'=>$travel_plan_id,
                'google_map_url' =>$google_map_url,
                'spot_review_recently'=>$spot_review_recently,
                'avg_spot_review_score'=>$avg_spot_review_score,
                'count_spot_review_score'=>$count_spot_review_score,
                'url_before' =>$url_before,
                'spot_review_id'=>$spot_review_id,
                'favorite_exit' =>$favorite_exit,
                'favorite' =>$favorite,
            ]);    
        };
    }
    
    public function do_favorite(Request $request,Favorite $favorite){
        $user_id=Auth::id();
        $input=$request['favorite'];
        $input+=['user_id' => $user_id];
        $favorite->fill($input)->save();
        
        $spot_master_id=$request->spot_master_id;
        
        
        $favorite_exit=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->exists();
        
        $favorite=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->first();
        
        $travel_plan_id=$request->travel_plan_id;
        $url_before=$request->url_before;
        $spot_review_id=$request->spot_review_id;
        $spot_master=SpotMaster::with('category','prefecture','parking_car')->find($spot_master_id);
        
        $google_map_url='https://maps.googleapis.com/maps/api/js?key='.config('services.google_map.key').'&callback=initMap';
        $spot_photo=SpotPhoto::with('spot_master')->where('spot_master_id','=',$spot_master_id)->get();
        
        $spot_review_recently=SpotReview::with('spot_review_photos','user')->where('spot_master_id','=',$spot_master_id)->orderBy('updated_at','desc')->first();
        $avg_spot_review_score=Spotreview::where('spot_master_id','=',$spot_master_id)->avg('score');
        $count_spot_review_score=Spotreview::where('spot_master_id','=',$spot_master_id)->count();
    
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
            
            return view('spot_masters.show')->with([
                'spot_master'=>$spot_master,
                'spot_photos'=>$spot_photo,
                'travel_plan_id'=>$travel_plan_id,
                'google_map_url' =>$google_map_url,
                'rakuten'=>$rakuten_hotel_basic_info,
                'spot_review_recently'=>$spot_review_recently,
                'avg_spot_review_score'=>$avg_spot_review_score,
                'count_spot_review_score'=>$count_spot_review_score,
                'url_before' =>$url_before,
                'spot_review_id'=>$spot_review_id,
                'favorite_exit' =>$favorite_exit,
                'favorite' =>$favorite,
                
            ]);
            
        }else{
            return view('spot_masters.show')->with([
                'spot_master'=>$spot_master,
                'spot_photos'=>$spot_photo,
                'travel_plan_id'=>$travel_plan_id,
                'google_map_url' =>$google_map_url,
                'spot_review_recently'=>$spot_review_recently,
                'avg_spot_review_score'=>$avg_spot_review_score,
                'count_spot_review_score'=>$count_spot_review_score,
                'url_before' =>$url_before,
                'spot_review_id'=>$spot_review_id,
                'favorite_exit' =>$favorite_exit,
                'favorite' =>$favorite,
            ]);    
        };
        
    }
    
    public function dis_favorite($spot_master_id,Request $request){
        $user_id=Auth::id();
        
        Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->delete();
        
        $favorite_exit=Favorite::where('user_id','=',$user_id)->where('spot_master_id','=',$spot_master_id)->exists();
        
        $favorite=NULL;
        
        $travel_plan_id=$request->travel_plan_id;
        $url_before=$request->url_before;
        $spot_review_id=$request->spot_review_id;
        $spot_master=SpotMaster::with('category','prefecture','parking_car')->find($spot_master_id);
        
        $google_map_url='https://maps.googleapis.com/maps/api/js?key='.config('services.google_map.key').'&callback=initMap';
        $spot_photo=SpotPhoto::with('spot_master')->where('spot_master_id','=',$spot_master_id)->get();
        
        $spot_review_recently=SpotReview::with('spot_review_photos','user')->where('spot_master_id','=',$spot_master_id)->orderBy('updated_at','desc')->first();
        $avg_spot_review_score=Spotreview::where('spot_master_id','=',$spot_master_id)->avg('score');
        $count_spot_review_score=Spotreview::where('spot_master_id','=',$spot_master_id)->count();
    
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
            
            return view('spot_masters.show')->with([
                'spot_master'=>$spot_master,
                'spot_photos'=>$spot_photo,
                'travel_plan_id'=>$travel_plan_id,
                'google_map_url' =>$google_map_url,
                'rakuten'=>$rakuten_hotel_basic_info,
                'spot_review_recently'=>$spot_review_recently,
                'avg_spot_review_score'=>$avg_spot_review_score,
                'count_spot_review_score'=>$count_spot_review_score,
                'url_before' =>$url_before,
                'spot_review_id'=>$spot_review_id,
                'favorite_exit' =>$favorite_exit,
                'favorite' =>$favorite,
                
            ]);
            
        }else{
            return view('spot_masters.show')->with([
                'spot_master'=>$spot_master,
                'spot_photos'=>$spot_photo,
                'travel_plan_id'=>$travel_plan_id,
                'google_map_url' =>$google_map_url,
                'spot_review_recently'=>$spot_review_recently,
                'avg_spot_review_score'=>$avg_spot_review_score,
                'count_spot_review_score'=>$count_spot_review_score,
                'url_before' =>$url_before,
                'spot_review_id'=>$spot_review_id,
                'favorite_exit' =>$favorite_exit,
                'favorite' =>$favorite,
            ]);    
        };
    }
}
