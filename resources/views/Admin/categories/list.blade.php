@extends('Admin.layouts.main')
@section('main-container')
    <!-- wrapper  -->
    <!-- ============================================================== -->
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
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Categories</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('category.create') }}" class="btn btn-success checking"> Add Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    {{-- Session Message File --}}
                    @include('Admin.message')
                    {{-- // --}}
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
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Homepage</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody id="categoryTable">
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    @if ($category->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">Deactivate</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($category->homepage == 'No')
                                                    <span class="badge badge-pill badge-danger">{{ $category->homepage }}</span>
                                                    @else
                                                    <span class="badge badge-pill badge-success">{{ $category->homepage }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" value="{{ $category->id }}" class="edit-btn">
                                                        <img src="{{ url('Admin/assets/images/e2.png') }}" class="editi" alt="">
                                                    </button>
                                                    <button type="button" value="{{ $category->id }}" class="delete-btn">
                                                        <img src="{{ url('Admin/assets/images/delete.png') }}"
                                                            class="deletei" alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">Records Not Found</td>
                                        </tr>
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Homepage</th>
                                        <th>Active</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="from-control" id="paginate"> {{ $categories->links() }} </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>

    {{-- Edit Category Modal --}}
    @include('Admin.categories.edit')
    {{-- End --}}

@endsection



