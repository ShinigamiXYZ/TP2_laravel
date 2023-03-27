@extends('layout.master')
@section('title', 'student')
@section('content')
<!-- contenue -->

<div class="container d-flex flex-column">

    <h1 class="text-center py-4">@lang('base.forum.title')</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
        @foreach ($postlists as $post)
        <div class="col p-2">
            <small class="text-muted">
            @foreach ($students as $student)
                        @if ($student->users_id == $post->user_id)
                       {{ $student->name }}
                        @endif
                        @endforeach


            </small>
            <div class="card h-100 shadow-sm border-0 rounded">
            @if (app()->getLocale() == 'fr') 
            @if($post->fr_title == null || $post->fr_content == null)
                <div class="card-body text-center">
                    <h5 class="card-title">Aucune traduction... </h5>
                    <p class="card-text">Aucune traduction ne fut créer par l'utilsateurs pour l'intant concernant cette article. </p>
                </div>
            
            @else
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $post->fr_title }}</h5>
                    <p class="card-text">{{ $post->fr_content }}</p>
                </div>
            
            @endif
            
            @elseif (app()->getLocale() == 'en')
            @if($post->en_title == null || $post->en_content == null)
            <div class="card-body text-center">
                    <h5 class="card-title">No translation...</h5>
                    <p class="card-text">Sadly, there isnt a translation for this article yet..</p>
                </div>

            @else 
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $post->en_title }}</h5>
                    <p class="card-text">{{ $post->en_content }}</p>
                </div>
            @endif
            

                @endif
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
                    <label for="content">@lang('base.forum.add_comment')</label>
                    <textarea name="content" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-2">@lang('base.forum.comment')</button>
            </form>
        </div>
        @endforeach
    </div>

    <div class="pt-5 mx-auto"> <!-- bootstrap skills -10000 -->
        <div class="pt-5">
            <div class="pt-5">
                <div class="mx-auto pt-5"> {{$postlists}}</div>
            </div>
        </div>
    </div>
</div>



<!-- <///// contenue -->



@endsection