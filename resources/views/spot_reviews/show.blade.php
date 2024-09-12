<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         口コミ(詳細)
      </h2>
   </x-slot>
   
   <h2>口コミ(詳細)</h2>
   
      <h4>更新日時</h4>
      <p>{{$spot_review->updated_at}}</p>
      
      <h4>ジャンル</h4>
      <p>{{$spot_review->spot_master->category->category}}</p>
      
      <h4>施設名</h4>
      <p>{{$spot_review->spot_master->spot_name}}</p>
      
      <h4>口コミ</h4>
      <h6>点数</h6>
      <p>{{$spot_review->score}}点</p>
      
      <h6>内容</h6>
      <p>{{$spot_review->commment}}</p>
      
      <!--　
      あとで作成
      <h6>画像</h4>
      
      -->
      <div class="edit">
         <a href="/review/{{$spot_review->id}}/edit">編集</a>
      </div>
      
      <form action="/review/{{$spot_review->id}}/delete"  method="post">
         @csrf
         @method('DELETE')
         <button type="submit">削除</button> 
      </form>
      
   <a href='/review/index'>戻る</a>
  
</x-app-layout>