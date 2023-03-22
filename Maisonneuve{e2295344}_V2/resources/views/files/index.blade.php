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
            <h2>Upload File</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="file">Choose File</label>
                    <input type="file" name="file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>
<table class="table table-striped">
<thead>
<tr>
<th>Name</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($files as $file)
<tr>
<td>{{ $file->name }}</td>
<td>
<a href="#" class="btn btn-success">visualise</a>
<a href="#" class="btn btn-success">Download</a>

@if ($file->user_id == Auth::id())
<a href="#" class="btn btn-danger">deleter</a>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>

</div>
<!-- <///// contenue -->

@endsection

