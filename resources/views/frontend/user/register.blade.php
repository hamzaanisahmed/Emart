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
              <li class="breadcrumb-item active" aria-current="page">User Registration</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <div class="wrapper">
    <form class="form-signin" id="registrationForm" name="registrationForm">
       <h2 class="form-signin-heading">Sign Up</h2>
       <div class="form-group mb-3">
        <input type="text" class="form-control" name="firstname" placeholder="First Name" required="" autofocus="" />
        </div>
        <div class="form-group mb-3">
       <input type="text" class="form-control" name="surname" placeholder="Surname" required="" autofocus="" />
       </div>
       <div class="form-group mb-3">
       <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
       </div>
       <div class="form-group mb-3">
        <input type="number" class="form-control" name="phone_number" placeholder="Phone number" required=""/>
        </div>
       <div class="form-group mb-3">
       <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
       </div>
       <div class="form-group mb-3">
        <input type="confirmation_password" class="form-control" name="confirmation_password" placeholder="Confirm Password" required=""/>
        </div>
       {{-- <div class="form-group mb-3">
       <label class="checkbox">
       <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
       </label>
       </div> --}}
       <div class="row">
        <div class="col">
            <div class="text-center">
                <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-user-md"> </i> Register</button>
            </div>
       </div>
    </form>
  </div>
 </div>


@endsection
