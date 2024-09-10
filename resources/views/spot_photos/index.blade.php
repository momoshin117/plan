<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         管理者画面(スポットマスターへの画像挿入)
      </h2>
   </x-slot>
   
   <h1>管理者画面(スポットマスターへの画像挿入)</h1>
   
   @foreach($spot_photos as $spot_photo)
      <h4>スポット名</h4>
      <p>{{$spot_photo->spot_master->spot_name}}</p>
      
      <h4>画像URL</h4>
      <div>
         <img src="{{$spot_photo->path}}" alt="画像が読み込めません。">
      </div>
      <form action="/maneger/spot_photo/{{$spot_photo->id}}/delete"  method="post">
         @csrf
         @method('DELETE')
         <button type="submit">削除</button> 
      </form>
      
   @endforeach
   
   <a href='/maneger/spot_photo/create'>新規作成</a>
  
</x-app-layout>