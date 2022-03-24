<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white" class="text-secondary">
            {{ __('Личный кабинет страхового агента') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Вы вошли в личный кабинет как <b>{{$user->company->name}}</b>
                    <br>
                    <br>
                    <a href="{{route('agent.product.index')}}" class="btn btn-outline-info">Страховые продукты</a>
                    <a href="{{route('agent.user-response.index')}}" class="btn btn-outline-info">Отклики</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
