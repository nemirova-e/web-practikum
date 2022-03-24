<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Личный кабинет администратора | Добавление новой компании') }}
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.insurance-company.store')}}" method="POST">
                    <div class="col-md-4">
                        <label for="name">Название страховой компании</label>
                        <input type="text" name="name" id="name" class="form-control"/>
                    </div>
                    <br>
                    <div class="col-md-4">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control"/>
                    </div>
                    <br>
                    <input type="submit" value="Создать компанию" class="btn btn-outline-info">
                    @csrf
                </form>
                    <br>
                    <a href="{{route('admin.insurance-company.index')}}" class="btn btn-outline-info">Вернуться назад</a>

            </div>
            </div>
        </div>
    </div>
</x-app-layout>
