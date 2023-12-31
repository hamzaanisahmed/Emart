create<!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="{{ route('dashboard') }}">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ route('dashboard') }}" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.list') }}"><i class="fa fa-fw fa-rocket"></i>Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sub-category.list') }}"><i class="fas fa-fw fa-chart-pie"></i>Sub Category</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('brands.index') }}" ><i class="fab fa-fw fa-wpforms"></i>Brands</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.list') }}"><i class="fas fa-fw fa-table"></i>Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shipping.index') }}"><i class="fas fa-fw fa-inbox"></i>Shipping <span class="badge badge-secondary">New</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('adminOrders') }}"><i class="fas fa-fw fa-columns"></i>Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('discountCoupons') }}"><i class="fas fa-f fa-folder"></i>Discount</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users') }}"><i class="fas fa-f fa-user"></i>Users</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
<?php ?>
