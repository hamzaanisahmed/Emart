
@extends('Admin.layouts.main')
@section('main-container')
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
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Categories</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('sub-category.create') }}" class="btn btn-success checking"> Add subcategory</a>
                    </div>
                </div>
            </div>
        </div>
        @include('Admin.message')
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        {{-- <input type="text" id="searchInput" placeholder="Search..."> --}}
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Manage SubCategories</h5>
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
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Homepage</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody id="customTable">
                                <tr>
                                @if ($subcategories->isNotEmpty())
                                @foreach ($subcategories as $subcategory)
                                <td>{{ $subcategory->id }}</td>
                                <td>{{ $subcategory->name }}</td>
                                <td>{{ $subcategory->categoryName }}</td>
                                <td>{{ $subcategory->slug }}</td>

                                <td>
                                @if ($subcategory->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">Draft</span>
                                @endif
                                </td>

                                <td>
                                    @if ($subcategory->homepage == 'No')
                                    <span class="badge badge-pill badge-danger">{{ $subcategory->homepage }}</span>
                                    @else
                                    <span class="badge badge-pill badge-success">{{ $subcategory->homepage }}</span>
                                    @endif
                                </td>

                                <td>
                                    <button type="button" value="{{ $subcategory->id }}" class="edit-btn">
                                        <img src="{{ url('Admin/assets/images/e2.png') }}" class="editi" alt="">
                                    </button>
                                    <button type="button" value="{{ $subcategory->id }}" class="delete-btn">
                                        <img src="{{ url('Admin/assets/images/delete.png') }}" class="deletei" alt="">
                                    </button>
                                </td>
                                </tr>

                                @endforeach

                                @else

                                <tr>
                                <td colspan="5">Records Not Found</td>
                                </tr>

                                @endif


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Homepage</th>
                                        <th>Active</th>
                                    </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
                <div class="from-control" id="paginate">{{ $subcategories->links() }} </div>
            </div>
        </div>
    </div>
</div>

@include('Admin.sub_categories.edit')

@endsection

@section('customJs')

<script>

    $(document).ready(function() {

        $("#searchInput").on("keyup",function() {
            let search = $(this).val().toLowerCase();

            $("#customTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search) >-1 );
            });

            // alert(search);

        });


    }); // Ready
</script>

@endsection




