<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         新規日程登録
      </h2>
   </x-slot>
   
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
    
   <form action='/myplan/name' method='POST'>
      @csrf
           
      <div class="plan">

         <div class="plan_name">
            <h4>プラン名</h4>
            <input type="text" name="travel_plan[plan_name]" placeholder="2408_北海道旅行" value={{old('travel_plan.plan_name')}}></input>
            <p class="plan_name__error" style="color:red">{{ $errors->first('travel_plan.plan_name') }}</p>
         </div>
               
         <div class="departure_date">
            <h4>出発日</h4>
            <input type="text" name="travel_plan[departure_date]" placeholder="2024/8/23" value={{old('travel_plan.departure_date')}}></input>
            <p class="departure_date__error" style="color:red">{{ $errors->first('travel_plan.departure_date') }}</p>
         </div>
               
         <div class="long">
            <h4>期間</h4>
            <input type="text" name="travel_plan[long]" placeholder="2" value={{old('travel_plan.long')}}>日</input>
            <p class="long__error" style="color:red">{{ $errors->first('travel_plan.long') }}</p>
            <p>※日帰りの場合は1と入力</p>
         </div>

         <div class="money">
            <h4>予算(1人あたり)</h4>
            <input type="text" name="travel_plan[money]" placeholder="10000" value={{old('travel_plan.money')}}>円</input>
            <p class="money__error" style="color:red">{{ $errors->first('travel_plan.money') }}</p>

         </div>
         <div class="disclose">
            <h4>公開設定</h4>
            <input type="radio" name="travel_plan[disclose]" value="公開" {{old('travel_plan.disclose')=='公開' ? 'checked' :''}}>公開</input>
            <input type="radio" name="travel_plan[disclose]" value="非公開" {{old('travel_plan.disclose')=='非公開' ? 'checked' :''}}>非公開</input>
            <p class="disclose__error" style="color:red">{{ $errors->first('travel_plan.disclose') }}</p>
         </div>
         <br>

         <input type="submit" value="保存" class="button"></input>
               
      </div>
   </form>
   <br>
   <a href='/myplan/name/index'>戻る</a>
   
   </div>
   </div>
   </div>
   </div>

   
</x-app-layout>