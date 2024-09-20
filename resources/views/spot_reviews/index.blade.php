<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         口コミ(一覧)
      </h2>
   </x-slot>
   
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
   
   <h2>口コミ(一覧)</h2>
   
   @if($user->nickname=='')
   <p style="color:red">警告：ニックネームが未登録なため、口コミが登録できません。下記URLからニックネームを登録してください。</p>
   <a href='/user/nickname/create'>ニックネーム登録</a>
   
   @else
   <a href='/review/create'>新規口コミ投稿</a>
   
   <h2>過去に自分が登録したもの</h2>
   
   @foreach($spot_reviews as $spot_review)
   
      @if($user->id == $spot_review->user_id)
         <h3>===============================</h3>
         <h4>更新日時</h4>
         <p>{{$spot_review->updated_at->format("Y-m-d　H:i")}}</p>
      
         <h4>ジャンル</h4>
         <p>{{$spot_review->spot_master->category->category}}</p>
      
         <h4>施設名</h4>
         <a href='/spot_master/{{$spot_review->spot_master_id}}/show?before=review_index'>{{$spot_review->spot_master->spot_name}}</a>
      
         <h4>口コミ</h4>
         <h6>点数</h6>
         <p>{{$spot_review->score}}点</p>
      
         <h6>内容</h6>
         <p>{{$spot_review->comment}}</p>
      
         <h6>ニックネーム</h6>
         <p>{{$spot_review->user->nickname}}</p>
      
         <div class="show">
            <a href="/review/{{$spot_review->id}}/show">詳細</a>
         </div>
         <div class="edit">
            <a href="/review/{{$spot_review->id}}/edit">編集</a>
         </div>
         <form action="/review/{{$spot_review->id}}/delete" id="form_{{ $spot_review->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deleteData({{ $spot_review->id }})">削除</button> 
         </form>
         <br>
         <br>
      @endif
   
   @endforeach
   
   <div class='paginate'>
      {{ $spot_reviews->links() }}
   </div>
   
   <script>
      function deleteData(id) {
         'use strict'
         if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
         }
      }
   </script>
   @endif
   
   </div>
   </div>
   </div>
   </div>
  
</x-app-layout>