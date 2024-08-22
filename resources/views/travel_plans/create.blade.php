<!DOCTYPE html>
<html lang="ja">
    
   <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" hrel="https://fonts.googleapis.com/css?family=Nunito:200,600">

   </head>
   <body>
       <h1>新規日程登録</h1>
       <form action='/myplan/name/travel_plan' method='POST'>
           @csrf
           
           <div class="plan">
               
               <div class="plan_name">
                   <p>プラン名</p>
                   <input type="text" name="travel_plan[plan_name]" placeholder="2408_北海道旅行"></input>
               </div>
               
               <div class="departure_date">
                   <p>開始日</p>
                   <input type="text" name="travel_plan[departure_date]" placeholder="20240823"></input>
               </div>
               
               <div class="long">
                   <p>期間</p>
                   <input type="text" name="travel_plan[long]" placeholder="2">日</input>
                   <p>※日帰りの場合は1と入力</p>
               
               <div class="money">
                   <p>予算(1人あたり)</p>
                   <input type="text" name="travel_plan[money]" placeholder="10,000">円</input>
                   
               </div>
               <div class="disclose">
                  <p>公開設定</p>
                  <input type="radio" name="travel_plan[disclose]" value="公開">公開
                  <input type="radio" name="travel_plan[disclose]" value="非公開">非公開
               </div>

               <input type="submit" value="保存"></input>
               
           </div>
       </form>
       <a href='/myplan/name/index'>戻る</a>
   </body>
</html>