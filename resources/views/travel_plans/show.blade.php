<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         登録プランの概要
      </h2>
   </x-slot>
      
   <h1>登録プラン概要の詳細</h1>

   <div class="plan">
      <div class="plan_name">
         <h1>プラン名</h1>
         <p>{{$travel_plan ->plan_name}}</p>
      </div>
               
      <div class="departure_date">
         <h3>開始日</h3>
         <p>{{$travel_plan ->departure_date}}</p>
      </div>
               
      <div class="long">
         <h3>期間</h3>
         <p>{{$travel_plan ->long}}日</p>
      </div>
               
      <div class="money">
         <h3>予算(1人あたり)</h3>
         <p>{{$travel_plan ->money}}</p>
      </div>
               
      <div class="disclose">
         <h3>公開設定</h3>
         <p>{{$travel_plan ->disclose}}</p>
      </div>
   </div>
   
   <a href='/myplan/name/{{$travel_plan ->id}}/edit'>編集</a>
   
   <form action="/myplan/name/{{ $travel_plan->id }}" id="form_{{ $travel_plan->id }}" method="post">
      @csrf
      @method('DELETE')
      
      <button type="button" onclick="deletePlan({{ $travel_plan->id }})">削除</button> 
　 </form>
　 
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