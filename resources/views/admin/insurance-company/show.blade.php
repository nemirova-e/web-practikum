<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Личный кабинет администратора | Информация о страховой компании') }}
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div>
                <b>Название страховой компании:</b>
                {{$company->name}}
            </div>
            <div>
                <b>Email:</b>
                {{$company->email}}
            </div>
            <a href="{{route('admin.insurance-company.index')}}" class="btn btn-outline-info">Вернуться назад</a>
        </div>
    </div>
</x-app-layout>
