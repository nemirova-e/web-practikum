<table class="table">
    <tr>
        <th>Название пакета</th>
        <td>{{$product->name}}</td>
    </tr>
    <tr>
        <th>Процентная ставка</th>
        <td>{{$product->rate}}</td>
    </tr>
    <tr>
        <th>Количество месяцев</th>
        <td>{{$product->months}}</td>
    </tr>
    <tr>
        <th>Категория страхования</th>
        <td>{{$product->category->id}}</td>
    </tr>
    <tr>
        <th>Компания</th>
        <td>{{$product->company->id}}</td>
    </tr>
</table>



