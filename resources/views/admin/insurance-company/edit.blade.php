<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white" class="text-secondary">
            {{ __('Личный кабинет администратора | Редактирование компании') }}
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="container">
                <form action="{{route('admin.insurance-company.update',['insurance_company'=>$company])}}" method="POST">
                    <div class="col-md-4">
                        <label for="name">Название страховой компании</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$company->name}}">
                    </div>
                    <br>
                    <div class="col-md-4">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$company->email}}">
                    </div>
                    <br>
                    <input type="submit" value="Сохранить изменения" class="btn btn-outline-info">
                    @method('PUT')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
