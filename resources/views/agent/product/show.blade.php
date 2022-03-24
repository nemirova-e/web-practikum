<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Личный кабинет страхового агента | Информация о страховом продукте') }}
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div>
                <b>Название страхового продукта:</b>
                {{$product->name}}
            </div>
            <div>
                <b>Процентная ставка:</b>
                {{$product->rate}}
            </div>
            <div>
                <b>Количество месяцев:</b>
                {{$product->months}}
            </div>
           <div>
               <b>Категория страхования:</b>
               {{$product->category->name}}
           </div>
            <a href="{{route('agent.product.index')}}" class="btn btn-outline-info">Вернуться назад</a>
        </div>
    </div>
</x-app-layout>

