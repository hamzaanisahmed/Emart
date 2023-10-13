@extends('Admin.layouts.main')
@section('main-container')

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div id="preloader" class="d-none">
            <div class="preloader-inner">
                <div class="spinner"></div>
                Loading...
            </div>
        </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Admin</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Module</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-success checking" id="newProductButton"><i class="fa fa-plus"></i> Add products</button>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Manage Products</h5>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search Here">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
                                        <th>Product</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Vendor</th>
                                        <th>Sku</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="productsTable">
                                    @if ($products->isNotEmpty())
                                    @foreach ($products as $product)

                                    @php
                                    $productImage = $product->product_images->first();
                                    @endphp

                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if (!empty($productImage->image))
                                            <img src="{{ url('uploads/products/small/'.$productImage->image) }}" class="img-thumbnail" width="270">
                                            @else
                                            <img src="{{ url('uploads/products/small/constant/default-150x150.png') }}" class="img-thumbnail" width="270">
                                            @endif

                                        </td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>
                                            @if ($product->category_id)
                                            {{ $product->category->name }}
                                            @else
                                            Not Found
                                            @endif

                                        </td>
                                        <td>
                                            @if ($product->brand_id)
                                            {{ $product->brand->name }}
                                            @else
                                            Not Yet
                                            @endif
                                        </td>
                                        <td>#{{ $product->sku }}</td>
                                        <td>Rs.{{ $product->price }}/=</td>
                                        <td>
                                            @if ($product->qty <= 9)
                                            <span class="badge badge-pill badge-danger">{{ $product->qty }}</span>
                                            @else
                                            <span class="badge badge-pill badge-success">{{ $product->qty }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->is_featured == 'Yes')
                                            <span class="badge badge-pill badge-success">Yes</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Draft</span>
                                            @endif
                                        </td>

                                        <td>
                                            <button value="{{ $product->id }}" class="edit-btn btn btn-light">
                                                <img src="{{ url('Admin/assets/images/e2.png') }}" class="editi" alt="">
                                            </button>
                                            <button type="button" value="{{ $product->id }}" class="delete-btn btn btn-light">
                                                <img src="{{ url('Admin/assets/images/delete.png') }}" class="deletei" alt="">
                                            </button>
                                        </td>
                                    </tr>

                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="11">Records Not Found</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <br>

                        <div id="pagination-links">
                            {{ $products->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('customJs')
<script>

    $(document).ready(function() {

        $(document).on('click', '#newProductButton', function() {

            $("#preloader").removeClass('d-none');

            let newUrl = '/products/create';

            window.history.pushState('', '', newUrl);

            $.ajax({

                url: newUrl,
                type: 'GET',
                success:function (data) {

                    $('body').html(data);

                    $("#preloader").addClass('d-none');


                }
            }); // ajax.

        }); // #newProductButton.


        // Edit Process.
        $(document).on('click', '.edit-btn', function () {

            $('#preloader').removeClass('d-none');

            let editId = $(this).val();
            let newUrl = "{{ route('product.edit', '') }}/" + editId;

            window.history.pushState('', '', newUrl);

            $.ajax({
                type: "GET",
                url: newUrl,
                success: function (data) {

                    $('body').html(data);
                    $("#preloader").addClass('d-none');

                } // success.

            }); // ajax.

        }); // document.
        // End.

        // Delete Process with Sweet Alert.
        $(document).on('click', '.delete-btn', function(event) {
            event.preventDefault();

            let deleteButton = $(this);
            let productId = deleteButton.val();

            swal({
                title: "Are you sure?",
                text: "Do you want to delete this product?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        url: "{{ route('product.delete', '') }}/" + productId,
                        type: "DELETE",
                        success: function(response) {

                            if (response.status == true) {
                                // Remove the product row from the table
                                deleteButton.closest('tr').remove();

                                swal("Deleted!", "Product has been deleted successfully.", "success");
                            } else {

                                swal("Error!", "Something went wrong.", "error");
                            }
                        }
                    });
                }
            });
        });
        // End.


        // Search Bar.
        $("#searchInput").on("keyup",function() {

            let search = $(this).val().toLowerCase();

            $("#productsTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search) >-1 );

            });

        });
        // End - Search Bar

    }); // document.ready

    </script>
@endsection





