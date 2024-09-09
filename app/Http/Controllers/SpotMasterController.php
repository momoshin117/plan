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
      
    
        $client = new \GuzzleHttp\Client();
        $url = 'https://app.rakuten.co.jp/services/api/Travel/HotelDetailSearch/20170426';
        
        
        $response = $client->request(
            'GET',
            $url,
            
            [
                'query' =>[
                    'format' =>'json',
                    'hotelNo' => '30110',
                    'applicationID' => config('services.rakuten_travel.id')
                    
                ]
                
            ],
          
        );
        
        
        $rakuten = json_decode($response->getBody(), true);
        
        dd($rakuten);

        return view('spot_masters.show')->with([
            'spot_master'=>$spot_master,
            'travel_plan_id'=>$travel_plan_id,
            'rakuten'=>$rakuten
        ]);
        
    }
}
