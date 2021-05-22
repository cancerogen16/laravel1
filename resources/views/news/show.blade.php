@extends('layouts.app')

@section('title'){{ $current_post['title'] }}@endsection

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{ $current_post['title'] }}</h1>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <small class="text-muted">{{ $current_post['slug'] }}</small>
                            <p class="card-text">{{ $current_post['content_html'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
