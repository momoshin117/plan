<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         旅行プラン詳細(スポット詳細)
      </h2>
   </x-slot>
      
   <h1>登録プラン概要(スポット詳細)</h1>
   
   
   <div class='travel_plan_spots'>
            　   
      <h2>ジャンル</h2>
      <p></p>
            
      <h2>スポット名</h2>
      <p>{{$travel_plan_spot->spot_master_id}}</p>
            
      <h4>滞在日時</h4>
      <p>{{$travel_plan_spot->arrive_date}}{{$travel_plan_spot->arrive_time}}～{{$travel_plan_spot->departure_date}}{{$travel_plan_spot->departure_time}}</p>
            
      <h4>料金(1人あたり)</h4>
      <p>{{$travel_plan_spot->money}}円</p>
   </div>   


</x-app-layout>