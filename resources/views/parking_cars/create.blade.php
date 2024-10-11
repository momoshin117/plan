<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            駐車場台数設定
        </h2>
    </x-slot>
    
    <h1>駐車台数設定</h1>
    <form action='/parking_cars' method='POST'>
        @csrf
        <div class="number">
            <input type="text" name="parking_cars[number]" placeholder="区分けの選択肢：(例)5台以下"></input>
            <input type="submit" value="保存" class="button"></input>
        </div>
    </form>
       
</x-app-layout>