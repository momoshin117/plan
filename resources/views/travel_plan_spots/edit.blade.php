<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         新規旅行スポット登録
      </h2>
   </x-slot>
   
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
    
   <h1>新規旅行スポット登録</h1>
   <form action='/myplan/spot/{{$travel_plan_spot->id}}/update' method='POST'>
      @csrf
      @method('PUT')
      
      <div class="travel_plan_id">
         <input type="hidden" name="travel_plan_spot[travel_plan_id]" value={{$travel_plan_spot->travel_plan_id}}></input>
         <input type="hidden" name="travel_plan_spot[plan_first_day]" value={{$first_day}}></input>
         <input type="hidden" name="travel_plan_spot[plan_last_day]" value={{$last_day}}></input> 
      </div>
           
      <div class="spot_name">
         <p>スポット名</p>
         <select name="travel_plan_spot[spot_master_id]">
            <option value="{{$travel_plan_spot->spot_master->id}}">{{$travel_plan_spot->spot_master->spot_name}}</option>
            
            @foreach($spot_masters as $spot_master)
            
            @if($travel_plan_spot->spot_master->id != $spot_master->id)
            <option value="{{$spot_master->id}}">{{$spot_master->spot_name}}</option>
            @endif
            
            @endforeach
            <p class="spot_master_id__error" style="color:red">{{ $errors->first('travel_plan_spot.spot_master_id') }}</p>
            
         </select>
      </div>
      
      <div class="arrive_date">
         <p>到着日時</p>
         <input type="text" name="travel_plan_spot[arrive_date]" value={{$travel_plan_spot->arrive_date}}></input>
         <p class="arrive_date__error" style="color:red">{{ $errors->first('travel_plan_spot.arrive_date') }}</p>
      </div>
      
      <div class="arrive_time">
         <input type="text" name="travel_plan_spot[arrive_time]" value={{substr($travel_plan_spot->arrive_time,0,5)}}></input>
         <p class="arrive_time__error" style="color:red">{{ $errors->first('travel_plan_spot.arrive_time') }}</p>
      </div>
      
      <div class="departure_date">
         <p>出発日時</p>
         <input type="text" name="travel_plan_spot[departure_date]" value={{$travel_plan_spot->departure_date}}></input>
         <p class="departure_date__error" style="color:red">{{ $errors->first('travel_plan_spot.departure_date') }}</p>
      </div>
      
      <div class="departure_time">
         <input type="text" name="travel_plan_spot[departure_time]" value={{substr($travel_plan_spot->arrive_time,0,5)}}></input>
         <p class="departure_time__error" style="color:red">{{ $errors->first('travel_plan_spot.departure_time') }}</p>
      </div>
      
      <div class="money">
         <p>1人あたりの料金</p>
         <input type="text" name="travel_plan_spot[money]" value={{$travel_plan_spot->money}}>円</input>
          <h6>※使える金額は残り{{$use_money}}円以内</h6>
         <p class="money__error" style="color:red">{{ $errors->first('travel_plan_spot.money') }}</p>
         
         <input type="hidden" name="travel_plan_spot[use_money]" value={{$use_money}}></input>
         
      </div>
      
      <input type="submit" value="更新"></input>

   </form>
   
   <a href='/myplan/name/{{$travel_plan_spot->travel_plan_id}}'>戻る</a>
   
   </div>
   </div>
   </div>
   </div>
   
</x-app-layout>