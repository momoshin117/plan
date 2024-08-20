<!DOCTYPE html>
<html lang="ja">
    
   <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" hrel="https://fonts.googleapis.com/css?family=Nunito:200,600">

   </head>
   <body>
       <h1>駐車台数設定</h1>
       <form action='/parking_cars' method='POST'>
           @csrf
           <div class="number">
               <input type="text" name="parking_cars[number]" placeholder="区分けの選択肢：(例)5台以下"></input>
               <input type="submit" value="保存"></input>
           </div>
       </form>
       
   </body>
</html>