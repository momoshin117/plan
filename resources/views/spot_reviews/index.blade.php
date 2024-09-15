<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         口コミ(一覧)
      </h2>
   </x-slot>
   
   <h2>口コミ(一覧)</h2>
   
   <a href='/review/create'>新規作成</a>
   
   <h2>過去に登録したもの</h2>
   
   @foreach($spot_reviews as $spot_review)
   
      <h3>●{{$loop->iteration}}個目の口コミ</h3>
      <h4>更新日時</h4>
      <p>{{$spot_review->updated_at->format("Y-m-d　H:i")}}</p>
      
      <h4>ジャンル</h4>
      <p>{{$spot_review->spot_master->category->category}}</p>
      
      <h4>施設名</h4>
      <a href='/spot_master/{{$spot_review->spot_master_id}}/show?travel_plan_id=0'>{{$spot_review->spot_master->spot_name}}</a>
      
      <h4>口コミ</h4>
      <h6>点数</h6>
      <p>{{$spot_review->score}}点</p>
      
      <h6>内容</h6>
      <p>{{$spot_review->commment}}</p>
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
  
</x-app-layout>