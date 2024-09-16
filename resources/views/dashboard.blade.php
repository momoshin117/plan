<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!--
                    {{ __("You're logged in!") }}
                    -->
                    <br>
                    <a href='/myplan/name/index'>①旅行プラン作成</a>
                    <br>
                    <a href='/review/index'>②口コミ投稿</a>
                    <br>
                    <br>
                    
                    @can('admin')
                    管理者画面
                    <br>
                    <a href='//parking_cars'>駐車場台数設定</a>
                    <br>
                    <a href='/manager/spot_photo/index'>施設画像登録</a>
                    @endcan
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
