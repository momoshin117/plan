<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ニックネーム設定(編集)
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
    
    <h1>ニックネーム設定(編集)</h1>
    <form action='/user/nickname/update' method='POST'>
        @csrf
        @method('PUT')
        <div class="user_nickname">
            <h2>ニックネーム</h2>
            <input type="text" name="user[nickname]" value="{{$user->nickname}}" ></input>
            <p class="nickname__error" style="color:red">{{ $errors->first('user.nickname') }}</p>
        </div>
        
        <input type="submit" value="更新"></input>
        
    </form>
    
    <a href='/user/nickname/index'>戻る</a>
       
    </div>
    </div>
    </div>
    </div>
    </div>
    
</x-app-layout>