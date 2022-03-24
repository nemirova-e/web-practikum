<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white" class="text-secondary">
            {{ __('Личный кабинет агента | Редактирование страхового продукта') }}
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="container">
                <form action="{{route('agent.product.update',['product'=>$product])}}" method="POST">
                    <div class="col-md-4">
                        <label for="name">Название страхового продукта</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
                    </div>
                    <br>
                    <div class="col-md-4">
                        <label for="rate">Процентная ставка</label>
                        <input type="text" name="rate" class="form-control" value="{{$product->rate}}">
                    </div>
                    <br>
                    <div class="col-md-4">
                        <label for="months">Количество месяцев</label>
                        <input type="text" name="months" class="form-control" value="{{$product->months}}">
                    </div>
                    <br>
                    <div class="col-md-4">
                        <label for="category_id">Категория страхования</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">не указано</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ request()->get('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <input type="submit" value="Сохранить изменения" class="btn btn-outline-info">
                    @method('PUT')
                    @csrf
                </form>
                <br>
                <a href="{{route('agent.product.index')}}" class="btn btn-outline-info">Вернуться назад</a>
            </div>
        </div>
    </div>
</x-app-layout>

