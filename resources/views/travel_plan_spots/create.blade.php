<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         新規旅行スポット登録
      </h2>
   </x-slot>
    
   <h1>新規旅行スポット登録</h1>
   <form action='/myplan/spot/store' method='POST'>
      @csrf
      
      <div class="travel_plan_id">
         <input type="hidden" name="travel_plan_spot[travel_plan_id]" value={{$travel_plan}}></input>
      </div>
           
      <div class="spot_name">
         <p>スポット名</p>
         <select name="travel_plan_spot[spot_master_id]">
            <option value="">--選択してください--</option>
            @foreach($spot_masters as $spot_master)
            <option value="{{$spot_master->id}}">{{$spot_master->spot_name}}</option>
            @endforeach
         </select>
         <p class="spot_master_id__error" style="color:red">{{ $errors->first('travel_plan_spot.spot_master_id') }}</p>
      </div>
      
      <div class="arrive_date">
         <p>到着日時</p>
         <input type="text" name="travel_plan_spot[arrive_date]" placeholder="20240809" value={{old('travel_plan_spot.arrive_date')}}></input>
         <p class="arrive_date__error" style="color:red">{{ $errors->first('travel_plan_spot.arrive_date') }}</p>
      </div>
      
      <div class="arrive_time">
         <input type="text" name="travel_plan_spot[arrive_time]" placeholder="10:00" value={{old('travel_plan_spot.arrive_time')}}></input>
         <p class="arrive_time__error" style="color:red">{{ $errors->first('travel_plan_spot.arrive_time') }}</p>
      </div>
      
      <div class="departure_date">
         <p>出発日時</p>
         <input type="text" name="travel_plan_spot[departure_date]" placeholder="20240810" value={{old('travel_plan_spot.departure_date')}}></input>
         <p class="departure_date__error" style="color:red">{{ $errors->first('travel_plan_spot.departure_date') }}</p>
      
      <div class="departure_time">
         <input type="text" name="travel_plan_spot[departure_time]" placeholder="10:00" value={{old('travel_plan_spot.departure_time')}}></input>
         <p class="departure_time__error" style="color:red">{{ $errors->first('travel_plan_spot.departure_time') }}</p>
      </div>
      
      <div class="money">
         <p>1人あたりの料金</p>
         <input type="text" name="travel_plan_spot[money]" placeholder="1000" value={{old('travel_plan_spot.money')}}>円</input>
         <p class="money__error" style="color:red">{{ $errors->first('travel_plan_spot.money') }}</p>
      </div>
      
      <input type="submit" value="保存"></input>

   </form>
   
   <a href='/myplan/name/{{$travel_plan}}'>戻る</a>
   
</x-app-layout>