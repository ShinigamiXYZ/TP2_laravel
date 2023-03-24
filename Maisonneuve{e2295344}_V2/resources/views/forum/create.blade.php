@extends('layout.master')
@section('title', 'student')
@section('content')
<!-- contenue -->



<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-5">
            <h2 class='text-center'>@lang('base.forum_create.title')</h2>

            <form  method="POST">
            @csrf
          @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">@lang('base.forum_create.title_post')</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="@lang('base.forum_create.title_post_placeholder')" required>
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">@lang('base.forum_create.content_post')</label>
                    <textarea class="form-control" id="content" name="content" rows="8" placeholder="@lang('base.forum_create.content_post_placeholder')" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">@lang('base.forum_create.submit')</button>
            </form>
        </div>
    </div>
</div>



<!-- <///// contenue -->
@endsection