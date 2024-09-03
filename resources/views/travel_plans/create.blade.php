<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         新規日程登録
      </h2>
   </x-slot>
    
   <h1>新規日程登録</h1>
   <form action='/myplan/name' method='POST'>
      @csrf
           
      <div class="plan">

         <div class="plan_name">
            <p>プラン名</p>
            <input type="text" name="travel_plan[plan_name]" placeholder="2408_北海道旅行" value={{old('travel_plan.plan_name')}}></input>
            <p class="plan_name__error" style="color:red">{{ $errors->first('travel_plan.plan_name') }}</p>
         </div>
               
         <div class="departure_date">
            <p>出発日</p>
            <input type="text" name="travel_plan[departure_date]" placeholder="20240823" value={{old('travel_plan.departure_date')}}></input>
            <p class="departure_date__error" style="color:red">{{ $errors->first('travel_plan.departure_date') }}</p>
         </div>
               
         <div class="long">
            <p>期間</p>
            <input type="text" name="travel_plan[long]" placeholder="2" value={{old('travel_plan.long')}}>日</input>
            <p class="long__error" style="color:red">{{ $errors->first('travel_plan.long') }}</p>
            <p>※日帰りの場合は1と入力</p>
         </div>

         <div class="money">
            <p>予算(1人あたり)</p>
            <input type="text" name="travel_plan[money]" placeholder="10000" value={{old('travel_plan.money')}}>円</input>
            <p class="money__error" style="color:red">{{ $errors->first('travel_plan.money') }}</p>

         </div>
         <div class="disclose">
            <p>公開設定</p>
            <input type="radio" name="travel_plan[disclose]" value="公開" {{old('travel_plan.disclose')=='公開' ? 'checked' :''}}>公開</input>
            <input type="radio" name="travel_plan[disclose]" value="非公開" {{old('travel_plan.disclose')=='非公開' ? 'checked' :''}}>非公開</input>
            <p class="disclose__error" style="color:red">{{ $errors->first('travel_plan.disclose') }}</p>
         </div>

         <input type="submit" value="保存"></input>
               
      </div>
   </form>
   
   <a href='/myplan/name/index'>戻る</a>
   
</x-app-layout>