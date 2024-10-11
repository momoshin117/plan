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
   
   @if($user->nickname=='')
   <a href='/user/nickname/create' class="button">新規作成</a>
   
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
   <br>
   <br>
   @can('admin')
      【管理者画面(全ユーザーのニックネーム一覧)】
      <br>
      <div class="user_nickname_index">
         <h2>使用ニックネーム一覧</h2>
         @foreach($user_alls as $user_all)
         <p>・{{$user_all->nickname==""?'未登録':$user_all->nickname}}　(Id:{{$user_all->id}}、ユーザー名：{{$user_all->name}})</p>
         @endforeach
      </div>
   @endcan
   
   </div>
   </div>
   </div>
   </div>
  
</x-app-layout>