<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Личный кабинет страхового агента | Добавление нового продукта') }}
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
                <form action="{{route('agent.product.store')}}" method="POST">
                    <div class="col-md-4">
                        <label for="name">Название пакета страхования</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <br>
                    <div class="col-md-4">
                        <label for="rate">Процентная ставка</label>
                        <input type="text" name="rate" class="form-control">
                    </div>
                    <br>
                    <div class="col-md-4">
                        <label for="months">Количество месяцев</label>
                        <input type="text" name="months" class="form-control">
                    </div>
                    <br>
                    <div class="col-md-4">
                        <label for="category_id">Выбрать категорию страхования</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">не указано</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ request()->get('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-outline-info" value="Добавить продукт страхования">
                    @csrf
                </form>
                    <br>
                    <a href="{{route('agent.product.index')}}" class="btn btn-outline-info">Вернуться назад</a>
            </div>
        </div>
    </div>
</x-app-layout>

