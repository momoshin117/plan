<!DOCTYPE html>
<html lang="ja">
    
   <head>
        <meta charset="UTF-8">
        <title>Maneger-parking_cars</title>
        <link rel="stylesheet" hrel="https://fonts.googleapis.com/css?family=Nunito:200,600">

   </head>
   <body>
       <h1>駐車台数設定</h1>
       <form action='/parking_cars/{{$parking_car->id}}' method='POST'>
           @csrf
           @method('PUT')
           <div class="number">
               <input type="text" name="parking_car[number]" value={{$parking_car->number}} ></input>
               <input type="submit" value="更新"></input>
               
           </div>
       </form>
       
   </body>
</html>