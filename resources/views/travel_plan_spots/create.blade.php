<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         新規旅行スポット登録
      </h2>
   </x-slot>
    
   <h1>新規旅行スポット登録</h1>
   <form action='/myplan/spot' method='POST'>
      @csrf
           
      <div class="spot_name">
         <p>スポット名</p>
         <select name="travel_plan_spot[spot_name]">
            <option value="">--選択してください--</option>
            @foreach($travel_plan_spots as $travel_plan_spot)
            <option value="{{$travel_plan_spot->spot_master->id}}">{{$travel_plan_spot->spot_master->spot_name}}</option>
            @endforeach
         </select>
      </div>
      
      <div class="arrive_date">
         <p>到着日時</p>
         <input type="text" name="travel_plan_spot[arrive_date]" placeholder="2024/8/9"></input>
      </div>
      
      <div class="arrive_time">
         <input type="text" name="travel_plan_spot[arrive_time]" placeholder="10:00"></input>
      </div>
      
      <div class="departure_date">
         <p>出発日時</p>
         <input type="text" name="travel_plan_spot[departure_time]" placeholder="2024/8/10"></input>
      </div>
      
      <div class="departure_time">
         <input type="text" name="travel_plan_spot[departure_time]" placeholder="10:00"></input>
      </div>
      
      <input type="submit" value="保存"></input>

   </form>
   
   <a href='/myplan/spot/index'>戻る</a>
   
</x-app-layout>