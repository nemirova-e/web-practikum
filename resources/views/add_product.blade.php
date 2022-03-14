<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Добавление нового пакета страхования') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <form action="">
                        <div class="col-md-4">
                            <label>Название пакета страхования</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label>Процентная ставка</label>
                            <input type="text" name="rate" class="form-control">
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label>Количество месяцев</label>
                            <input type="text" name="monts" class="form-control">
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
                        <div class="col-md-4">
                                <label for="insurance_company_id">Выбрать страховую компанию</label>
                                <select name="insurance_company_id" id="insurance_company_id" class="form-control">
                                    <option value="">не указано</option>
                                    @foreach($insurance_companies as $insurance_company)
                                        <option value="{{$insurance_company->id}}" {{ request()->get('insurance_company_id') == $insurance_company->id ? 'selected' : '' }}>{{$insurance_company->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <br>
                        <a href="" class="btn btn-outline-info">Добавить пакет страхования</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
