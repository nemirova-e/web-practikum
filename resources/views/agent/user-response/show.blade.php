<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Личный кабинет страхового агента | Отклик на продукт') }}
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div>
                <b>Имя:</b>
                {{$response->firstname}}
            </div>
            <div>
                <b>Фамилия:</b>
                {{$response->lastname}}
            </div>
            <div>
                <b>Отчество:</b>
                {{$response->patronymic}}
            </div>
            <div>
                <b>Контактный телефон:</b>
                {{$response->phone}}
            </div>
            <div>
                <b>email:</b>
                {{$response->email}}
            </div>
            <div>
                <b>Комментарий:</b>
                {{$response->message}}
            </div>
            <a href="{{route('agent.user-response.index')}}" class="btn btn-outline-info">Вернуться назад</a>
        </div>
    </div>
</x-app-layout>
