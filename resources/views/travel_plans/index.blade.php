<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            マイプラン一覧
        </h2>
    </x-slot>
    <h1>マイプラン一覧</h1>
       
    <div class='new_plan'>
        <a href='/myplan/name/create'>新規プラン登録</a>   
    </div>
       
    <div class='travel_plans'>
        @foreach($travel_plans as $travel_plan)
            <p class='travel_plan'>{{$travel_plan->departure_date}}{{$travel_plan->plan_name}}</p>
            <a href='/myplan/name/{travel_plan}'>プラン詳細</a>
                
        @endforeach
           
    </div>
      
</x-app-layout>