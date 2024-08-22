<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            駐車場台数設定
        </h2>
    </x-slot>
    
    <h1>駐車台数設定</h1>
    <form action='/parking_cars/{{$parking_car->id}}' method='POST'>
        @csrf
        @method('PUT')
        <div class="number">
            <input type="text" name="parking_car[number]" value={{$parking_car->number}} ></input>
            <input type="submit" value="更新"></input>
               
        </div>
    </form>
       
</x-app-layout>