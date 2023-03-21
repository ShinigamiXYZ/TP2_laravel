@extends('layout.master')
@section('title', 'student')
@section('content')
<!-- contenue -->


<section class="vh-100"
 >

 
<form method="POST">
        @csrf
        @method('PUT')
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <div class="form-outline mb-4">
              <label for="fullname">Your name</label>
              <select name="fullname" id="fullname" class="form-control form-control-lg">]
              @foreach($students as $student)
              <option value="{{ $student->id }}" {{ old('fullname') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>

                @endforeach
                    </select>
                    </div>
                    <div class="form-outline mb-4">
                    <label for="username">username</label>
                  <input type="text" name="username" id="username" class="form-control form-control-lg" value="{{ old('username') }}"> 
                  @error('username')
            <div class="text-danger">{{ $message }}</div> <!-- Affiche le message d'erreur personnaliser en lien avec la validations creer dans studentController -->
        @enderror
                </div>
        

                <div class="form-outline mb-4">
                <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control form-control-lg" />
                  @error('password')
            <div class="text-danger">{{ $message }}</div> <!-- Affiche le message d'erreur personnaliser en lien avec la validations creer dans studentController -->
        @enderror
                </div>

                <div class="form-outline mb-4">
                <label  for="password_confirmation">Repeat your password</label>
                  <input type="password" name="password_confirmation"  id="password_confirmation" class="form-control form-control-lg" />
                  
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div> <!-- modifiier plus tard -->

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('auth.login')}}"
                    class="fw-bold text-body"><u>Login here</u></a></p> 

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>



<!-- <///// contenue -->
@endsection