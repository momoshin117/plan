<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotMaster;
use App\Models\SpotPhoto;

class SpotMasterController extends Controller
{
    public function show($spot_master_id,Request $request)
    {
        $travel_plan_id=$request->travel_plan_id;
        $spot_master=SpotMaster::with('category','prefecture','parking_car')->find($spot_master_id);
        $google_map_url='https://maps.googleapis.com/maps/api/js?key='.config('services.google_map.key').'&callback=initMap';
        
        $spot_photo=SpotPhoto::with('spot_master')->where('spot_master_id','=',$spot_master_id)->get();
    
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
            ]);
            
        }else{
            return view('spot_masters.show')->with([
                'spot_master'=>$spot_master,
                'spot_photos'=>$spot_photo,
                'travel_plan_id'=>$travel_plan_id,
                'google_map_url' =>$google_map_url,
            ]);    
        };
    }
}
