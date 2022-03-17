<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Личный кабинет страхового агента') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Вы вошли в личный кабинет как <b>{{$user->company->name}}</b>
                </div>
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-hover">
                        <tr scope="col"  class="table-secondary">
                            <th scope="col">Ваши услуги</th>
                            <th scope="col">Просмотры</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @foreach ($productsOfThisCompany as $product)
                        <tr class="table-info">
                                <td>{{$product->name}}</td>
                                <td>{{$product->visits()}}</td>
                                <td>
                                    <a href="{{route('edit_product',['product'=>$product])}}" class="btn btn-outline-info">Редактировать</a>
                                </td>
                                <td>
                                    <a href="{{route('delete_product',['product'=>$product])}}" class="btn btn-outline-info">Удалить</a>
                                </td>
                        </tr>
                        @endforeach
                    </table>
                    <a href="{{route('add_product')}}" class="btn btn-outline-info">Добавить новый пакет страхования</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
