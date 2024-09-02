<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            旅行プラン詳細(スポット一覧)
        </h2>
    </x-slot>
    <h1>旅行プラン詳細(スポット一覧)</h1>
    
    <div class='new_spot'>
        <a href='/myplan/spot/create/index'>新規プラン登録</a>   
    </div>
       
    <div class='travel_plans'>
            <h2>旅行プラン名</h2>
            <p>{{$travel_plan_spots->travel_plan->plan_name}}</p>
            
            <div class='travel_plan_spots'>
                <h2>登録スポット一覧</h2>
                
                @foreach($travel_plan_spots as $travel_plan_spot)
                    <h4>ジャンル</h4>
                    <p>{{$travel_plan_spot->spot_master_id}}</p>
                    
                    <h4>到着日時</h4>
                    <p>{{$travel_plan_spot->arrive_date}}</p>
                    
                @endforeach
                
            </div>
           
    </div>
    
</x-app-layout>