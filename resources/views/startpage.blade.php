<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            <h2>Застрахуй братуху</h2>
            <h5>Маркетплейс страховых компаний</h5>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <form action="{{ route('search') }}" method="get">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="q"
                                    class="form-control"
                                    placeholder="Я ищу..."
                                    value="{{ request('q') }}"
                                />
                            </div>

                        <br>
                        <br>

                        <div class="row">
                        <div class="col-md-4">
                            <label for="insurance_company_id">Страховые компании</label>
                            <select name="insurance_company_id" id="insurance_company_id" class="form-control">
                                <option value="">не указано</option>
                                @foreach($insurance_companies as $insurance_company)
                                    <option value="{{$insurance_company->id}}" {{ request()->get('insurance_company_id') == $insurance_company->id ? 'selected' : '' }}>{{$insurance_company->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="category_id">Категории страхования</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">не указано</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ request()->get('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4">
                            <label for="rateMin">Минимальная процентная ставка</label>
                            <input type="number" name="rateMin" class="form-control" value="{{request()->get('rateMin')}}" min="0">
                        </div>
                        <div class="col-md-4">
                            <label for="rateMax">Максимальная процентная ставка</label>
                            <input type="number" name="rateMax" class="form-control" value="{{request()->get('rateMax')}}" min="0">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="monthsMin">Минимальное количество месяцев</label>
                            <input type="number" name="monthsMin" class="form-control" value="{{request()->get('monthsMin')}}" min="0">
                        </div>

                        <div class="col-md-4">
                            <label for="monthsMax">Максимальное количество месяцев</label>
                            <input type="number" name="monthsMax" class="form-control" value="{{request()->get('monthsMax')}}" min="0">
                        </div>
                    </div>

                   <br>
                    <input type="submit" value="Найти" class="btn btn-outline-info">
                    <br>
                    </form>
                    <br>
                    <table class="table">
                        <tr scope="col" class="table-secondary">
                            <th>Пакет страхования</th>
                            <th>Процентная ставка,%</th>
                            <th>Месяцы</th>
                            <th>Категории</th>
                            <th>Страховые компании</th>
                            <th></th>
                        </tr>
                        @forelse($products as $product)
                            <tr class="table-info" >
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->rate }}</td>
                                <td>{{ $product->months }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->company->name }}</td>
                                <td>
                                    <a href="{{route('submissionForm', ['product'=>$product])}}" class="btn btn-outline-info">Откликнуться</a>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">no data</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @guest
                        @if(Route::has('login'))
                            <a  class="text-info" href="{{ route('login') }} ">Войти в личный кабинет</a>
                        @endif
                        <br>
                        @if(Route::has('register'))
                            <a class="text-info" href="{{ route('register') }}">Зарегистрироваться</a>
                        @endif
                    @endguest
                    @auth
                        @if(Route::has('lk'))
                            <a class="text-info" href="{{ route('lk') }}">Личный кабинет</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
