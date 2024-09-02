<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         新規旅行スポット登録
      </h2>
   </x-slot>
    
   <h1>新規旅行スポット登録</h1>
   <form action='/myplan/spot/{{$travel_plan_spot->id}}/update' method='POST'>
      @csrf
      @method('PUT')
      
      <div class="travel_plan_id">
         <input type="hidden" name="travel_plan_spot[travel_plan_id]" value={{$travel_plan_spot->travel_plan_id}}></input>
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
            
         </select>
      </div>
      
      <div class="arrive_date">
         <p>到着日時</p>
         <input type="text" name="travel_plan_spot[arrive_date]" value={{$travel_plan_spot->arrive_date}}></input>
      </div>
      
      <div class="arrive_time">
         <input type="text" name="travel_plan_spot[arrive_time]" value={{$travel_plan_spot->arrive_time}}></input>
      </div>
      
      <div class="departure_date">
         <p>出発日時</p>
         <input type="text" name="travel_plan_spot[departure_date]" value={{$travel_plan_spot->departure_date}}></input>
      </div>
      
      <div class="departure_time">
         <input type="text" name="travel_plan_spot[departure_time]" value={{$travel_plan_spot->arrive_time}}></input>
      </div>
      
      <div class="money">
         <p>1人あたりの料金</p>
         <input type="text" name="travel_plan_spot[money]" value={{$travel_plan_spot->money}}>円</input>
      </div>
      
      <input type="submit" value="更新"></input>

   </form>
   
   <a href='/myplan/name/{{$travel_plan_spot->travel_plan_id}}'>戻る</a>
   
</x-app-layout>