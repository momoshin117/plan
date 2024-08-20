<!DOCTYPE html>
<html lang="ja">
    
   <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" hrel="https://fonts.googleapis.com/css?family=Nunito:200,600">

   </head>
   <body>
       <h1>新規日程登録</h1>
       <form action='/parking_cars' method='POST'>
           @csrf
           
           <div class="plan_name">
               
               <p>プラン名</p>
                <input type="text" name="travel_plan[plan_name]" placeholder="2408_北海道旅行"></input>
            
               <p>開始日</p>
               
               <p>期間</p>
               <div class="long">
                    <input type="text" name="travel_plan[plan_name]" placeholder="2408_北海道旅行"></input>
                   
                       
                   
               
               

               
               <p>予算(1人あたり)</p>
               
               <p>公開設定</p>
               
               
               <input type="submit" value="保存"></input>
               
           </div>
       </form>
       <a href='/myplan/name/index'>戻る</a>
   </body>
</html>