@extends('layouts.app')

@section('title', 'Список категорий новостей')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Список категорий новостей</h1>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($categories as $category)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-img-top">
                                <div class="card-img">
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <path id="path1" d="M10,30 H190 M10,60 H190 M10,90 H190 M10,120 H190"></path>
                                        </defs>
                                        <use xlink:href="#path1" x="25%" y="35" stroke="blue" stroke-width="1" />
                                        <rect width="100%" height="100%" fill="#55595c"/>
                                    </svg>
                                </div>
                                <div class="card-title-wrap">
                                    <div class="card-title">
                                        {{ $category->title }}
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/categories/{{ $category->id }}/news" class="btn btn-sm btn-outline-secondary">Новости из категории</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


