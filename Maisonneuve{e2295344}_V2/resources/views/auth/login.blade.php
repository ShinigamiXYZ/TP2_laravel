@extends('layout.master')
@section('title', 'student')
@section('content')
<!-- contenue -->



 >
 <form method="POST" >
        @csrf
        @method('PUT')

    <div class="container h-100 ">
    @if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Log in</h2>

                    <div class="form-outline mb-4">

                  <input type="text" name='username' id="username" class="form-control form-control-lg" />
                  <label class="form-label" for="username">username</label>
                </div>
        

                <div class="form-outline mb-4">
                  <input type="password" name='password' id="password" class="form-control form-control-lg" />
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="sumbit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">log in</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">dont have an account yet ? <a href="{{route('auth.register')}}"
                    class="fw-bold text-body"><u>create one here</u></a></p> 

              </form>

            </div>
          </div>
        </div>
      </div>
     </div>



<!-- <///// contenue -->
@endsection