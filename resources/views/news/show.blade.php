@extends('layouts.app')

@section('title', 'Новость')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Новость #{{ $current_post['id'] }}</h1> </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>{{ $current_post['title'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
