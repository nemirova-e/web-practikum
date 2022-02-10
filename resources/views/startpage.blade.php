<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Застрахуй братуху! <br>
            Маркетплейс страховых компаний для каждого
        </h2>
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
                        </form>
                        <br>
                        <br>
                        @foreach ($products as $product)
                            {{$product->name}}
                            <br>
                            <br>
{{--                            <p class="m-0">{{ $product->rate}}</body>--}}
{{--                            <br>--}}
                        @endforeach

                    </div>

{{--                    {{$products->links() }}--}}
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
                            <a href="{{ route('login') }}">Войти в личный кабинет</a>
                        @endif
                        <br>
                        @if(Route::has('register'))
                            <a href="{{ route('register') }}">Зарегистрироваться</a>
                        @endif
                    @endguest
                    @auth
                        @if(Route::has('lk'))
                            <a href="{{ route('lk') }}">Личный кабинет</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
