@extends('layout.master')
@section('title', 'student')
@section('content')
<!-- contenue -->

<div class="container">
    <h1 class="text-center py-4">Forum</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($postlists as $post)
        <div class="col">
      
            <div class="card h-100 shadow-sm border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
                <div class="card-footer bg-white">
                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                </div>
            </div>

            <ul class="list-group">
                @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        
                    @foreach ($students as $student)
    @if ($student->users_id == $comment->user_id)
        <strong>{{ $student->name }}</strong>
    @endif
@endforeach

                    </strong> {{ $comment->content }}
                    <small class="xs text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </li>
                @endforeach
            </ul>

            <form method="POST" class="my-3">
                @csrf
                @method('PUT')
                <input type="hidden" name="forum_id" value="{{ $post->id }}">

                <div class="form-group">
                    <label for="content">Add Comment:</label>
                    <textarea name="content" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Comment</button>
            </form>
        </div>
        @endforeach
    </div>

  
</div>



<!-- <///// contenue -->



@endsection