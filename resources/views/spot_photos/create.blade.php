<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            管理者画面(スポットマスターへの画像挿入)
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
    
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
    
    <a href='/manager/spot_photo/index'>戻る</a>
       
    </div>
    </div>
    </div>
    </div>
    </div>
    
</x-app-layout>