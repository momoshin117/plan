<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotMaster;

class SpotMasterController extends Controller
{
    public function show($spot_master_id,Request $request)
    {
        $travel_plan_id=$request->travel_plan_id;
        $spot_master=SpotMaster::with('category','prefecture','parking_car')->find($spot_master_id);
      
    
        if($spot_master->category->category=="ホテル"){
            $client = new \GuzzleHttp\Client();
            $applicationID =config('services.rakuten_travel.id');
            $url = 'https://app.rakuten.co.jp/services/api/Travel/HotelDetailSearch/20170426?format=json&hotelNo='.$spot_master->rakuten_hotel_id.'&applicationId='.$applicationID;
        
            $response = $client->request(
                'GET',
                $url,
            );
        
            $rakuten = json_decode($response->getBody(), true);
        };
        $rakuten_hotel_basic_info=$rakuten['hotels'][0]['hotel'][0]['hotelBasicInfo'];
        
        return view('spot_masters.show')->with([
            'spot_master'=>$spot_master,
            'travel_plan_id'=>$travel_plan_id,
            'rakuten'=>$rakuten_hotel_basic_info
        ]);
        
    }
}
