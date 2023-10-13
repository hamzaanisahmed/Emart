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
    <form class="form-signin" id="userloginForm" name="userloginForm">
       <h2 class="form-signin-heading">Sign in</h2>
       <div class="form-group mb-3">
       <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" />
       <span class="p"></span>
       </div>
       <div class="form-group mb-3">
       <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
       <span class="p"></span>
       </div>
       <div class="form-group mb-2">
            <div class="col">
                <div class="text-center">
                    <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in-alt"></i> Login</button>
                </div>
            </div><br>
            <div class="text-center" >
                <p><a href="#"> forgott password</a> </p>
            </div>
       </div>
    </form><br>
    <div class="text-center" >
        <p>Dont have a account?<a href="{{ route('user.register') }}"> SignUp</a> </p>
    </div>
  </div>
 </div>


@endsection


@section('customJs')
<script>

    $("#userloginForm").submit(function(event) {
        event.preventDefault();

        let formData = $(this).serializeArray();

        $.ajax({
            type: "POST",
            url: "{{ route('user.store') }}",
            data: formData,
            dataType: "JSON",
            success: function (response) {

                if (response['status'] == true) {

                    // Reset Validations.
                    $("#email").removeClass('is-invalid')
                        .siblings('span').removeClass('invalid-feedback').html("");

                    $("#password").removeClass('is-invalid')
                        .siblings('span').removeClass('invalid-feedback').html("");

                    swal("Good job!", "Login Successfully!", "success");

                    // Automatically close the success alert after one second
                    setTimeout(function() {
                        swal.close();
                    }, 1000); // 1 second

                    $("#userloginForm")[0].reset();


                } else {

                    let errors = response['errors'];
                    if (errors['email']) {

                        $("#email").addClass('is-invalid')
                            .siblings('span').addClass('invalid-feedback').html(errors['email']);

                    } else {

                        $("#email").removeClass('is-invalid')
                            .siblings('span').removeClass('invalid-feedback').html("");

                    }

                    if (errors['password']) {

                        $("#password").addClass('is-invalid')
                            .siblings('span').addClass('invalid-feedback').html(errors['password']);

                    } else {

                        $("#password").removeClass('is-invalid')
                            .siblings('span').removeClass('invalid-feedback').html("");

                    }
                }
            },
            error: function(jqXHR, exception) {
                console.log("Somethings went wrong");
            }
        });
    });
</script>
@endsection
