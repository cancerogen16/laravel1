@extends('layouts.app')

@section('title', 'Список новостей')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Вывод списка новостей</h1></div>

                <div class="card-body">
                <table>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['title'] }}</td>
                    </tr>
                @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


