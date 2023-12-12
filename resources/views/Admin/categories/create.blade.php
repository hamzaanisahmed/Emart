@extends('Admin.layouts.main')
@section('main-container')
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">

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
                           <button class="btn btn-primary categorybutton" onclick="window.location.href='{{ route('category.list') }}'" >Back</button>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->

                {{-- // ====== Category list form --}}


                {{-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12"> --}}
                <div class="card">
                    <h5 class="card-header">Categories Form</h5>
                    <div class="card-body">
                        <form method="post" action="" id="categoryForm" name="categoryForm">
                            <div class="form-group row">
                                <label for="name" class="col-3 col-lg-2 col-form-label text-right">Name</label>
                                <div class="col-9 col-lg-10">
                                    <input id="name" type="text" name="name" placeholder="Name" class="form-control">
                                    <p class="p"></p>
                                </div>
                            </div>
                            <div class="form-group has-feedback row">
                                <label for="slug" class="col-3 col-lg-2 col-form-label text-right">Slug</label>
                                <div class="col-9 col-lg-10">
                                    <input id="slug" type="text" name="slug" placeholder="Slug" readonly
                                        class="form-control">
                                    <p class="p"></p>
                                </div>
                            </div>
                            <div class="form-group has-feedback row">
                                <label for="Image" id="imglabel" class="col-3 col-lg-2 col-form-label text-right">Image</label>
                                <div class="col-9 col-lg-10">
                                    <input type="hidden" name="image_id" id="image_id" value="">
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            Drop File And Click To Upload
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-3 col-lg-2 col-form-label text-right">Status</label>
                                <div class="col-9 col-lg-10">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Deactivate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-3 col-lg-2 col-form-label text-right">Homepage</label>
                                <div class="col-9 col-lg-10">
                                    <select name="homepage" id="homepage" class="form-control">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row pt-2 pt-sm-5 mt-1">
                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                    {{-- <label class="be-checkbox custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                    </label> --}}
                                </div>
                                <div class="col-sm-6 pl-0">
                                    <p class="text-right">
                                        <button type="reset" class="btn btn-space btn-secondary">Cancel</button>
                                        <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- </div> --}}


                {{-- // ====================== END --}}


            </div>
        </div>
    @endsection

    {{--  // Custom Jquery and Ajax --}}

    @section('customJs')
        <script>

            $("#categoryForm").submit(function(event) {

                event.preventDefault();
                let element = $(this);

                $("button[type=submit]").prop('disabled', true);

                $.ajax({
                    url: "{{ route('category.store') }}",
                    type: "POST",
                    data: element.serializeArray(),
                    dataType: 'json',
                    success: function(response) {

                        $("button[type=submit]").prop('disabled', false);

                        if (response["status"] == true) {

                            window.location.href = "{{ route('category.list') }}"

                            // Clearing validation errors
                            $("#name").removeClass('is-invalid')
                                .siblings('p').removeClass('invalid-feedback').html("");

                            $("#slug").removeClass('is-invalid')
                                .siblings('p').removeClass('invalid-feedback').html("");

                        } else {

                            let errors = response['errors'];
                            if (errors['name']) {

                                $("#name").addClass('is-invalid')
                                    .siblings('p').addClass('invalid-feedback').html(errors['name']);

                            } else {

                                // Clearing validation errors
                                $("#name").removeClass('is-invalid')
                                    .siblings('p').removeClass('invalid-feedback').html("");

                            }

                            if (errors['slug']) {

                                // Adding 'is-invalid' class to 'slug' input to show validation error
                                $("#slug").addClass('is-invalid')
                                    .siblings('p').addClass('invalid-feedback').html(errors['slug']);

                            } else {

                                $("#slug").removeClass('is-invalid')
                                    .siblings('p').removeClass('invalid-feedback').html("");
                            }

                        }

                    },
                    error: function(jqXHR, exception) {
                        console.log("Somethings went wrong");
                    }

                })
            });

        // --------- Slug --------

            // To achieve automatic filling of the slug field when you enter the category name
            // When the "name" input field changes, this function will be triggered.
            $("#name").change(function() {
                // Store the input element with id "name" in the variable 'element'.
                element = $(this);

                //Disabled submit button when ajax run aur form submit.
                $("button[type=submit]").prop('disabled', true);

                $.ajax({
                    // Initiate an AJAX request to the server.
                    url: '{{ route('getSlug') }}',
                    type: 'get',

                    data: {
                        // Send the value of the "name" input field as "title".
                        title: element.val()
                    },
                    dataType: 'json',

                    // When Ajax request is successful then call success function
                    success: function(response) {
                        //Enabled when form submit succesfuly
                        $("button[type=submit]").prop('disabled', false);

                        // If response status is true (indicating success):
                        if (response["status"] == true) {

                            // Set the value of the input field with id "slug" to the value of the "slug" field in the response.
                            $("#slug").val(response["slug"]);

                        }
                    }
                });
            });

    // ------ Image ------

    Dropzone.autoDiscover = false;
    const dropzone = $("#image").dropzone ({

        init: function() {
            this.on('addedfile', function(file)
            {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }

            });
        },

        url: "{{ route('temp-images.create') }}",
        maxFiles: 1,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, success: function(file, response) {
            $("#image_id").val(response.image_id);
        }

    });

        </script>
    @endsection
