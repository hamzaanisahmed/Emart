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
                            <a href="{{ route('category.create') }}" class="btn btn-success checking"><i class="fa fa-plus"></i> Add Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Manage Categories</h5>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" id="searchInput" class="form-control" placeholder="Search Here">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            {{-- <th></th> --}}
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
                                            {{-- <td>
                                                @if (!empty($category->image))
                                                <img src="{{ url('uploads/categories/thumbnail/'.$category->image) }}" class="img-thumbnail BRR" width="60">
                                                @else
                                                <img src="{{ url('uploads/products/small/constant/default-150x150.png') }}" class="img-thumbnail BRR" width="60">
                                                @endif
                                            </td> --}}
                                            <td>
                                                @if (!empty($category->image))
                                                <img src="{{ url('uploads/categories/thumbnail/'.$category->image) }}" class="img-thumbnail BRR" width="60">
                                                @else
                                                <img src="{{ url('uploads/products/small/constant/default-150x150.png') }}" class="img-thumbnail BRR" width="60">
                                                @endif
                                                &nbsp;
                                                {{ $category->name }}
                                            </td>
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
                                            <td colspan="7">Records Not Found</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div id="pagination-links">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    {{-- </div> --}}

    {{-- Edit Category Modal --}}
    @include('Admin.categories.edit')
    {{-- End --}}

@endsection



