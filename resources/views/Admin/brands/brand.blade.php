@extends('Admin.layouts.main')
@section('main-container')

{{-- Session Message --}}
@include('Admin.message')


{{-- Add Brands Modal --}}

<div class="modal fade" id="addBrandsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Brands Here</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group mb-3">
                 <label for="name">Name</label>
                <input type="text" class="name form-control" placeholder="Name">
                <p class="p"></p>
            </div>
            <div class="form-group mb-3">
                <label for="slug">Slug</label>
                <input type="text" class="slug form-control" placeholder="Slug" readonly>
                <p class="p"></p>
            </div>
            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select class="status form-control">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary add_brands">Save</button>
        </div>
      </div>
    </div>
</div>

{{-- End- Add Brands Modal --}}


  {{-- Edit & Update Brands Modal --}}

  <div class="modal fade" id="editBrandsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit & Updates Brands Here</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="editFormId" id="editFormId">
            <div class="form-group mb-3">
                 <label for="name">Name</label>
                <input type="text" id="name" class="name form-control" placeholder="Name">
                <p class="p"></p>
            </div>
            <div class="form-group mb-3">
                <label for="slug">Slug</label>
                <input type="text" id="slug" class="slug form-control" placeholder="Slug" readonly>
                <p class="p"></p>
            </div>
            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select id="status" class="status form-control">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updateBrands">Update Changes</button>
        </div>
      </div>
    </div>
  </div>

  {{-- End - Edit & Update Brands Modal --}}


  {{-- Delete Modal --}}

  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Brands </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="deleteId">
            <h3>Are you sure ? You want to delete this ?</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary delete_brands">Yes Delete</button>
        </div>
      </div>
    </div>
  </div>

  {{-- End - Delete Modal --}}


<!-- wrapper  -->
<div class="dashboard-wrapper">
<div class="container-fluid  dashboard-content">
  <!-- ============================================================== -->
  <!-- pageheader -->
  <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Admin</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
                    vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Brands</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Module</li>
                        </ol>
                    </nav>
                </div>
                <div class="add-brands">
                    <a href="#" data-toggle="modal" data-target="#addBrandsModal" class="btn btn-success">Add Brands </a>
                </div>
            </div>
        </div>
    </div>
  <!-- ============================================================== -->
  <!-- end pageheader -->
  <!-- ============================================================== -->

  {{-- Brands List --}}
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Manage Brands</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" id="searchInput" class="form-control okay" placeholder="Search Here">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                </tr>
                            </thead>

                            <tbody id="brandsTable">

                                {{-- <tr>
                                    <td colspan="5">Records Not Found</td>
                                </tr> --}}

                            </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Active</th>
                                    </tr>
                                </tfoot>

                        </table>

                    </div> {{-- table-responsive --}}

                </div> {{-- card-body --}}

                  {{-- <div class="from-control" id="paginate">{{ $subcategories->links() }} </div> --}}

            </div> {{-- card --}}

        </div> {{-- col-xl-12 col-lg-12 --}}

    </div> {{-- row --}}

    {{-- End --}}

</div> {{-- dashboard-content --}}


@endsection


@section('customJs')

<script>

    $(document).ready(function () {

        function resetAddBrandsModal() {
            $('.name').val('');
            $('.slug').val('');
            $(".status").val('1');
        }

        $('#addBrandsModal').on('hidden.bs.modal', function () {
            resetAddBrandsModal();
        });

        // List.
        fetchBrands();

        function fetchBrands() {

        $.ajax({

            url: "{{ route('fetch.brands') }}",
            type: "GET",
            dataType: "json",
            success: function (response) {

                $("tbody").html("");
                $.each(response.brands, function (key, brand) {

                    let statusText = (brand.status === 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactive</span>';

                    $("tbody").append(
                        '<tr>\
                            <td>'+brand.id+'</td>\
                            <td>'+brand.name+'</td>\
                            <td>'+brand.slug+'</td>\
                            <td>'+statusText+'</td>\
                            <td> <button type="button" value="'+brand.id+'" class="edit-btn">\
                                <img src="{{ url('Admin/assets/images/e2.png') }}" class="editi" alt="">\
                            </button>\
                            <button type="button" value="'+brand.id+'" class="delete-btn">\
                                <img src="{{ url('Admin/assets/images/delete.png') }}" class="deletei" alt="">\
                            </button>\
                            </td>\
                        </tr>'
                    )
                });


            } // success

        }); // Ajax

       } // fetchBrands.
       //End.


       // Delete brands.

       $(document).on('click', '.delete-btn', function (event) {

        event.preventDefault();

        let brandId = $(this).val();
        $("#deleteId").val(brandId);

        $("#deleteModal").modal('show');

       });

       $(document).on('click', '.delete_brands', function(event) {
        event.preventDefault();

        $(this).text("Deleting");
        let deleteId = $("#deleteId").val();

        $.ajax({

            url: "{{ route('brands.delete', '') }}/" + deleteId,
            type: "DELETE",
            success: function (response) {

                $("#deleteModal").modal('hide');
                $(".delete_brands").text("Yes Delete");
                swal("Good job!", "Brand Has Been Delete Successfully!", "success");
                fetchBrands();

            }

        }); // ajax.

       }); // delete_brands.

       // End - Delete brands.


       // Edit Brands

       $(document).on('click', '.edit-btn', function(event) {
        event.preventDefault();

        let brandId = $(this).val();

        $("#editBrandsModal").modal('show');

        $.ajax({
            type: "GET",
            url: "{{ route('brands.edit', '') }}/" + brandId,
            success: function (response) {

                if(response.status == true) {

                    $("#name").val(response.brands.name);
                    $("#slug").val(response.brands.slug);
                    $("#status").val(response.brands.status);
                    $("#editFormId").val(brandId);

                } else {

                    alert("Oops... Something went wrong!");
                    location.reload();

                }


            } // sucess

        }); // edit ajax.

       }); // Edit Document.

       // End - Edit Brands


       // Update Brands

       $(document).on('click', '.updateBrands', function (event) {

        event.preventDefault();
        let brandId = $("#editFormId").val();
        let data = {
            'name' : $("#name").val(),
            'slug' : $("#slug").val(),
            'status' : $("#status").val(),
        }

        $.ajax({

            type: "PUT",
            url: "{{ route('brands.update', '') }}/" + brandId,
            data: data,
            dataType: "json",
            success: function (response) {

                if(response.status == false) {

                    let errors = response['errors'];

                    $.each(errors, function(field, error) {

                        let inputField = $("." + field);
                        inputField.addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error);
                    });

                } else {

                    $.each(['name', 'slug'], function(error, field) {

                        let inputField = $("." + field);
                        inputField.removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    });

                    swal("Good job!", "Brands Has Been Updated Successfully!", "success");
                    $("#editBrandsModal").modal('hide');

                    fetchBrands(); // recall list function
                    resetAddBrandsModal();


                }

            } // success.

        }); // ajax.


       }); // document Update.

       // End - Update Brands



       // Add Brands
        $(document).on('click', '.add_brands', function(event) {
            event.preventDefault();

            let data = {
                'name' : $('.name').val(),
                'slug' : $('.slug').val(),
                'status' : $('.status option:selected').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: "/brands",
                type: "POST",
                data: data,
                dataType: "json",
                success : function (response) {

                    if (response.status == false) {

                        let errors = response['errors'];

                        $.each(errors, function(field, error) {

                            let inputField = $("." + field);
                            inputField.addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error);
                        });

                    } else {

                        $.each(['name', 'slug'], function(index, field) {

                            let inputField = $("." + field);
                            inputField.removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        });

                        swal("Good job!", "Brands Has Been Added Successfully!", "success");
                        $("#addBrandsModal").modal('hide');

                        fetchBrands();
                        resetAddBrandsModal();

                    }


                } // success

            }); // Ajax

        }); // Add_brands btn

        // End - Add Brands


      // Slug.
        $(document).on('change', '.name', function () {

            element = $(this);

            $.ajax({

                url: "{{ route('getSlug') }}",
                type: 'get',
                data: { title: element.val() },
                dataType: 'json',
                success: function (response) {

                    if (response["status"] == true) {

                        $(".slug").val(response['slug']);
                    }

                } // Success

            }); // Ajax.

        }); // Name.
        // End - Slug


        // Search Bar.

        $("#searchInput").on("keyup",function() {

            let search = $(this).val().toLowerCase();

            $("#brandsTable tr").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(search) >-1 );

            });

        });

        // End - Search Bar

    }); // Document.Ready




    </script>
@endsection
