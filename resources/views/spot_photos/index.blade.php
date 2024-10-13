<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         管理者画面(スポットマスターへの画像挿入)
      </h2>
   </x-slot>
   
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
   
   
   <a href='/maneger/spot_photo/create' class="button">新規画像登録</a>
   
   @foreach($spot_photos as $spot_photo)
      <h4>スポット名</h4>
      <p>{{$spot_photo->spot_master->spot_name}}</p>
      
      <h4>画像</h4>
      <div>
         <img src="{{$spot_photo->path}}" alt="画像が読み込めません。" width="500" height="500">
      </div>
      <form action="/maneger/spot_photo/{{$spot_photo->id}}/delete"  method="post">
         @csrf
         @method('DELETE')
         <button type="submit" class="delete">削除</button> 
      </form>
      <h4>=============</h4>
      
   @endforeach
   
   <div class='paginate'>
      {{ $spot_photos->links() }}
   </div>
   
   </div>
   </div>
   </div>
   </div>
  
</x-app-layout>