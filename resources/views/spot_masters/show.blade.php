<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         施設詳細情報({{$spot_master->category->category}})
      </h2>
   </x-slot>
      
   <h1>施設詳細情報({{$spot_master->category->category}})</h1>
   
   <div class="spot">
      
      <div class="spot_name">
         <h2>施設名</h2>
         <p>{{$spot_master->spot_name}}</p>
      </div>
      
      <div class="spot_adress">
         <h2>住所</h2>
         <p>{{$spot_master->prefecture->prefecture}}</p>
         <p>{{$spot_master->adress}}</p>
         
      </div>
      
      @if ( $spot_master->category->category =='ホテル')
      
      <div class="hotel_price">
         <h2>宿泊料金(1泊)</h2>
      
      </div>
      
      <div class="hotel_food">
         <h2>食事プラン</h2>
      </div>
      
      <div class="hotel_bath">
         <h2>大浴場有無</h2>
         @if( $spot_master->bath =='1')
         <p>あり</p>
         @else
         <p>なし</p>
         @endif
      </div>
   
      @endif
      
      @if($spot_master->category->category =='レストラン' || $spot_master->category->category =='観光スポット')
      
      <div class="holiday">
         <h2>定休日</h2>
         <p>{{$spot_master->holiday}}</p>
      </div>
      
      <div class="open_time">
         <h2>定休日</h2>
         <p>{{$spot_master->open_time}}</p>
      </div>
      
      @endif
      
      @if($spot_master->category->category =='観光スポット' )
      
      <div class="entrance_fee">
         <h2>席数</h2>
         <p>{{$spot_master->entrance_fee}}</p>
      </div>
      
      @endif
      
      @if($spot_master->category->category =='レストラン' )
      
      <div class="seat">
         <h2>席数</h2>
         <p>{{$spot_master->seat}}</p>
      </div>
      
      @endif
      
      <div class="access">
         <h2>交通アクセス</h2>
         <div class="parking_cars">
            <h4>駐車場有無</h4>
            <p>{{$spot_master->parking_car->number}}</p>
         </div>
         
         <div class="foot">
            <h4>最寄り駅からの徒歩での所要時間</h4>
            <p>{{$spot_master->foot}}</p>
         </div>
         
         <div class="bus">
            <h4>シャトルバス有無</h4>
            @if( $spot_master->bus =='1')
            <p>あり</p>
            @else
            <p>なし</p>
            @endif
         </div>
         
      </div>
      
      @if ( $spot_master->category->category =='ホテル')
      <div class="reserve_url">
         <h2>予約URL</h2>
         <p>{{$spot_master->reserve_url}}</p>
      </div>
      @endif
      
      <dic class="review_url">
         <h2>口コミURL</h2>
         <p>{{$spot_master->review_url}}</p>
      </dic>
   
   </div>
　 
   <a href='/myplan/name/{{$travel_plan_id}}'>戻る</a>

</x-app-layout>