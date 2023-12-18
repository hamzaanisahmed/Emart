@extends('Admin.layouts.main')
@section('main-container')

<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Admin</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Discount</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Module</li>
                        </ol>
                    </nav>
                </div>
                <div class="float-right">
                    <a href="{{ route('userCreate') }}" class="btn btn-success checking text-white"><i class="fa fa-plus"></i> Add Users</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Manage Users</h5>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search Here">
                        </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="UserSearchTr">
                            @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('userEdit', $user->id) }}" class="edit-btn">
                                        <img src="{{ url('Admin/assets/images/e2.png') }}" class="editi">
                                    </a>
                                    <button type="button" value="{{ $user->id }}" class="delete-btn">
                                        <img src="{{ url('Admin/assets/images/delete.png') }}"
                                            class="deletei">
                                    </a>
                                </td>                            
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7">Empty! Add Some Records.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <br>
                <div id="pagination-links"> {{ $users->links() }} </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('customJs')
<script>
    $(document).ready(function() {

        $(document).on('click', '.delete-btn', function(event) {
            event.preventDefault();

            let deleteButton = $(this);
            let userId = deleteButton.val();

            swal({
                title: "Are you sure?",
                text: "You want to delete this user?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        url: "{{ route('userDelete', '') }}/" + userId,
                        type: "DELETE",
                        success: function(response) {
                            if (response.status == true) {
                                deleteButton.closest('tr').remove();
                                swal("", "User has been deleted successfully.", "success");

                            } else {
                                swal("Error!", "Something went wrong.", "error");
                            }

                        } // Success.

                    }); // Ajax.

                } // if willDelete

            }); // .then

        }); // .delete-btn

        // End.

        // Search Bar.
        $("#searchInput").on("keyup",function() {
            let search = $(this).val().toLowerCase();

            $("#UserSearchTr tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search) >-1 );
            });

        });
        // End - Search Bar

    }); //Document Ready.
</script>
@endsection





