<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Личный кабинет страхового агента | Страховые продукты') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('agent.product.create')}}" class="btn btn-outline-info">Добавить новый продукт страхования</a>
                    <br>
                    <br>
                    <table class="table table-hover">
                        <tr scope="col"  class="table-secondary">
                            <th scope="col">Ваши услуги</th>
                            <th scope="col">Просмотры</th>
                            <th></th>
                        </tr>
                        @foreach ($productsOfThisCompany as $product)
                        <tr class="table-info">
                            <td>{{$product->name}}</td>
                            <td>{{$product->visits()}}</td>
                            <td>
                                <a href="{{route('agent.product.edit',['product'=>$product])}}" class="btn btn-outline-info">Редактировать</a>
                                <a href="{{route('agent.product.show',['product'=>$product])}}" class="btn btn-outline-info">Детализация</a>
                                <br>
                                <br>
                                <form action="{{route('agent.product.destroy',['product'=>$product])}}" method="POST>
                                    @method('DELETE')
                                    @csrf
                                    <input type="sumbit" value="Удалить" class="btn btn-outline-info">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
