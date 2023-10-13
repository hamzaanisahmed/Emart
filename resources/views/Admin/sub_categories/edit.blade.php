
{{-- Edit $ Update Category Modal --}}

@include('Admin.message')

<div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit & Update SubCategory</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="subcategoryForm">
            <input type="hidden" id="subcategoryId" name="subcategoryId"/>

            <label for="category" class="col-form-label">Category:</label>
            <select name="category" id="category" class="form-control">
            </select>
            <br>
            <div class="row">
                <div class="col">
                    <label for="name" class="col-form-label">Name:</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Name" value="">
                    <p class="p"></p>
                </div>
                <div class="col">
                    <label for="slug" class="col-form-label">Slug:</label>
                    <input id="slug" type="text" name="slug" class="form-control" placeholder="Slug" value="" readonly>
                    <p class="p"></p>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col">
            <label for="status" class="col-form-label">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Deactivate</option>
            </select>
            </div>
            <div class="col">
            <label for="homepage" class="col-form-label">Homepage:</label>
            <select name="homepage" id="homepage" class="form-control">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select>
        </div>
        </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="deleteCategoryBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="updateSubCategoryBtn" class="btn btn-primary" >Updated Changes</button>
        </div>
    </div>
</div>
</div>

{{-- End --}}

{{-- Custom JQuery Ajax --}}

@section('customJs')
<script>

$(document).ready(function() {

    // Start Edit Process.

    $(document).on('click', '.edit-btn', function() {

        let subcategoryId = $(this).val();
        $("#editModal").modal('show');

        $("button[type=submit]").prop('disabled', true);

        $.ajax({

            url: "{{ route('sub-category.edit', '' )}}/" + subcategoryId,
            type: 'get',
            success: function (response) {

               $("button[type=submit]").prop('disabled', false);

                $("#category").empty();
                $("#name").val(response.subcategory.name);
                $("#slug").val(response.subcategory.slug);
                $("#status").val(response.subcategory.status);
                $("#homepage").val(response.subcategory.homepage);

                // Fill category select field
                $.each(response.category, function(index, category) {

                    $("#category").append('<option value="' + category.id + '">' + category.name + '</option>');
                });

                $("#category").val(response.subcategory.category_id);
                $("#subcategoryId").val(subcategoryId);

        }

        }); // Ajax.

    }); // Document.

    // End.



    // Updated Process.

    $("#updateSubCategoryBtn").on('click', function() {

        $(this).prop('disabled', true);

        let formData = $("#subcategoryForm").serialize();
        let subcategoryId = $("#subcategoryId").val();

        $.ajax({

            url: "{{ route('sub-category.update', '') }}/" + subcategoryId,
            type: 'PUT',
            data: formData,
            dataType: 'json',
            success: function (response) {

                $('#updateSubCategoryBtn').prop('disabled', false); // Enable the button.

                if (response['status'] == true) {

                    $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $("#slug").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                    location.reload();
                    $("#editModal").modal('hide');

                } else {

                    let errors = response['errors'];
                    if (errors['name']) {

                        $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name']);

                    } else {

                        $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                    }

                    if (errors['slug']) {

                        $("#slug").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['slug']);

                    } else {

                        $("#slug").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                    }

                    alert('Something Went Wrong');

                } // Main else.

            }, // success.
            error: function(jqXHR, textStatus, errorThrown) {

                alert('Something Went Wrong');
                location.reload();
            }

        }); // Ajax

    }); // SubcategoryForm.

    // End.



    // Generate Slug.

    $("#name").change(function() {

        element = $(this);

        $("button[type=submit]").prop('disabled', true);

        $.ajax({

            url: "{{ route('getSlug') }}",
            type: 'get',
            data: { title: element.val() },
            dataType: 'json',
            success: function (response) {

            $("button[type=submit]").prop('disabled', false);

                if (response["status"] == true) {

                    $("#slug").val(response['slug']);
                }

             } // Success

        }); // Ajax.

    }); // Name.

    // End.



    // Delete Process.

    $(document).on('click', '.delete-btn', function() {

        let url = "{{ route('sub-category.delete', 'ID') }}";

        let categoryId = $(this).val();
        let newUrl = url.replace('ID', categoryId);

        if (confirm("Are You Sure To Delete This SubCategory")) {

            $.ajax({

                url: newUrl,
                type: 'delete',
                data: {},
                dataType: 'json',
                success: function(response) {

                    if(response["status"]) {

                        location.reload();
                    }

                    } // Success.

            }); // Ajax.

        } // Confirm.

    }); // Document


    // End.


    // Search Bar.

    $("#searchInput").on("keyup",function() {

        let search = $(this).val().toLowerCase();

        $("#customTable tr").filter(function() {

            $(this).toggle($(this).text().toLowerCase().indexOf(search) >-1 );

        });

            // alert(search);

        });

        // End.



}); // End Document Ready.


</script>
@endsection

