<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         管理者画面(スポットマスターへの画像挿入)
      </h2>
   </x-slot>
   
   <h1>管理者画面(スポットマスターへの画像挿入)</h1>
   
   @foreach($spot_photos as $spot_photo)
      <h4>スポット名</h4>
      <p>{{$spot_photo->spot_masters->spot_name}}</p>
      
      <h4>画像URL</h4>
      <p>{{$spot_photo->path}}</p>
   @endforeach
   
   <a href='/maneger/spot_photo/create'>新規作成</a>
  
</x-app-layout>