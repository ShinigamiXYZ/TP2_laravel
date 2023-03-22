@extends('layout.master')
@section('title', 'student')
@section('content')
<!-- contenue -->



<h1 class="text-center py-4">Forum</h1>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($postlists as $post)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="#" class="btn btn-primary">View Post</a>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small> <!-- https://laraveldaily.com/post/carbon-diffforhumans-parameters-and-extra-options -->
                        </div>
                    </div>
                
                </div>
            @endforeach
        </div>
    </div>

<!-- <///// contenue -->
@endsection