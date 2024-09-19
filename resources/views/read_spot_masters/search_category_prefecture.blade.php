<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         スポット閲覧・検索
      </h2>
   </x-slot>
   
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
   
   <h1>スポット閲覧・検索</h1>
   <br>
   ====
   <h2>【絞り込み条件】</h2>
   <div class="category">
      <h4>ジャンル：{{$category->category}}</h4>
   </div>
   <div class="prefecture">
      <h4>都道府県：{{$prefecture->prefecture}}</h4>
   </div>
   ====
   <br>
   <br>
   @foreach($spot_masters as $spot_master)
      <div class="spot_name">
         <h2>●スポット名</h2>
         <a href="/spot_master/{{$spot_master->id}}/show?before=read_spot_master">{{$spot_master->spot_name}}</a>
      </div>
      <div class="category">
         <p>　・ジャンル：{{$spot_master->category->category}}</p>
      </div>
      <div class="prefecture">
         <p>　・都道府県：{{$spot_master->prefecture->prefecture}}</p>
      </div>
      <?php $count=0; ?>
      
      @foreach($spot_review_photos as $spot_review_photo)
         @if($spot_review_photo->spot_review->spot_master_id ==$spot_master->id)
         
            @if($count <= 2)
               <div class="spot_photo">
                  <img src="{{$spot_review_photo->path}}" alt="画像が読み込めません。" width="500" height="500">
                  <?php $count++; ?>
               </div>
            @endif
            
         @endif
      @endforeach
      <br>
   @endforeach
   
   {{ $spot_masters->links() }}
   
   <a href='/read/spot_master/index'>戻る</a>
   
   </div>
   </div>
   </div>
   </div>
  
</x-app-layout>