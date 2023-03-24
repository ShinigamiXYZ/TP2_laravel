@extends('layout.master')
@section('title', 'student')
@section('content')
<!-- contenue -->



<div class="container">


    <div class="row">
        <div class="col-md-12">
            <h2 class='text-center'>@lang('base.files.title')</h2>

            <div class="container">
    <div class="row">
        <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-5 form-group mx-auto w-25 center">
                <h4 class='text-center text-primary'>@lang('base.files.add_file')</h4>
                    <label for="file">@lang('base.files.choose_file')</label>
                    <input type="file" name="file" class="form-control" required>
                    <label for="file">@lang('base.files.name')</label>
                    <input type="text" name="name" class="form-control" required>
                    <button type="submit" class="btn btn-primary">@lang('base.files.upload')</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
<table class="table table-striped">
<thead>
<tr>
<th>@lang('base.files.name')</th>
<th>@lang('base.files.action')</th>
<th>@lang('base.files.uploaded_by') </th>
</tr>
</thead>
<tbody>
@foreach($files as $file)
<tr>
    <td>{{ $file->name }}</td>
    <td>
        <a href="#" class="btn btn-success">@lang('base.files.visualise')</a>
        <a href="/files/download/{{ $file->id }}" class="btn btn-success">@lang('base.files.download')</a>

        @if ($file->user_id == Auth::id())
            <!-- update -->


            <form method="POST">
                @csrf
                @method('POST')
                <div class="d-none">
                    <label for="name">Id</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $file->id }}">
                </div>

                <!-- 
                MODAL - BOOTSTRAP - updateONFIRMATION
                -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">
                @lang('base.files.update')</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateLabel">@lang('base.files.update_title')<h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <label for="file">@lang('base.files.update_title_placeholder')</label>
                    <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('base.files.update_submit')</button>
                                <button type="submit" class="btn btn-danger">@lang('base.files.update_submit')</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END </ MODAL - update CONFIRMATION -->

            </form>











            <!-- <//// update -->
            <!-- delete  -->
            <form method="POST">
                @csrf
                @method('DELETE')
                <div class="d-none">
                    <label for="name">Id</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $file->id }}">
                </div>

                <!-- 
                MODAL - BOOTSTRAP - DeleteCONFIRMATION
                -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                    @lang('base.files.delete')
                </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteLabel">@lang('base.files.delete_modal_title')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            @lang('base.files.delete_body')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('base.files.delete_close')</button>
                                <button type="submit" class="btn btn-danger">@lang('base.files.delete_submit')</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END </ MODAL - Delete CONFIRMATION -->

                <!-- </// delete -->
                </form>
            @endif
        </td>
        <td>
            @foreach ($users as $user)
                @if ($user->id === $file -> user_id)
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
<div>{{$files}}</div>
</div>
<!-- <///// contenue -->

@endsection

