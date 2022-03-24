<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white" class="text-secondary">
            {{ __('Личный кабинет администратора | Страховые компании') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{route('admin.insurance-company.create')}}" class="btn btn-outline-info">Добавить новую компанию</a>
                    <br>
                    <br>
                    <a href="{{route('admin.index')}}" class="btn btn-outline-info">Вернуться на главную страницу</a>
                </div>
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <tr>
                            <th>Название страховой компании</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>
                            <a href="{{route('admin.insurance-company.edit', ['insurance_company' => $company])}}" class="btn btn-outline-info">Редактировать</a>
                            <a href="{{route('admin.insurance-company.show', ['insurance_company' => $company])}}" class="btn btn-outline-info">Детализация</a>
                            <br>
                            <br>
{{--                            <form action="{{route('admin.insurance-company.destroy', ['insurance_company' => $company])}}" method="POST">--}}
{{--                            @method('DELETE')--}}
{{--                            @csrf--}}
{{--                            <input type="submit" value="Удалить" class="btn btn-outline-info">--}}
{{--                            </form>--}}
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
