<x-app-layout>

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            {{ __('Личный кабинет страхового агента | Отклики на страховые продукты') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table table-hover">
                        <tr scope="col"  class="table-secondary">
                            <th scope="col">Название продукта</th>
                            <th></th>
                        </tr>
                        @foreach ($userResponses as $response)
                            <tr class="table-info">
                                <td>{{$response->product->name}}</td>
                                <td>
                                    <a href="{{route('agent.user-response.show',['user_response'=>$response])}}" class="btn btn-outline-info">Детализация</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

