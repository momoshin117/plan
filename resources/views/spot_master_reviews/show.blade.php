<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         施設口コミ詳細情報：{{$spot_master->spot_name}}
      </h2>
   </x-slot>
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
      
   <div>
      <h2>【当サイト口コミ(最新順)】</h2>
   </div>
      
   <div class="review">
      <br>
         @foreach($spot_reviews as $spot_review)
            <p>===========================</p>
            <div class="review_updated_at">
               <h4>・投稿日：{{$spot_review->updated_at->format("Y-m-d　H:i")}}</h4>
            </div>
            <div class="review_nickname">
               <h4>・投稿者：{{$spot_review->user->nickname}}</h4>
            </div>
            <div class="review_score">
               <h4>・点数：{{$spot_review->score}}点</h4>
            </div>
            <div class="comment">
               <h4>・コメント</h4>
               <p>{{$spot_review->comment}}</p>
            </div>
            <div class="review_path">
            <h4>画像</h4>
               @foreach($spot_review_photos as $spot_review_photo)
                  @if($spot_review_photo->spot_review_id == $spot_review->id)
                     <img src="{{$spot_review_photo->path}}"alt="画像が読み込めません。" width="500" height="500">
                  @endif
               @endforeach
            </div>
            <br>
         @endforeach
   </div>
　 
　 <a href='/spot_master/{{$spot_master->id}}/show'>戻る</a>
　
   </div>
   </div>
   </div>
   </div>

</x-app-layout>