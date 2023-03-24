@extends('layout.master')
@section('title', 'student')
@section('content')
<!-- contenue -->



<div class="container">


    <div class="row">
        <div class="col-md-12">
            <h2 class='text-center'>File Repository</h2>

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
                <h4 class='text-center text-primary'>Upload File</h4>
                    <label for="file">Choose File</label>
                    <input type="file" name="file" class="form-control" required>
                    <label for="file">add title</label>
                    <input type="text" name="name" class="form-control" required>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
<table class="table table-striped">
<thead>
<tr>
<th>Name</th>
<th>Action</th>
<th>Uploaded by </th>
</tr>
</thead>
<tbody>
@foreach($files as $file)
<tr>
    <td>{{ $file->name }}</td>
    <td>
        <a href="#" class="btn btn-success">visualise</a>
        <a href="/files/download/{{ $file->id }}" class="btn btn-success">Download</a>

        @if ($file->user_id == Auth::id())
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
                    delete
                </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteLabel">Confirmation de changements</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Voulez-vous vraiment supprimer ce document?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END </ MODAL - Delete CONFIRMATION -->

                <!-- </// delete -->
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

