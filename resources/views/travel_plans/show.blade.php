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
         <p>{{$travel_plan ->money}}円</p>
         <h3>使用金額(1人あたり)</h3>
         <p>{{$money_total->total}}円</p>
      </div>
      
      
      @if($user_id== $travel_plan->user_id)         
         <div class="disclose">
            <h3>公開設定</h3>
            <p>{{$travel_plan ->disclose}}</p>
         </div>
      @endif
   </div>
   
   @if($user_id== $travel_plan->user_id)
      <a href='/myplan/name/{{$travel_plan ->id}}/edit'>編集</a>
   
      <form action="/myplan/name/{{ $travel_plan->id }}" id="form_{{ $travel_plan->id }}" method="post">
         @csrf
         @method('DELETE')
      
         <button type="button" onclick="deletePlan({{ $travel_plan->id }})">削除</button> 
　    </form>
　 @endif
　 
　 <h2>登録スポット一覧</h2>
　 <a href='/myplan/spot/{{$travel_plan ->id}}/create?budget={{$travel_plan->money}}&total={{$money_total->total}}&first_day={{$travel_plan ->departure_date}}&long={{$travel_plan ->long}}'>新規スポット登録</a>
　 
　 <div class='travel_plan_spots'>
　    
        @foreach($travel_plan_spots as $travel_plan_spot)
        
            <h3>●{{$loop->iteration}}個目のスポット</h3>
            <h4>ジャンル</h4>
            <p>{{$travel_plan_spot->spot_master->category->category}}</p>
            <h4>スポット名</h4>
            <a href='/spot_master/{{$travel_plan_spot->spot_master_id}}/show?travel_plan_id={{$travel_plan->id}}'>{{$travel_plan_spot->spot_master->spot_name}}</p>
            
            <h4>滞在日時</h4>
            <p>{{$travel_plan_spot->arrive_date}}　{{substr($travel_plan_spot->arrive_time,0,5)}}～{{$travel_plan_spot->departure_date}}　{{substr($travel_plan_spot->departure_time,0,5)}}</p>
            
            <h4>料金(1人あたり)</h4>
            <p>{{$travel_plan_spot->money}}円</p>
            
            @if($user_id== $travel_plan->user_id)
               <a href='/myplan/spot/{{$travel_plan_spot->id}}/edit?budget={{$travel_plan->money}}&total={{$money_total->total}}&first_day={{$travel_plan ->departure_date}}&long={{$travel_plan ->long}}'>編集</a>
            
               <form action="/myplan/spot/{{ $travel_plan_spot->id }}/delete" id="form_{{ $travel_plan_spot->id }}" method="post">
                  @csrf
                  @method('DELETE')
      
                  <button type="button" onclick="deletePlan({{ $travel_plan_spot->id }})">削除</button> 
　             </form>
            @endif
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