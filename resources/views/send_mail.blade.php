<h1>Отклик на ваш пакет страхования</h1>

<h2>Продукт</h2>

<table class="table">
    <tr>
        <th>Название пакета страхования</th>
        <td>{{ $response->product->name }}</td>
    </tr>
    <tr>
        <th>Процентная ставка</th>
        <td>{{ $response->product->rate }}</td>
    </tr>
    <tr>
        <th>Количество месяцев</th>
        <td>{{ $response->product->months }}</td>
    </tr>
    <tr>
        <th>Категория</th>
        <td>{{ $response->product->category->name }}</td>
    </tr>
    <tr>
        <th>Компания</th>
        <td>{{ $response->product->company->name }}</td>
    </tr>
</table>


<h2>Покупатель</h2>

<table class="table">

    <tr>
        <th>Фамилия</th>
        <td>{{ $response->lastname }}</td>
    </tr>

    <tr>
        <th>Имя</th>
        <td>{{ $response->firstname }}</td>
    </tr>

    <tr>
        <th>Отчество</th>
        <td>{{ $response->patronymic }}</td>
    </tr>

    <tr>
        <th>email</th>
        <td>{{ $response->email }}</td>
    </tr>

    <tr>
        <th>Контактный телефон</th>
        <td>{{ $response->phone }}</td>
    </tr>

    <tr>
        <th>Комментарий</th>
        <td>{{ $response->message }}</td>
    </tr>
</table>
