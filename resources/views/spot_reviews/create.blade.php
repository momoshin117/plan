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
    
    <form action='/review/store' method='POST'>
        @csrf
        <div class="spot_name">
            <h4>スポット名</h4>
            <select name="spot_review[spot_master_id]">
                <option value="">--選択してください--</option>
                @foreach($spot_masters as $spot_master)
                <option value="{{$spot_master->id}}" @if( $spot_master->id == (int)old('spot_review.spot_master_id')) selected @endif>{{$spot_master->spot_name}}</option>
                @endforeach
            </select>
            <p class="spot_name__error" style="color:red">{{ $errors->first('spot_review.spot_master_id') }}</p>
        </div>
        
        <h4>口コミ</h4>
        <div class="score">
            <h6>・点数(5点満点。良い：5点。悪い：1点)</h6>
             <select name="spot_review[score]">
                <option value="">--選択してください--</option>
                <option value="5" @if( 5 == (int)old('spot_review.score')) selected @endif>5点</option>
                <option value="4" @if( 4 == (int)old('spot_review.score')) selected @endif>4点</option>
                <option value="3" @if( 3 == (int)old('spot_review.score')) selected @endif>3点</option>
                <option value="2" @if( 2 == (int)old('spot_review.score')) selected @endif>2点</option>
                <option value="1" @if( 51== (int)old('spot_review.score')) selected @endif>1点</option>
            </select>
            <p class="score__error" style="color:red">{{ $errors->first('spot_review.score') }}</p>
        </div>
        
        <div class="comment">
            <h6>・コメント</h6>
            <textarea name="spot_review[comment]" placeholder="スタッフの対応が良かった。" >{{old('spot_review.comment')}}</textarea>
            <p class="comment__error" style="color:red">{{ $errors->first('spot_review.comment') }}</p>
        </div>
        
        <div class="user_name">
            <h4>ニックネーム</h4>
            <input type="hidden" name="spot_review[user_id]" value="{{$user->id}}"></input>
            <p>{{$user->nickname}}</p>
        </div>
        
        <h4>公開設定</h4>
        <p>口コミは非公開にできません。他ユーザーに公開されます。</p>
        
        <input type="submit" value="保存"></input>
        
    </form>
    
    <a href='/review/index'>戻る</a>
    
    </div>
    </div>
    </div>
    </div>
</x-app-layout>