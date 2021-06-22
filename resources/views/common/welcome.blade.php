@extends('layouts.app')

@section('title', 'Страница приветствия')

@section('content')

<x-slider></x-slider>

<div class="container">
    <div class="row">
        <div class="col-12">
            @include('common.result')
        </div>
    </div>
</div>
@endsection
