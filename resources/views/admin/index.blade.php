<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Личный кабинет администратора') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <br>
                    <a href="{{route('admin.insurance-company.index')}}" class="btn btn-outline-info">Раздел "Страховые компании"</a>
                <br>
                <br>
            </div>
        </div>
    </div>
</x-app-layout>
