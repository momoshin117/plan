<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            口コミ投稿
        </h2>
    </x-slot>
    
    <h2>口コミ投稿</h2>
    <form action='/review/{{$spot_review->id}}/update' method='POST'>
        @csrf
        @method('PUT')
        <div class="spot_name">
            <h4>スポット名</h4>
            <select name="spot_review[spot_master_id]">
                <option value="{{$spot_review->spot_master->id}}">{{$spot_review->spot_master->spot_name}}</option>
                @foreach($spot_masters as $spot_master)
                <option value="{{$spot_master->id}}">{{$spot_master->spot_name}}</option>
                @endforeach
            </select>
        </div>
        
        <h4>口コミ</h4>
        <div class="score">
            <h6>・点数(5点満点。良い：5点。悪い：1点)</h6>
             <select name="spot_review[score]">
                <option value="{{$spot_review->score}}">{{$spot_review->score}}点</option>
                <option value="5">5点</option>
                <option value="4">4点</option>
                <option value="3">3点</option>
                <option value="2">2点</option>
                <option value="1">1点</option>
            </select>
        </div>
        
        <div class="commment">
            <h6>・コメント</h6>
            <textarea name="spot_review[commment]">{{$spot_review->commment}}</textarea>
        </div>
        
        <div class="nickname">
            <h4>ニックネーム</h4>
            <input type="text" name="spot_review[nickname]" value={{$spot_review->nickname}}></input>
        </div>
        
        <h4>公開設定</h4>
        <p>口コミは非公開にできません。他ユーザーに公開されます。</p>
        
        <input type="submit" value="更新"></input>
        
    </form>
    
    <a href='/review/index'>戻る</a>
       
</x-app-layout>