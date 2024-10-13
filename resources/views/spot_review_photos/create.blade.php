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
    
    <div class="review_registered">
        <h2>【口コミ登録内容】</h2>
        <h3>スポット名</h4>
        <p>{{$spot_review->spot_master->spot_name}}</p>
        
        <h3>口コミ</h4>
            <h4>・点数</h4>
            <p>{{$spot_review->score}}点</p>
      
            <h4>・内容</h4>
            <p>{{$spot_review->comment}}</p>
    </div>
    ====
    <br>
    <h2>【写真登録】</h2>
    <form action='/review/photo/store' method='POST' enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="spot_review_photo[spot_review_id]" value={{$spot_review->id}}></input>
        
        <div class="path">
            <input type="file" name="path">
            <p class="path__error" style="color:red">{{ $errors->first('path') }}</p>
        </div>
        <br>
        <input type="submit" value="保存" class="button"></input>
        
    </form>
    <a href='/review/{{$spot_review->id}}/show'>戻る</a>
    
    </div>
    </div>
    </div>
    </div>
</x-app-layout>