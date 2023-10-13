@extends('Admin.layouts.main')
@section('main-container')
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            {{-- Preloader --}}
            <div id="preloader" class="d-none">
                <div class="preloader-inner">
                    <div class="spinner"></div>
                    Loading...
                </div>
            </div>

            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Admin </h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit
                            amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Module</li>
                                </ol>
                            </nav>
                        </div>
                        <button class="btn btn-primary productsbtn" id="backButton">Back</button>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <form id="createProductForm" name="createProductForm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                                            <p class="p"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="slug">Slug</label>
                                            <input type="text" readonly name="slug" id="slug" class="form-control" placeholder="Slug">
                                            <p class="p"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="short_description">Short Description</label>
                                            <textarea name="short_description" id="short_description" cols="30" rows="10" class="summernote"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>
                                <div id="okayy">
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                            <p class="p"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">SKU (Stock Keeping Unit)</label>
                                            <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">
                                            <p class="p"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="hidden" name="track_qty" value="No">
                                                <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" value="Yes" checked>
                                                <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                                <p class="p"></p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">
                                            <p class="p"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-4">Product status</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="h4 mb-4">Product category</h2>
                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select a Category</option>

                                        @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        @endif

                                    </select>
                                    <p class="p"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Select a Subcategory</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-4">Product brand</h2>
                                <div class="mb-3">
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">Select a Brand</option>

                                        @if ($brands->isNotEmpty())
                                        @foreach ($brands as $brand )
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-4">Featured product</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="is_featured" class="form-control">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                    <p class="p"></p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-4">Related products</h2>
                                <div class="mb-3">
                                    <select multiple class="related-product w-100" name="related_products[]" id="related_products"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-4">
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                    &nbsp;
                    <button class="btn btn-primary createProductBtn">Submit</button>
                </div>
            </div>
            </form>


        </div>
    </div>
@endsection



{{-- Custom --}}


@section('customJs')

<script>

    $(document).ready(function () {

        $("#category").change(function() {

            let category_id = $(this).val();

            $.ajax({

                url: "{{ route('product.subcategories.index') }}",
                type: "GET",
                data: {category_id:category_id},
                dataType: "json",
                success: function (response) {

                    $("#sub_category").find("option").not(":first").remove();

                    $.each(response['subcategories'], function (key,item) {
                        $("#sub_category").append(`<option value= '${ item.id }'>${ item.name }</option`)

                    });
                }

            }); // ajax.

        }); // category.


        // Product Store.

        $(document).on('click', '.createProductBtn', function(event) {
            event.preventDefault();

            let formData = $("#createProductForm").serializeArray();

            $.ajax({

                url: "{{ route('product.store') }}",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function (response) {

                    if (response['status'] == true) {

                        // Reset the Form Fields
                        $("#createProductForm")[0].reset();

                        // Reset Validations.
                        $(".p").removeClass('invalid-feedback').html('');
                        $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                        // Success alert.
                        swal("Good job!", "Product Added Successfully!", "success");

                        // Reset Summernote field
                        $('.summernote').summernote('reset');

                        // Reset Dropzone.
                        Dropzone.forElement("#image").removeAllFiles(true);

                        // Redirect To List Page.
                        // $('#preloader').removeClass('d-none'); // Show preloader.
                        var newUrl = "{{ route('product.list') }}";
                        window.history.pushState('', '', newUrl);

                        $.ajax({

                            url: newUrl,
                            success: function (data) {

                                $('body').html(data);
                                // $('#preloader').addClass('d-none'); // hide preloader.

                            }

                        });

                    } else {
                        let errors = response['errors'];

                        $(".p").removeClass('invalid-feedback').html('');
                        $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                        $.each(errors, function (key, value) {

                            $(`#${key}`).addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(value);

                        });
                    }

                } // success.

            }); // ajax.

        }); // createProductBtn.

        // End Product Store.



        // Slug.

        $("#title").change(function() {

            element = $(this);

            $(".createProductBtn").prop('disabled', true);

            $.ajax({

                url: "{{ route('getSlug') }}",
                type: 'get',
                data: {
                title: element.val()
                },
                dataType: 'json',
                success: function(response) {

                    $(".createProductBtn").prop('disabled', false);

                    if(response['status'] == true) {

                        $("#slug").val(response["slug"]);

                    } // End Response.

                } // End Ajax Succes function.

            }); // End Slug Ajax.

        });

        // End.


        // Dropzone.

        Dropzone.autoDiscover = false;
        const dropzone = new Dropzone("#image", {

            url: "{{ route('temp-images.create') }}",
            maxFiles: 5,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
             success: function(file, response) {

                let productImage = `<input type="hidden" name="image_array[]" value="${response.image_id}">`

                $("#okayy").append(productImage);


             } // End Ajax Success Function.

        }); // End Const.

        // End.



        // Start.

        // load Html Content with url.
        function loadContent(url) {

            $('#preloader').removeClass('d-none');

            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {

                    $('body').html(data);
                    $('#preloader').addClass('d-none');
                }
            });
        }

        // For browser forward backward buttons.
        $(window).on('popstate', function () {

            var newUrl = window.location.href;
            loadContent(newUrl);
        });

        // backButton click event.
        $(document).on('click', '#backButton', function() {

            $('#preloader').removeClass('d-none'); // Show preloader.

            var newUrl = '/products/'; // Get the new URL.

            window.history.pushState('', '', newUrl); // Change the URL without refreshing the page.
            loadContent(newUrl);

            // $.ajax({
            //     url: newUrl,
            //     type: 'GET',
            //     success: function(data) {

            //         $('body').html(data); // Update the content of the page with retrieved data.

            //         $('#preloader').addClass('d-none'); // Hide preloader.
            //     }

            // }); // ajax.

        }); // backButton.

        // End.


        // Select 2.
        $('.related-product').select2({

            ajax: {
                url: '{{ route('getproducts') }}',
                dataType: 'json',
                tags: true,
                multiple: true,
                minimumInputLength: 3,
                processResults: function (data) {
                    return {
                        results: data.tags
                    };
                }
            }
        });

        // End.



    }); // Document.ready



</script>

@endsection


