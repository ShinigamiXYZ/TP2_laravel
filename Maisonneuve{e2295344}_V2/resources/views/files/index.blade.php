@extends('layout.master')
@section('title', 'student')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class='text-center mb-5'>@lang('base.files.title')</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="#" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                @method('PUT')
                <div class="card mx-auto p-4 w-50">
                    <h4 class='text-center text-primary mb-3'>@lang('base.files.add_file')</h4>
                    <div class="form-group">
                        <label for="file">@lang('base.files.choose_file')</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="file">@lang('base.files.name')</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">@lang('base.files.upload')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>@lang('base.files.name')</th>
                        <th>@lang('base.files.action')</th>
                        <th>@lang('base.files.uploaded_by')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                    <tr>
                        <td>{{ $file->name }}</td>
                        <td>
                      
                <a href="{{ asset('storage/uploads/' . $file->file_path) }}" target="_blank" class="btn btn-info">@lang('base.files.visualise')</a>
         
                            <a href="/files/download/{{ $file->id }}" class="btn btn-success">@lang('base.files.download')</a>

                            @if ($file->user_id == Auth::id())
                     
                            <form method="POST" class="d-inline">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="id" value="{{ $file->id }}">
                     
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">
                                    @lang('base.files.update')</button>
                                @include('modal.update')
                            </form>
                    
                            <form method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $file->id }}">
                              
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                    @lang('base.files.delete')</button>
                                @include('modal.delete')
                            </form>
                            @endif
                        </td>
                        <td>
                        @foreach ($users as $user)
                                @if ($user->id === $file->user_id)
                                    {{$user->username}}
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{$files}}
    </div>
</div>
@endsection

