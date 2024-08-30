<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            マイプラン一覧({{$day["year"]}}年{{$day["month"]}}月)
        </h2>
    </x-slot>
    <h1>マイプラン一覧</h1>
       
    <div class='new_plan'>
        <a href='/myplan/name/create'>新規プラン登録</a>   
    </div>
       
    <div class='travel_plans'>
        @foreach($travel_plans as $travel_plan)
            <p>{{$travel_plan->departure_date}}　{{$travel_plan->plan_name}}　　
                <a href='/myplan/name/{{$travel_plan->id}}'>プラン詳細</a>
                <form action="/myplan/name/{{ $travel_plan->id }}" id="form_{{ $travel_plan->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePlan({{ $travel_plan->id }})">削除</button> 
　              </form>
　          </p>
        @endforeach
           
    </div>
    
    <a href='/myplan/name/index'>戻る</a>
    
    <script>
    function deletePlan(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
   </script>  
</x-app-layout>