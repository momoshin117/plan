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

   ====
   <form action='/read/spot_master/search' method='POST'>
      @csrf
      <h2>【絞り込み条件】</h2>
      <div class="category">
         <h4>ジャンル(任意)</h4>
         <select name="read_spot_master_search[category_id]">
            <option value="">--絞り込みなし--</option>
            @foreach($categories as $category)
               <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
         </select>
      </div>
      <div class="prefecture">
         <h4>都道府県(任意)</h4>
         <select name="read_spot_master_search[prefecture_id]">
            <option value="">--絞り込みなし--</option>
            @foreach($prefectures as $prefecture)
               <option value="{{$prefecture->id}}">{{$prefecture->prefecture}}</option>
            @endforeach
         </select>
      </div>
      <div class="favorite">
         <br>
         <input type="hidden" name="read_spot_master_search[favorite]" value="0">
         <input type="checkbox" name="read_spot_master_search[favorite]" value="1">お気に入りのみ</input>
      </div>
      <p class="category__error" style="color:red">{{ $errors->first('read_spot_master_search.category_id') }}</p>
      <input type="submit" value="絞り込み" class="button"></input>
   </form>
   ====
   <br>
   <h3>表示順：口コミ評価高い順</h3>
   @foreach($spot_masters as $spot_master)
      <div class="spot_name">
         <h3>●スポット名</h3>
         <a href="/spot_master/{{$spot_master->id}}/show?before=read_spot_master">{{$spot_master->spot_name}}</a>
      </div>
      <div class="category">
         <p>　・ジャンル：{{$spot_master->category->category}}</p>
      </div>
      <div class="prefecture">
         <p>　・都道府県：{{$spot_master->prefecture->prefecture}}</p>
      </div>
      <?php $count=0; ?>
      
      @if(isset($spot_review_photos))
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
      @endif
      <br>
   @endforeach
   
   {{ $spot_masters->links() }}
   
   </div>
   </div>
   </div>
   </div>
  
</x-app-layout>