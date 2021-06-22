@extends('layouts.app')

@section('title'){{ $news->title }}@endsection

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{ $news->title }}</h1>
                <p class="lead text-muted">{{ $news->category->title }}</p>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-img-top">
                            <div class="card-img">
                                @if($news->image)
                                    <img src="{{ Storage::disk('public')->url($news->image) }}" alt="{{ $news->title }}">
                                @else
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <path id="path1" d="M10,30 H190 M10,60 H190 M10,90 H190 M10,120 H190"></path>
                                        </defs>
                                        <use xlink:href="#path1" x="25%" y="35" stroke="blue" stroke-width="1" />
                                        <rect width="100%" height="100%" fill="#55595c"/>
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">{{ $news->created_at->format('d.m.Y H:i') }}</small>
                            </div>
                            <div class="card-text">{!! $news->description !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
