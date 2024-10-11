<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            マイプラン一覧
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
    
    <form action='/myplan/name/month' method='POST'>
      @csrf
        <input type="text" name="departure[year]" placeholder="2024">年</input>
        
        <select name="departure[month]">
            <option value="">--選択してください--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        月
        
        <input type="submit" value="絞り込み" class="button"></input>
    </form>  
    
    <div class='new_plan'>
        <a href='/myplan/name/create' class="button">新規プラン登録</a>   
    </div>
       
    <div class='travel_plans'>
       
        <h2>【自分が登録したプラン一覧】</h2>
        @foreach($travel_plans as $travel_plan)
            @if($user_id == $travel_plan->user_id)
                <div style="display:inline-flex">
                    <p>{{$travel_plan->departure_date}}　{{$travel_plan->plan_name}}&emsp;</p>
                    <a href='/myplan/name/{{$travel_plan->id}}?before=myplan'>プラン詳細</a>
                    <p>　　</p>
                    <form action="/myplan/name/{{ $travel_plan->id }}" id="form_{{ $travel_plan->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePlan({{ $travel_plan->id }})" class="delete">削除</button> 
　                  </form>
　              </div>
            @endif
        @endforeach   
    </div>
    
    <div class='paginate'>
        {{ $travel_plans->links() }}
    </div>
    
    <script>
    function deletePlan(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
   </script>
   
    </div>
    </div>
    </div>
    </div>
</x-app-layout>