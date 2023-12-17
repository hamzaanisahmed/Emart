@extends('Admin.layouts.main')
@section('main-container')

{{-- Add-Shipping Modal --}}
<div class="modal fade" id="addShipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Shipping Here</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="country">Country</label>
                <select class="country form-control" name="country">
                    <option value="">Choose Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                <p class="p"></p>
            </div>
            <div class="form-group mb-3">
                <label for="amount">Amount</label>
                <input type="text" class="amount form-control" placeholder="Amount">
                <p class="p"></p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary addShippingBtn">Submit</button>
        </div>
      </div>
    </div>
</div>
{{-- End- Add-Shippping Modal --}}


{{-- Edit & Updated -Shipping Modal --}}
<div class="modal fade" id="updateShipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Shipping Here</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="editFormId" id="editFormId">
            <div class="form-group mb-3">
                <label for="country">Country</label>
                <select class="country form-control" name="country" id="country">
                    <option value="">Choose Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                <p class="p"></p>
            </div>
            <div class="form-group mb-3">
                <label for="amount">Amount</label>
                <input type="text" class="amount form-control" name="amount" id="amount" placeholder="Amount">
                <p class="p"></p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updateShippingBtn">Update</button>
        </div>
      </div>
    </div>
</div>
{{-- End- Edit & Updated -Shippping Modal --}}


  {{-- Delete Modal --}}
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Shipping Charges </h5>
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
          <button type="button" class="btn btn-primary deleteShippingBtn">Yes Delete</button>
        </div>
      </div>
    </div>
  </div>
  {{-- End - Delete Modal --}}

    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">

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
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Categories</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="float-right">
                            <a href="#" data-toggle="modal" data-target="#addShipping" class="btn btn-success checking"><i class="fa fa-plus"></i> Shipping </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Product Categories</h5>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" id="searchInput" class="form-control" placeholder="Search Here">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Country</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="shippingTable">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Country</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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

        function resetShipping() {
            $('.country').val('');
            $('.amount').val('');
        }

        $('#addShipping').on('hidden.bs.modal', function () {
            resetShipping();
        });

        fetchShipping();

        function fetchShipping() {

            $.ajax({

                url: "{{ route('shipping.list') }}",
                type: "GET",
                dataType: "json",
                success: function (response) {

                    if (response.shipping.length > 0) {
                    $("tbody").html("");
                    $.each(response.shipping, function (key, shipping) {

                        let selectedCountryName = "";

                        $.each(response.countries, function (index, country) {
                            if (country.id == shipping.country_id) {
                                selectedCountryName = country.name;
                                return false; // Break the loop

                            }
                        });

                        $("tbody").append(
                            '<tr>\
                                <td>'+shipping.id+'</td>\
                                <td>'+selectedCountryName+'</td>\
                                <td>'+shipping.amount+'</td>\
                                <td> <button type="button" value="'+shipping.id+'" class="edit-btn">\
                                    <img src="{{ url('Admin/assets/images/e2.png') }}" class="editi" alt="">\
                                </button>\
                                    <button type="button" value="'+shipping.id+'" class="delete-btn">\
                                    <img src="{{ url('Admin/assets/images/delete.png') }}" class="deletei" alt="">\
                                    </button>\
                                </td>\
                            </tr>'
                        )
                    });

                    } else {
                        $("tbody").html('<tr><td colspan="4">No shipping charges available</td></tr>');
                    }


            } // success

        }); // Ajax

        } // function.

        // End -list process.



        // Add Shipping Process.

        $(document).on('click', '.addShippingBtn', function (event) {

            event.preventDefault();

            let data = {
                'country' : $('.country option:selected').val(),
                'amount' : $('.amount').val(),
            }

            $.ajax({

                url: "{{ route('shipping.store') }}",
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

                        $.each(['country', 'amount'], function(index, field) {

                            let inputField = $("." + field);
                            inputField.removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        });

                        swal("Good job!", "Shippping Charges Added Successfully!", "success");
                        $("#addShipping").modal('hide');

                        fetchShipping();
                        resetShipping();

                    }


                } // success

            });
        });

        // End Shipping Process.



        // Edit Shipping Process.

        $(document).on('click', '.edit-btn', function(event) {

            event.preventDefault();
            let shippingId = $(this).val();

            $("#updateShipping").modal('show');

            $.ajax({

                type: "GET",
                url: "{{ route('shipping.edit', '') }}/" + shippingId,
                success: function (response) {

                    if(response.status == true) {

                        $("#country").val(response.shipping.country_id);
                        $("#amount").val(response.shipping.amount);
                        $("#editFormId").val(shippingId);

                    } else {

                        alert("Oops... Something went wrong!");
                        location.reload();

                    }

                } // sucess

            }); // edit ajax.

        }); // Edit Document.

        // End -Edit Shipping Process.



        // Update Shipping Process.

        $(document).on('click', '.updateShippingBtn', function (event) {

            event.preventDefault();
            let shippingId = $("#editFormId").val();
            let data = {
                'country' : $("#country").val(),
                'amount' : $("#amount").val(),
            }

            $.ajax({

                type: "PUT",
                url: "{{ route('shipping.update', '') }}/" + shippingId,
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

                        $.each(['country', 'amount'], function(error, field) {

                            let inputField = $("." + field);
                            inputField.removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        });

                        swal("Good job!", "Shipping Charges Has Been Updated Successfully!", "success");
                        $("#updateShipping").modal('hide');

                        fetchShipping();
                        resetShipping();

                }

            } // success.

        }); // ajax.


       }); // document Update.

       // End - Update Shipping Process



        // Delete Shipping Process.

        $(document).on('click', '.delete-btn', function (event) {

            event.preventDefault();

            let shippingId = $(this).val();
            $("#deleteId").val(shippingId);

            $("#deleteModal").modal('show');

        });

        $(document).on('click', '.deleteShippingBtn', function(event) {
            event.preventDefault();

            $(this).text("Deleting");
            let deleteId = $("#deleteId").val();

            $.ajax({

                url: "{{ route('shipping.delete', '') }}/" + deleteId,
                type: "DELETE",
                success: function (response) {

                    $("#deleteModal").modal('hide');
                    $(".deleteShippingBtn").text("Yes Delete");
                    swal("Good job!", "Brand Has Been Delete Successfully!", "success");

                    fetchShipping();
                    resetShipping();

                }

            }); // ajax.

        }); // delete_brands.

       // End - Delete Shipping Process.



        // Search Bar.

        $("#searchInput").on("keyup",function() {

            let search = $(this).val().toLowerCase();

            $("#shippingTable tr").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(search) >-1 );

            });

        });

        // End - Search Bar



    }); // ready.
</script>
@endsection
