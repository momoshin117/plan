<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ニックネーム設定(新規登録)
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        
    <form action='/user/nickname/store' method='POST'>
        @csrf
        <div class="user_nickname">
            <h2>ニックネーム</h2>
            <input type="text" name="user[nickname]" placeholder="タロウ" value="{{ old('user.nickname') }}" ></input>
            <p class="nickname__error" style="color:red">{{ $errors->first('user.nickname') }}</p>
        </div>
         
        
        
        <input type="submit" value="保存" class="button"></input>
        
    </form>
    
    <a href='/user/nickname/index'>戻る</a>
       
    </div>
    </div>
    </div>
    </div>
    </div>
    
</x-app-layout>