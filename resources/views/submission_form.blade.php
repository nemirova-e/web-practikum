<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <x-slot name="header">
        <div class="p-3 mb-2 bg-info text-white"class="text-secondary">
            <h5>Оставьте свою заявку</h5>
            <h6>Наши сотрудники свяжутся с вами в ближайшее время</h6>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="col-md-4">
                            <label>Выбранный пакет страхования</label>
                            <input type="text" class="form-control">
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label>Фамилия</label>
                            <input type="text" class="form-control">
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label>Имя</label>
                            <input type="text" class="form-control">
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label>Отчество</label>
                            <input type="text" class="form-control">
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label>email</label>
                            <input type="text" class="form-control">
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label>Контактный телефон</label>
                            <input type="text" class="form-control" placeholder="+7">
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label>Ваш комментарий</label>
                            <textarea class="form-control" placeholder="Удобное время для связи"></textarea>
                        </div>
                        <br>
                        <form action="" method="get">
                            <input type="submit" class="btn btn-outline-info" value="Отправить заявку">
                        </form>

</x-app-layout>
