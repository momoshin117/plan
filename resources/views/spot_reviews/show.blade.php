<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         口コミ(詳細)
      </h2>
   </x-slot>
   
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
   
   <h2>口コミ(詳細)</h2>
   
      <h4>更新日時</h4>
      <p>{{$spot_review->updated_at}}</p>
      
      <h4>ジャンル</h4>
      <p>{{$spot_review->spot_master->category->category}}</p>
      
      <h4>施設名</h4>
      <a href='/spot_master/{{$spot_review->spot_master_id}}/show?travel_plan_id=0'>{{$spot_review->spot_master->spot_name}}</a>
      
      <h4>口コミ</h4>
      <h6>点数</h6>
      <p>{{$spot_review->score}}点</p>
      
      <h6>内容</h6>
      <p>{{$spot_review->commment}}</p>
      
      <h6>ニックネーム</h6>
      <p>{{$spot_review->user->nickname}}</p>
      
      <h6>画像</h6>
      <div class="spot_review_photo">
         @foreach($spot_review_photos as $spot_review_photo)
            <img src="{{ $spot_review_photo->path }}" alt="画像が読み込めません。">
            
            @if($user_id==$spot_review->user_id)
               <form action="/review/photo/{{ $spot_review_photo->id }}/delete" id="form_{{ $spot_review_photo->id }}" method="post">
                   @csrf
                   @method('DELETE')
                   <button type="button" onclick="deletePlan({{ $spot_review_photo->id }})">削除</button> 
　             </form>
　          @endif
         @endforeach
      </div>
      
      @if($user_id==$spot_review->user_id)
         <div class="create_photo">
            <a href="/review/photo/create?spot_review_id={{$spot_review->id}}">口コミ画像登録(任意)</a>
         </div>
      @endif
      
   <a href='/review/index'>戻る</a>
   
   <script>
    function deletePlan(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
   </script>  
   
   </div>
   </div>
   </div>
   </div>
  
</x-app-layout>