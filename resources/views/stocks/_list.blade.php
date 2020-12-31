@foreach ($stocks as $stock)
    <tr>
        <td>{{$stock['exchange']}}</td>
        <td>{{$stock['last']}}</td>
        <td>History</td>
        <td>{{$stock['date']}}</td>
    </tr>
@endforeach