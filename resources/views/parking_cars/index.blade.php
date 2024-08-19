<!DOCTYPE html>
<html lang="ja">
    
   <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" hrel="https://fonts.googleapis.com/css?family=Nunito:200,600">

   </head>
   <body>
       <h1>駐車台数設定</h1>
       <div class='parking_cars'>
           @foreach($parking_cars as $parking_car)
                <p class='number'>{{$parking_car->number}}</p>
            @endforeach
           
       </div>
       
   </body>
</html>