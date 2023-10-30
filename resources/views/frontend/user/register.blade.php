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
    <form class="form-signin" id="userRegistrationForm" name="userRegistrationForm">
       <h2 class="form-signin-heading">Sign Up</h2>
       <div class="form-group mb-3">
        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required/>
        <p class="p"></p>
        </div>
       <div class="form-group mb-3">
       <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required=""/>
       <p class="p"></p>
       </div>
       <div class="form-group mb-3">
        <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number" required=""/>
        <p class="p"></p>
        </div>
       <div class="form-group mb-3">
       <input type="password" class="form-control" name="password" id="password" placeholder="Password" required=""/>
       <p class="p"></p>
       </div>
       <div class="form-group mb-3">
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required=""/>
        <p class="p"></p>
        </div>
       <div class="row">
        <div class="col">
            <div class="text-center">
                <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-user-md"> </i> Register</button>
            </div>
       </div>
    </form>
  </div><br>
  <div class="text-center">
    <p>Already have an account?<a href="{{ route('user.login') }}"> Sign in</a> </p>
  </div>
 </div>


@endsection



@section('customJs')
<script>
    $("#userRegistrationForm").submit(function(event) {
        event.preventDefault();

        let formData = $(this).serializeArray();

        $("button[type='submit']").prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "{{ route('user.register') }}",
            data: formData,
            dataType: "JSON",
            success: function (response) {
                $("button[type='submit']").prop('disabled', false);

                if (response.status == true) {

                    // Reset Validations.
                    $(".p").removeClass('invalid-feedback').html('');
                    $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                    swal({
                        title: "Good Job!",
                        text: "You Have Been Registerd Successfully!",
                        icon: "success",
                        buttons: false
                    });

                    setTimeout(function() {

                        swal.close();
                        window.location.href = "{{ route('user.login') }}";

                    }, 2000);

                } else {

                    let errors = response.errors;

                    $(".p").removeClass('invalid-feedback').html('');
                    $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                    $.each(errors, function (key, value) {

                        $(`#${key}`).addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(value);

                    });
                }
            },
            error: function(jQXHR, execption) {
                console.log("Oops something went wrong");
            }

        }); // Ajax

    }); // userRegistrationForm
</script>
@endsection
