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
                

                @if (app()->getLocale() == 'en')
                <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="english-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="english" aria-selected="true">English</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="french-tab" data-bs-toggle="tab" data-bs-target="#french" type="button" role="tab" aria-controls="french" aria-selected="false">French</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
                            <textarea class="form-control" id="english_content" name="english_content" rows="8" placeholder="@lang('base.forum_create.content_post_placeholder')" required></textarea>
                        </div>
                        <div class="tab-pane fade" id="french" role="tabpanel" aria-labelledby="french-tab">
                            <textarea class="form-control" id="french_content" name="french_content" rows="8" placeholder="@lang('base.forum_create.content_post_placeholder')" required></textarea>
                        </div>
                    </div>
                </div>

                @elseif (app()->getLocale() == 'fr')

                <div class="mb-3">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="french-tab" data-bs-toggle="tab" data-bs-target="#french" type="button" role="tab" aria-controls="french" aria-selected="true">French</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="english-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="english" aria-selected="false">English</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="french" role="tabpanel" aria-labelledby="french-tab">
            <textarea class="form-control" id="french_content" name="french_content" rows="8" placeholder="@lang('base.forum_create.content_post_placeholder')" required></textarea>
        </div>
        <div class="tab-pane fade" id="english" role="tabpanel" aria-labelledby="english-tab">
            <textarea class="form-control" id="english_content" name="english_content" rows="8" placeholder="@lang('base.forum_create.content_post_placeholder')" required></textarea>
        </div>
    </div>
</div>

    @endif




                
                <button type="submit" class="btn btn-primary">@lang('base.forum_create.submit')</button>
            </form>
        </div>
    </div>
</div>




<!-- <///// contenue -->
@endsection