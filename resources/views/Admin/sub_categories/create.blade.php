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
                        <button class="btn btn-primary sabcategorybutton" onclick="window.location.href='{{ route('sub-category.list') }}'" >Back</button>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            @include('Admin.message')

            {{-- // Sub Category --}}
            <div class="card">
                <h5 class="card-header">SubCategories Form</h5>
                <div class="card-body">
                    <form method="post" id="subCategoryForm" name="subCategoryForm">
                        <div class="form-group row">
                            <label for="category" class="col-3 col-lg-2 col-form-label text-right">Category</label>
                            <div class="col-9 col-lg-10">
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select Category Here</option>
                                    @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <p class="p"></p>
                            </div>
                        </div>
                        <br>
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
                                <input id="slug" type="text" name="slug" placeholder="Slug"
                                    class="form-control">
                                <p class="p"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-3 col-lg-2 col-form-label text-right">Status</label>
                            <div class="col-9 col-lg-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Deactivate</option>
                                </select>
                                <p class="p"> </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="homepage" class="col-3 col-lg-2 col-form-label text-right">Homepage</label>
                            <div class="col-9 col-lg-10">
                                <select name="homepage" id="homepage" class="form-control">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pt-2 pt-sm-5 mt-1">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
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


        </div>
    </div>
@endsection


{{--  // Custom Jquery and Ajax --}}

@section('customJs')

<script>

    $("#subCategoryForm").submit(function(event) {

        event.preventDefault();
        let element = $("#subCategoryForm");

        $("button[type=submit]").prop('disabled', true);

        $.ajax({

            url: "{{ route('sub-category.store') }}",
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success: function(response) {

                $("button[type=submit]").prop('disabled', false);

                if (response["status"] == true) {

                    window.location.href="{{ route('sub-category.list') }}";

                    // Removing Error.
                    $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $("#slug").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $("#category").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                } else {

                    let errors = response['errors'];
                    if (errors['name']) {

                        $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name']);

                    } else {

                        $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }

                    if(errors['slug']) {

                        $("#slug").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['slug']);

                    } else {

                        $("#slug").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                    }

                    if(errors['category']) {

                        $("#category").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['category']);

                    } else {

                        $("#category").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }

                } // Response Else.

            } // Success.

        }); // Ajax.

    }); // SubCategory.

    // End.


    // Slug Start Now.

    $("#name").change(function () {

        element = $(this);
        $("button[type=submit]").prop('disabled', true);

        $.ajax({

            url: "{{ route('getSlug') }}",
            type: 'get',
            data:
            {
                title: element.val()
            },
            dataType: 'json',
            success: function(response) {

                $("button[type=submit]").prop('disabled', false);

                if (response["status"] == true) {

                    $("#slug").val(response["slug"]);

                }
            }
        }); // Ajax

    }); // Name.

    // End Now.



    </script>

@endsection

