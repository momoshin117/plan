<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            旅行プラン閲覧
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
    
    <div class="spot_master_search">
        <h3>【絞り込み条件】</h3>
        <p>{{$spot_master->spot_name}}</p>
    </div>
    
    <div class='travel_plans'>
       <h3>他の人が登録したプラン一覧(更新日順)</h3>
        @foreach($travel_plan_spots as $travel_plan_spot)
            <a href='/myplan/name/{{$travel_plan_spot->travel_plan_id}}?before=read_travel_plans'>●{{$travel_plan_spot->plan_name}}</a>
            <p>　(作成者：{{$travel_plan_spot->nickname}}、更新日時：{{substr($travel_plan_spot->travel_plan_spot_updated_at,0,16)}})</p>
            <br>
        @endforeach   
    </div>
    
    <div class='paginate'>
        {{ $travel_plan_spots->links() }}
    </div>

    </div>
    </div>
    </div>
    </div>
</x-app-layout>