<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            管理者画面(スポットマスターへの画像挿入)
        </h2>
    </x-slot>
    
    <h1>管理者画面(スポットマスターへの画像挿入)</h1>
    <form action='/maneger/spot_photo/store' method='POST' enctype="multipart/form-data">
        @csrf
        <div class="spot_name">
            <h4>スポット名</h4>
            <select name="spot_photo[spot_master_id]">
                <option value="">--選択してください--</option>
                @foreach($spot_masters as $spot_master)
                <option value="{{$spot_master->id}}">{{$spot_master->spot_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="path">
        
            <input type="file" name="path">
        </div>
        
        <input type="submit" value="保存"></input>
        
    </form>
       
</x-app-layout>