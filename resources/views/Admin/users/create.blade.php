@extends('Admin.layouts.main')
@section('main-container')
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Form Validations </h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit
                            amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('users') }}" class="btn btn-primary productsbtn"><i class="fa fa-list"></i> Back</a>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <section class="content">
                <!-- Default box -->
                <form action="" name="AdminUserForm" id="AdminUserForm">
                <div class="container-fluid">
                    <div class="card">
                        <h5 class="card-header">Create Users</h5>
                        <div class="card-body">								
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" autocomplete="off">
                                        <span class="p"></span>	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address">
                                        <span class="p"></span>	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone_number">Phone</label>
                                        <input type="number" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number">
                                        <span class="p"></span>	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        <span class="p"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                                        <span class="p"></span>	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                                        <span class="p"></span>	
                                    </div>
                                </div>
                            </div>
                        </div>							
                    </div>
                    <div class="pb-5 pt-3">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        <button class="btn btn-primary ml-3">Create</button>
                    </div>
                </div>
                </form>
                <!-- /.card -->
            </section>
        </div>
    </div>
@endsection

@section('customJs')
<script>
    $(document).ready(function() {

        $("#AdminUserForm").submit(function(event) {
            event.preventDefault();
            let formData = $(this).serializeArray();

            $.ajax({

                url: "{{ route('userStore') }}",
                type: "post",
                data: formData,
                dataType: "json",
                success: function (response) {

                    if (response.status == true) {
                        
                        $("span").removeClass('invalid-feedback').html('');
                        $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                        swal("", "User Has Been Created Successfully!", "success")
                            .then(() => {
                                window.location.href="{{ route('users') }}";
                        });

                    } else {
                        let errors = response['errors'];
                        
                        $("span").removeClass('invalid-feedback').html('');
                        $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                        $.each(errors, function (key, value) {
                            $(`#${key}`).addClass('is-invalid').siblings('span').addClass('invalid-feedback').html(value);
                        });
                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Error");
                }
            });
    
        }); //-Submit.

    }); // Document-Ready.
</script>
@endsection

