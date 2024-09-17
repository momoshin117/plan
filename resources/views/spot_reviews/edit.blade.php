<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            口コミ投稿
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
    
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
            <p class="spot_name__error" style="color:red">{{ $errors->first('spot_review.spot_master_id') }}</p>
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
            <p class="score__error" style="color:red">{{ $errors->first('spot_review.score') }}</p>
        </div>
        
        <div class="commment">
            <h6>・コメント</h6>
            <textarea name="spot_review[comment]">{{$spot_review->comment}}</textarea>
            <p class="comment__error" style="color:red">{{ $errors->first('spot_review.comment') }}</p>
        </div>
        
        <div class="user_name">
            <h4>ニックネーム</h4>
            <input type="hidden" name="spot_review[user_id]" value="{{$spot_review->user_id}}"></input>
            {{$spot_review->user->nickname}}
        </div>
        
        <h4>公開設定</h4>
        <p>口コミは非公開にできません。他ユーザーに公開されます。</p>
        
        <input type="submit" value="更新"></input>
        
    </form>
    
    <a href='/review/index'>戻る</a>
    
    </div>
    </div>
    </div>
    </div>
       
</x-app-layout>