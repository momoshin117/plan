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
         <input type="hidden" name="travel_plan_spot[plan_first_day]" value={{$first_day}}></input>
         <input type="hidden" name="travel_plan_spot[plan_last_day]" value={{$last_day}}></input> 
      </div>
           
      <div class="spot_name">
         <h4>スポット名</h4>
         <select name="travel_plan_spot[spot_master_id]">
            <option value="">--選択してください--</option>
            @foreach($spot_masters as $spot_master)
            <option value="{{$spot_master->id}}">{{$spot_master->spot_name}}</option>
            @endforeach
         </select>
         <p class="spot_master_id__error" style="color:red">{{ $errors->first('travel_plan_spot.spot_master_id') }}</p>
      </div>
      
      <div class="arrive_date">
         <h4>到着日時</h4>
         <input type="text" name="travel_plan_spot[arrive_date]" placeholder="2024/8/9" value={{old('travel_plan_spot.arrive_date')}}></input>
         <p class="arrive_date__error" style="color:red">{{ $errors->first('travel_plan_spot.arrive_date') }}</p>
      </div>
      
      <div class="arrive_time">
         <input type="text" name="travel_plan_spot[arrive_time]" placeholder="09:00" value={{old('travel_plan_spot.arrive_time')}}></input>
         <p class="arrive_time__error" style="color:red">{{ $errors->first('travel_plan_spot.arrive_time') }}</p>
      </div>
      
      <div class="departure_date">
         <h4>出発日時</h4>
         <input type="text" name="travel_plan_spot[departure_date]" placeholder="2024/8/10" value={{old('travel_plan_spot.departure_date')}}></input>
         <p class="departure_date__error" style="color:red">{{ $errors->first('travel_plan_spot.departure_date') }}</p>
      
      <div class="departure_time">
         <input type="text" name="travel_plan_spot[departure_time]" placeholder="10:00" value={{old('travel_plan_spot.departure_time')}}></input>
         <p class="departure_time__error" style="color:red">{{ $errors->first('travel_plan_spot.departure_time') }}</p>
      </div>
      
      <div class="money">
         <h4>1人あたりの料金</h4>
         
         <input type="text" name="travel_plan_spot[money]" placeholder="1000" value={{old('travel_plan_spot.money')}}>円</input>
         <h6>※使える金額は残り{{$use_money}}円以内</h6>
         <p class="money__error" style="color:red">{{ $errors->first('travel_plan_spot.money') }}</p>
         
         <input type="hidden" name="travel_plan_spot[use_money]" value={{$use_money}}></input>
      </div>
      </div>
      
      <input type="submit" value="保存"></input>

   </form>
   
   <a href='/myplan/name/{{$travel_plan}}'>戻る</a>
   
</x-app-layout>