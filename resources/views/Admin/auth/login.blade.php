<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('Admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ url('Admin/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('Admin/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{ url('Admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        @include('Admin.auth.messages')
        <div class="card ">
            <div class="card-header text-center">
                <a href="{{ route('home') }}">
                    <img class="logo-img" src="{{ url('Admin/assets/images/emart.png')}}" style="width: 140px;" alt="logo">
                </a>
                <span class="splash-description">Please enter your admin information.</span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                            id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                            <p class="invalid-feedback p">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-lg @error('password') is-invalid @enderror"
                            id="password" name="password" type="password"  placeholder="Password" >
                        @error('password')
                            <p class="invalid-feedback p">{{ $message }}</i></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-dark btn-lg btn-block"><i class="fa fa-sign-in-alt"></i> Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ url('Admin/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ url('Admin/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>


</body>

</html>



