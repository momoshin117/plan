<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         新規日程編集
      </h2>
   </x-slot>
   
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
    
   <h1>新規日程編集</h1>
   <form action='/myplan/name/{{$travel_plan ->id}}' method='POST'>
      @csrf
      @method('PUT')
           
      <div class="plan">

         <div class="plan_name">
            <p>プラン名</p>
            <input type="text" name="travel_plan[plan_name]" value="{{$travel_plan ->plan_name}}"></input>
            <p class="plan_name__error" style="color:red">{{ $errors->first('travel_plan.plan_name') }}</p>
         </div>
               
         <div class="departure_date">
            <p>開始日</p>
            <input type="text" name="travel_plan[departure_date]" value="{{$travel_plan ->departure_date}}"></input>
            <p class="departure_date__error" style="color:red">{{ $errors->first('travel_plan.departure_date') }}</p>
         </div>
               
         <div class="long">
            <p>期間</p>
            <input type="text" name="travel_plan[long]" value="{{$travel_plan ->long}}">日</input>
            <p class="long__error" style="color:red">{{ $errors->first('travel_plan.long') }}</p>
            <p>※日帰りの場合は1と入力</p>
         </div>

         <div class="money">
            <p>予算(1人あたり)</p>
            <input type="text" name="travel_plan[money]" value="{{$travel_plan ->money}}">円</input>
            <p class="money__error" style="color:red">{{ $errors->first('travel_plan.money') }}</p>

         </div>
         <div class="disclose">
            <p>公開設定</p>
            <input type="radio" name="travel_plan[disclose]" value="公開" {{$travel_plan->disclose=='公開' ? 'checked' :''}}>公開
            <input type="radio" name="travel_plan[disclose]" value="非公開"{{$travel_plan->disclose=='非公開' ? 'checked' :''}}>非公開
            <p class="disclose__error" style="color:red">{{ $errors->first('travel_plan.disclose') }}</p>
         </div>

         <input type="submit" value="更新"></input>
               
      </div>
   </form>
   
   <a href='/myplan/name/index'>戻る</a>
   
   </div>
   </div>
   </div>
   </div>
   
</x-app-layout>