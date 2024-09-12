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
      <div class="hotel_info">
         <h2>ホテルの特徴</h2>
         <p>{{$rakuten['hotelSpecial']}}</p>
      </div>
      <div class="hotel_price_min">
         <h2>宿泊料金(1泊)</h2>
         <p>最低{{$rakuten['hotelMinCharge']}}円から</p>
      
      </div>
      
      <div class="hotel_food">
         <h2>食事プラン</h2>
         <p>{{$spot_master->hotel_food}}</p>
      </div>
      
      <div class="hotel_bath">
         <h2>大浴場有無</h2>
         @if( $spot_master->bath =='1')
         <p>あり</p>
         @else
         <p>なし</p>
         @endif
      </div>
      
      <div class="access">
         <h2>交通アクセス</h2>
            <p>{{$rakuten['access']}}</p>
         </div>
         <div class="parking_cars">
            <h4>駐車場有無</h4>
            <p>{{$rakuten['parkingInformation']}}</p>
         </div>
         <div class="nearest_station">
            <h4>最寄り駅</h4>
            <p>{{$rakuten['nearestStation']}}駅</p>
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
      <h2>地図</h2>
      <div id="map" style="height:500px">
      </div>
	   
      <script>
         function initMap() {
            
            var latitude = @json($rakuten['latitude']);
            var longitude = @json($rakuten['longitude']);
            var MyLatLng = new google.maps.LatLng (latitude,longitude);
            var Options = {
               zoom: 15,      
               center: MyLatLng, 
               mapTypeId: 'roadmap' 
            };

            var map = new google.maps.Map(document.getElementById('map'), Options);
            

            new google.maps.Marker({
               position: MyLatLng,
               map,
               title: @json($spot_master->spot_name),
            });
         }
      </script>
      <script src={{$google_map_url}}></script>
      
      
      <div class="tel">
         <h2>連絡先</h2>
         <p>TEL:{{$rakuten['telephoneNo']}}</p>
      </div>
      
      <div class="reserve_url">
         <a href='{{$rakuten['planListUrl']}}'>予約URL</a>
      </div>
      
      <div class="picture">
         <h2>施設写真</h2>
         <img src="{{$rakuten['hotelImageUrl']}}" alt="画像が読み込めません。">
         <img src="{{$rakuten['roomImageUrl']}}" alt="画像が読み込めません。">
         @foreach($spot_photos as $spot_photo)
            <img src="{{$spot_photo->path}}" alt="画像が読み込めません。">
         @endforeach
      </div>
   
      @endif
      
      @if($spot_master->category->category =='レストラン' || $spot_master->category->category =='観光スポット')
      
      <div class="holiday">
         <h2>定休日</h2>
         <p>{{$spot_master->holiday}}</p>
      </div>
      
      <div class="open_time">
         <h2>営業時間</h2>
         <p>{{$spot_master->open_time}}</p>
      </div>
      
      @endif
      
      @if($spot_master->category->category =='観光スポット' )
      
      <div class="entrance_fee">
         <h2>入場料金</h2>
         <p>{{$spot_master->entrance_fee}}</p>
      </div>
      
      @endif
      
      @if($spot_master->category->category =='レストラン' )
      
      <div class="seat">
         <h2>席数</h2>
         <p>{{$spot_master->seat}}</p>
      </div>
      
      @endif
      
      @if($spot_master->category->category =='レストラン' || $spot_master->category->category =='観光スポット')
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
         
         <h2>地図</h2>
         <div id="map" style="height:500px">
         </div>
	   
         <script>
            function initMap() {
            
               var latitude = @json($spot_master->latitude);
               var longitude = @json($spot_master->longitude);
               var MyLatLng = new google.maps.LatLng (latitude,longitude);
               var Options = {
                  zoom: 15,      
                  center: MyLatLng, 
                  mapTypeId: 'roadmap' 
               };

               var map = new google.maps.Map(document.getElementById('map'), Options);
            

               new google.maps.Marker({
                  position: MyLatLng,
                  map,
                  title: @json($spot_master->spot_name),
               });
            }
         </script>
         <script src={{$google_map_url}}></script>
         
         <div class="picture">
            <h2>施設写真</h2>
            @foreach($spot_photos as $spot_photo)
               <img src="{{$spot_photo->path}}" alt="画像が読み込めません。">
            @endforeach
      </div>
         
      </div>
      @endif
      
      @if ( $spot_master->category->category =='ホテル')
      <div class="review">
         <h2>口コミ</h2>
         <div class="review_point">
            <h4>{{$rakuten['reviewAverage']}}点({{$rakuten['reviewCount']}}件)</h4>
         </div>
         <div class="review_url">
            <a href='{{$rakuten['reviewUrl']}}'>口コミURL</a>
         </div>
      </div>
      @endif
   </div>
　 
　 @if($travel_plan_id ==0)
　    <a href='/review/index'>戻る</a>
　 @else
      <a href='/myplan/name/{{$travel_plan_id}}'>戻る</a>
   @endif

</x-app-layout>