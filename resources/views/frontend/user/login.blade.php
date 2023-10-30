@extends('frontend.layouts.main')
@section('main-container')

<section class="py-5 bg-light">
    <div class="container">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
          <h1 class="h2 text-uppercase mb-0">User</h1>
        </div>
        <div class="col-lg-6 text-lg-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
              <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Login</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <div class="wrapper">
    <form class="form-signin" action="{{ route('user.store') }}" method="post">
        @csrf
       <h2 class="form-signin-heading">Sign in</h2>

       @if (Session::has('success'))
       <div class="alert alert-success">
           {{ Session::get('success') }}
       </div>
       @endif
       @if (Session::has('error'))
       <div class="alert alert-danger">
           {{ Session::get('error') }}
       </div>
       @endif

       <div class="form-group mb-3">
       <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address" =""/>
        @error('email')
            <p class="invalid-feedback p">{{ $message }}</p>
        @enderror
       </div>
       <div class="form-group mb-3">
       <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" =""/>
       @error('password')
            <p class="invalid-feedback p">{{ $message }}</i></p>
       @enderror
       </div>
       <div class="form-group mb-2">
            <div class="col">
                <div class="text-center">
                    <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in-alt"></i> Login</button>
                </div>
            </div><br>
            <div class="text-center" >
                <p><a href="#"> forgott password?</a> </p>
            </div>
       </div>
    </form><br>
    <div class="text-center" >
        <p>Don't have an account?<a href="{{ route('user.register') }}"> SignUp</a> </p>
    </div>
  </div>
 </div>

@endsection

