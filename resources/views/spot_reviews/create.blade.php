<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            口コミ投稿
        </h2>
    </x-slot>
    
    <h2>口コミ投稿</h2>
    <form action='/review/store' method='POST'>
        @csrf
        <div class="spot_name">
            <h4>スポット名</h4>
            <select name="spot_review[spot_master_id]">
                <option value="">--選択してください--</option>
                @foreach($spot_masters as $spot_master)
                <option value="{{$spot_master->id}}">{{$spot_master->spot_name}}</option>
                @endforeach
            </select>
        </div>
        
        <h4>口コミ</h4>
        <div class="score">
            <h6>・点数(5点満点。良い：5点。悪い：1点)</h6>
             <select name="spot_review[score]">
                <option value="">--選択してください--</option>
                <option value="5">5点</option>
                <option value="4">4点</option>
                <option value="3">3点</option>
                <option value="2">2点</option>
                <option value="1">1点</option>
            </select>
        </div>
        
        <div class="commment">
            <h6>・コメント</h6>
            <textarea name="spot_review[commment]" placeholder="スタッフの対応が良かった。"></textarea>
        </div>
        
        <div class="user_name">
            <h4>ユーザー名</h4>
            <input type="hidden" name="spot_review[user_id]" value="{{$user->id}}"></input>
            <p>{{$user->name}}</p>
        </div>
        
        <h4>公開設定</h4>
        <p>口コミは非公開にできません。他ユーザーに公開されます。</p>
        
        <input type="submit" value="保存"></input>
        
    </form>
    
    <a href='/review/index'>戻る</a>
       
</x-app-layout>