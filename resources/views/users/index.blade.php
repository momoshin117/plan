<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         ニックネーム設定
      </h2>
   </x-slot>
   
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
   <div class="p-6 text-gray-900">
   
   <h1>ニックネーム設定</h1>
   
   @if($user->nickname=='')
   <a href='/user/nickname/create'>新規作成</a>
   
   <div class="user_name">
      <h2>ユーザー名</h2>
      <p>{{$user->name}}</p>
   </div>
      
   <div class="user_nickname">
      <h2>登録されてるニックネーム(※他ユーザーに公開されます)</h2>
      <p style="color:red">未登録。口コミを投稿するにはニックネームを登録してください。</p>
   </div>
   
   @else
   <div class="user_name">
      <h2>ユーザー名</h2>
      <p>{{$user->name}}</p>
   </div>
      
   <div class="user_nickname">
      <h2>登録されてるニックネーム(※他ユーザーに公開されます)</h2>
      <p>{{$user->nickname}}</p>
   </div>
   <a href='/user/nickname/edit'>編集</a>
   @endif
   
   </div>
   </div>
   </div>
   </div>
  
</x-app-layout>