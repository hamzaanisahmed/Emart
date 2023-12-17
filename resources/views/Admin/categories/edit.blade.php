
{{-- Edit $ Update Category Modal --}}

        <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit & Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('Admin.message')
                <div class="modal-body">
                    <form method="POST" id="updateCategoryForm" name="updateCategoryForm">
                    <input type="hidden" id="categoryId" name="categoryId"/>
                    <div class="row">
                        {{-- // Name --}}
                        <div class="col">
                            <label for="name" class="col-form-label">Name:</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Name" value="">
                            <p class="p"></p>
                        </div>
                        {{-- // Slug --}}
                        <div class="col">
                            <label for="slug" class="col-form-label">Slug:</label>
                            <input id="slug" type="text" name="slug" class="form-control" placeholder="Slug" value="" readonly>
                            <p class="p"></p>
                        </div>
                    </div>
                    <br>

                    {{-- Image Field --}}
                    <div class="row">
                        {{-- // Update Image Here --}}
                        <div class="col">
                            <label for="Image" class="col-form-label">Image:</label>
                            <input id="image_id" type="hidden" name="image_id" class="form-control" value="">
                            <div id="image" class="dropzone dz-clickable">
                                <div class="dz-message needsclick">
                                    Drop File And Click To Upload
                                </div>
                            </div>
                        </div>

                        {{-- // Current Image Here --}}
                        <div class="col">
                            <label for="currentImage" class="col-form-label">Current Image:</label>
                            <div id="currentImage" class="current">
                            </div>
                        </div>

                    </div>
                    {{-- End --}}

                    {{-- Status --}}
                    <div class="row">
                    <div class="col">
                    <label for="status" class="col-form-label">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Deactivate</option>
                    </select>
                    </div>
                    <div class="col">
                    <label for="status" class="col-form-label">Homepage:</label>
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
                    <button type="submit" id="updateCategoryBtn" class="btn btn-primary" >Updated Changes</button>
                </div>
            </div>
        </div>
    </div>

{{-- End --}}

{{-- Custom JQuery Ajax --}}

@section('customJs')
<script>

    $(document).ready(function() {

        $(document).on('click', '.edit-btn', function() {

            let categoryId = $(this).val();
            $("#editModal").modal('show');

            $("button[type=submit]").prop('disabled', true); // Disabled button when ajax run and form submit.

            $.ajax({

                url: "{{ route('category.edit', '') }}/" + categoryId,
                type: 'get',
                success: function(response) {

                    $("button[type=submit]").prop('disabled', false); // Enabled button .

                    if(response['status'] == true) {

                    // Data Fetch Response To Input Feild Throw Ajax.
                    $("#name").val(response.category.name)
                    $("#slug").val(response.category.slug)

                    // Display The Image Dynamically.
                    if (response.category.image) {

                        const imageUrl = "{{ url('/uploads/categories/thumbnail/') }}/" + response.category.image;
                        const imageElement = '<img src="' + imageUrl + '" alt="" style="width: 170px; height: 215px">';
                        $("#currentImage").html(imageElement);

                    }

                    $("#status").val(response.category.status)
                    $("#homepage").val(response.category.homepage)
                    $("#categoryId").val(categoryId)


                } // End Response Status Condition.

                else {

                    alert('Something Went Wrong');

                } // End Response Status Else.

                }, // End Success Function.
                error: function(jqXHR, exception) {
                    console.log("something went wrong");
                }

            }); // End Ajax Request.

        }); // End Edit Button Function.

        // End Here.



        // Update Process.

        $('#updateCategoryBtn').on('click', function() {

            $(this).prop('disabled', true);

            // Serialize the form data to url encoded string.
            var formData = $('#updateCategoryForm').serialize();
            var categoryId = $('#categoryId').val();

            $.ajax({

                url: "{{ route('category.update', '') }}/" + categoryId,
                type: 'PUT',
                data: formData,
                success: function(response) {

                    $('#updateCategoryBtn').prop('disabled', false);

                    if (response.status) {

                        // Remove Validation Errors
                        $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#slug").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                        $('#editModal').modal('hide');

                        location.reload();

                    } else {

                        let errors = response['errors']
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

                        alert('Category update failed');


                    } // End Response Else.

                }, // Success Function

                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Something Went Wrong');
                    location.reload();
                }

            }); // Ajax

        }); // Update Category Button

        // End Here.



        // Start Slug Now.

        $("#name").change(function() {

            element = $(this);

            $("button[type=submit]").prop('disabled', true); // Disabled Submit Button When Ajax Hit.

            $.ajax({

                url: "{{ route('getSlug') }}",
                type: 'get',
                data: {
                    title: element.val()
                },
                dataType: 'json',
                success: function(response) {

                    $("button[type=submit]").prop('disabled', false); // Enabled Submit Button.

                    if(response['status'] == true) {

                        $("#slug").val(response["slug"]);

                    } // End Response.

                } // End Ajax Succes function.

            }); // End Slug Ajax.

        }); // Main.


        // End Slug Here.



        // Start Image With JavaScript DropZone Library.

        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({

            init: function () {

                this.on('addedfile', function(file) {

                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }

                }); // End addedfile function.

            }, // Init Function.

            url: "{{ route('temp-images.create') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
             success: function(file, response) {

                $("#image_id").val(response.image_id);

             } // End Ajax Success Function.

        }); // End Const.

        // End DropZone Image Now.


        // Category Delete Process Start Now.

        $(document).on('click', '.delete-btn', function() {

            let url = "{{ route('category.delete', 'ID') }}";
            let categoryId = $(this).val();
            let newUrl = url.replace('ID', categoryId);

            if(confirm("Are You Sure ? You Want To Delete This Category")) {

            $.ajax({

                url: newUrl ,
                type: 'delete',
                data: {},
                dataType: 'json',
                success: function(response) {

                    if(response.status){
                        location.reload();
                    }

                } // Success.

            }); // Ajax.

        } // Confirm

        }); // Document.

        // End Here.


        // Search Button.

        $("#searchInput").on("keyup",function() {

            let search = $(this).val().toLowerCase();

            $("#categoryTable tr").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(search) >-1 );

            });

        });



    }); // End Document Ready.


    </script>
@endsection

