<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            口コミ写真登録
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
    
    <h1>口コミ写真登録</h1>
   
    <div class="review_registered">
        <h4>スポット名</h4>
        <p>{{$spot_review->spot_master->spot_name}}</p>
        
        <h4>口コミ</h4>
            <h6>点数</h6>
            <p>{{$spot_review->score}}点</p>
      
            <h6>内容</h6>
            <p>{{$spot_review->commment}}</p>
    </div>
    
    <form action='/review/photo/store' method='POST' enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="spot_review_photo[spot_review_id]" value={{$spot_review->id}}></input>
        
        <div class="path">
            <input type="file" name="path">
        </div>
        
        <input type="submit" value="保存"></input>
        
    </form>
    <a href='/review/{{$spot_review->id}}/show'>戻る</a>
    
    </div>
    </div>
    </div>
    </div>
</x-app-layout>