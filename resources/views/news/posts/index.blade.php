<h1>вывод списка новостей</h1> 
<table>
@foreach($items as $item)
    <tr>
        <td>{{ $item['id'] }}</td>
        <td>{{ $item['title'] }}</td>
    </tr>
@endforeach
</table>