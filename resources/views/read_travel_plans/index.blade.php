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
    
    <form action='/read/travel_plan/spot_search' method='POST'>
      @csrf
      <input id="spot_master_input" name="spot_master[spot_name]" list="spot_master" placeholder="テキスト入力もしくはダブルクリック" autocomplete="off">
        
        <datalist id="spot_master">
            @foreach($spot_masters as $spot_master)
                <option value="{{$spot_master->spot_name}}"></option>
            @endforeach
        </datalist>
        <input type="submit" value="絞り込み" class="button"></input>
        <p class="spot_name_error" style="color:red">{{ $errors->first('spot_master.spot_name') }}</p>
    </form>  
    
    <div class='travel_plans'>
       <p>他の人が登録したプラン一覧(更新日順)</p>
        @foreach($travel_plans as $travel_plan)
            <a href='/myplan/name/{{$travel_plan->id}}?before=read_travel_plans'>●{{$travel_plan->plan_name}}</a>
            <p>　(作成者：{{$travel_plan->user->nickname}}、更新日時：{{$travel_plan->updated_at->format("Y-m-d　H:i")}})</p>
            <br>
        @endforeach   
    </div>
    
    <div class='paginate'>
        {{ $travel_plans->links() }}
    </div>

    </div>
    </div>
    </div>
    </div>
</x-app-layout>