<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            駐車場台数設定
        </h2>
    </x-slot>
    <h1>駐車台数設定</h1>
    <div class='parking_cars'>
        @foreach($parking_cars as $parking_car)
            <p class='number'>{{$parking_car->number}}</p>
            <a href='/parking_cars/edit/{{$parking_car ->id}}'>編集</a>
            <br>
            <form action="/parking_cars/delete/{{ $parking_car->id }}" id="form_{{ $parking_car->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteData({{ $parking_car->id }})">削除</button>
            </form>
        @endforeach
           
    </div>
    <br>
    <a href='/parking_cars/create'>新規作成</a>
    <script>
        function deleteData(id){
            'use strict'
               
        if(confirm('削除すると復元できません。\n本当に削除しますか？'))
            {
                document.getElementById(`form_${id}`).submit();
            }
        }
       </script>
</x-app-layout>