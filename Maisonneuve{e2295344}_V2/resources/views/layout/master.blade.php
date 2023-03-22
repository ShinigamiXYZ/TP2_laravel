<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} - @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"  crossorigin="anonymous" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet" >
       

    </head>

    <body>
    <header class="bg-primary text-white py-3">
  
    <nav class="navbar navbar-expand-md navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">NewHouse chat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    @if(session()->has('user_id'))
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="/student">Student List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/create">Create student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/forum">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/publish">publish</a>
        </li>

      </ul>
      <div>
        <a href="/" class="btn btn-outline-dark text-white">Logout</a>
      </div>
    </div>
 @endif

  </div>
</nav>
<div class='d-flex flex-row-reverse '>
<a href="{{ url()->current() }}?lang=en" class="btn btn-outline-dark text-white">English</a>
<a href="{{ url()->current() }}?lang=fr" class="btn btn-outline-dark text-white">francais</a>
</div>


</header>

    @yield('content')

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
   
</html>