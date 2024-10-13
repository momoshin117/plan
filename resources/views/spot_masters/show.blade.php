<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         施設詳細情報({{$spot_master->category->category}})
      </h2>
   </x-slot>
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
   
  
   <div class="favorite">
      <h3>【お気に入り】======</h3>   
      @if($favorite_exit)
      <form action="/spot_master/{{$spot_master->id}}/favotite/delete?url_before={{$url_before}}&travel_plan_id={{$travel_plan_id}}&spot_review_id={{$spot_review_id}}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">お気に入り解除</button>
         
      </form>
      @else
      <form action="/spot_master/{{$spot_master->id}}/favotite/create?url_before={{$url_before}}&spot_master_id={{$spot_master->id}}&travel_plan_id={{$travel_plan_id}}&spot_review_id={{$spot_review_id}}" method="POST">
         @csrf
         <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">お気に入り登録</button>
         <input type="hidden" name="favorite[spot_master_id]" value={{$spot_master->id}}></input>
         
      </form>
      @endif
      <p>お気に入り登録者数：{{$user_count}}人中{{$favorite_count}}人</p>
      <h3>================</h3>
      
   </div>

   <br>
   <div class="spot">
      
      <div class="spot_name">
         <h3>施設名</h3>
         <p>{{$spot_master->spot_name}}</p>
      </div>
      
      <div class="spot_adress">
         <h4>住所</h4>
         <p>{{$spot_master->prefecture->prefecture}}{{$spot_master->adress}}</p>
         
      </div>
      
      @if ( $spot_master->category->category =='ホテル')
      <div class="hotel_info">
         <h4>ホテルの特徴</h4>
         <p>{{$rakuten['hotelSpecial']}}</p>
      </div>
      <div class="hotel_price_min">
         <h4>宿泊料金(1泊)</h4>
         <p>最低{{$rakuten['hotelMinCharge']}}円から</p>
      
      </div>
      
      <div class="hotel_food">
         <h4>食事プラン</h4>
         <p>{{$spot_master->hotel_food}}</p>
      </div>
      
      <div class="hotel_bath">
         <h4>大浴場有無</h4>
         @if( $spot_master->bath =='1')
         <p>あり</p>
         @else
         <p>なし</p>
         @endif
      </div>
      
      <div class="access">
         <h3>交通アクセス</h3>
            <p>{{$rakuten['access']}}</p>
         </div>
         <div class="parking_cars">
            <h4>・駐車場有無</h4>
            <p>{{$rakuten['parkingInformation']}}</p>
         </div>
         <div class="nearest_station">
            <h4>・最寄り駅</h4>
            <p>{{$rakuten['nearestStation']}}駅</p>
         </div>
         
         <div class="bus">
            <h4>・シャトルバス有無</h4>
            @if( $spot_master->bus =='1')
            <p>あり</p>
            @else
            <p>なし</p>
            @endif
         </div>
         
      </div>
      <h3>地図</h3>
      <div id="map" style="width:500px; height:300px">
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
         <h4>連絡先</h4>
         <p>TEL:{{$rakuten['telephoneNo']}}</p>
      </div>
      
      <div class="reserve_url">
         <a href='{{$rakuten['planListUrl']}}'>予約URL</a>
      </div>
      
      <div class="picture">
         <h3>施設写真</h3>
         <img src="{{$rakuten['hotelImageUrl']}}" alt="画像が読み込めません。" width="500" height="500">
         <br>
         <img src="{{$rakuten['roomImageUrl']}}" alt="画像が読み込めません。" width="500" height="500">
         @if(isset($spot_photos))
         @foreach($spot_photos as $spot_photo)
            <img src="{{$spot_photo->path}}" alt="画像が読み込めません。" width="500" height="500">
         @endforeach
         @endif
      </div>
   
      @endif
      
      @if($spot_master->category->category =='レストラン' || $spot_master->category->category =='観光スポット')
      
      <div class="holiday">
         <h4>定休日</h4>
         <p>{{$spot_master->holiday}}</p>
      </div>
      
      <div class="open_time">
         <h4>営業時間</h4>
         <p>{{$spot_master->open_time}}</p>
      </div>
      
      @endif
      
      @if($spot_master->category->category =='観光スポット' )
      
      <div class="entrance_fee">
         <h4>入場料金</h4>
         <p>{{$spot_master->entrance_fee}}</p>
      </div>
      
      @endif
      
      @if($spot_master->category->category =='レストラン' )
      
      <div class="seat">
         <h4>席数</h4>
         <p>{{$spot_master->seat}}</p>
      </div>
      
      @endif
      
      @if($spot_master->category->category =='レストラン' || $spot_master->category->category =='観光スポット')
      <div class="access">
         <h3>交通アクセス</h3>
         <div class="parking_cars">
            <h4>・駐車場有無</h4>
            <p>{{$spot_master->parking_car->number}}</p>
         </div>
         
         <div class="foot">
            <h4>・最寄り駅からの徒歩での所要時間</h4>
            <p>{{$spot_master->foot}}</p>
         </div>
         
         <div class="bus">
            <h4>・シャトルバス有無</h4>
            @if( $spot_master->bus =='1')
            <p>あり</p>
            @else
            <p>なし</p>
            @endif
         </div>
         
         <h3>地図</h3>
         <div id="map" style="width:500px; height:300px">
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
            <h3>施設写真</h3>
            @foreach($spot_photos as $spot_photo)
               <img src="{{$spot_photo->path}}" alt="画像が読み込めません。" width="500" height="500">
            @endforeach
      </div>
         
      </div>
      @endif
      
      <div class="review">
         <h3>口コミ</h3>
         <h4>●当サイト口コミ</h4>
         @if($spot_review_recently=="")
            <p>　このスポットの口コミはまだ登録されていません。</p>
         @else
         <div class="review_point">
            <p>{{substr($spot_master->review_average_score,0,4)}}点({{$spot_master->review_count}}件)</p>
         </div>
         <div class="review_recently">
            <p>　最新の口コミ(更新日：{{$spot_review_recently->updated_at->format("Y-m-d　H:i")}})</p>
            <p>　　投稿者：{{$spot_review_recently->user->nickname}}</p>
            <p>　　点数：{{$spot_review_recently->score}}点</p>
            <p>　　コメント：{{$spot_review_recently->comment}}</p>
         </div>
         <div class="review_picture">
            <p>　　投稿画像</p>
            @foreach($spot_review_recently->spot_review_photos as $spot_review_photo)
               <img src="{{$spot_review_photo->path}}"alt="画像が読み込めません。" width="500" height="500">
            @endforeach
         </div>
         <a href='/spot_master/review/{{$spot_master->id}}/show'>口コミ詳細</a>
         @endif
      </div>
      
      
      @if ( $spot_master->category->category =='ホテル')
      <div class="rakuten_review">
         <h4>●楽天トラベル口コミ</h2>
         <div class="rakuten_review_point">
            <p>{{$rakuten['reviewAverage']}}点({{$rakuten['reviewCount']}}件)</p>
         </div>
         <div class="rakuten_review_url">
            <a href='{{$rakuten['reviewUrl']}}'>楽天トラベル口コミURL</a>
         </div>
      </div>
      @endif
      <br>
      <div class="travel_plan">
         <h3>このスポットが登録されている旅行プラン(更新順。最大3件)</h3>
         @if($travel_plan_spots_isset!="")
            @foreach($travel_plan_spots as $travel_plan_spot)
               <p>・{{$travel_plan_spot->plan_name}}(作成者：{{$travel_plan_spot->nickname}}、更新日時：{{substr($travel_plan_spot->travel_plan_spot_updated_at,0,16)}})</p>
            @endforeach
         @else
            <p>このスポットが登録されているプランはありません。</p>
         @endif

      </div>
   </div>
　 
　 @if($url_before=="travel_plan")
　    <a href='/myplan/name/{{$travel_plan_id}}'>戻る</a>
　 @elseif($url_before=="review_index")
　    <a href='/review/index'>戻る</a>
　 @elseif($url_before=="review_show")
　    <a href='/review/{{$spot_review_id}}/show'>戻る</a>
　 @elseif($url_before=="read_spot_master")
　    <a href='/read/spot_master/index'>戻る</a>
   @endif
   </div>
   </div>
   </div>
   </div>

</x-app-layout>