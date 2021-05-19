@extends('layouts.app')

@section('title', 'Список рубрик новостей')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Список рубрик новостей</h1></div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Ярлык</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category['category_id'] }}</td>
                                <td><a href="/admin/categories/{{ $category['category_id'] }}/edit">{{ $category['title'] }}</a></td>
                                <td>{{ $category['slug'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="/admin/categories/create" role="button">Добавить рубрику</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


