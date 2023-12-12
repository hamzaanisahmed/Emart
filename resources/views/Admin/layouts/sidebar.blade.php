<!-- ============================================================== -->
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
                                {{-- data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1" --}}
                                {{-- <div id="submenu-1" class="collapse submenu" style="">
                                </div> --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.list') }}"><i class="fa fa-fw fa-rocket"></i>Category</a>
                                {{-- <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('category.create') }}">Category <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('category.list') }}">List Category</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">Manage Sub Category</a>
                                            <div id="submenu-1-1" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Sub Category</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">List Sub Category</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div> --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sub-category.list') }}"><i class="fas fa-fw fa-chart-pie"></i>Sub Category</a>
                                {{-- <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">C3 Charts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Chartist Charts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Chart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Morris</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Sparkline</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Guage</a>
                                        </li>
                                    </ul>
                                </div> --}}
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('brands.index') }}" ><i class="fab fa-fw fa-wpforms"></i>Brands</a>
                                {{-- <div id="submenu-4" class="collapse submenu" style="">
                                </div> --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.list') }}"><i class="fas fa-fw fa-table"></i>Products</a>
                            </li>
                            {{-- <li class="nav-divider">
                                Features
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Pages </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Blank Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Blank Page Header</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">404 page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Sign up Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Forgot Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Pricing Tables</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Timeline</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Calendar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Sortable/Nestable List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Widgets</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Media Objects</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Cropper</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Color Picker</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shipping.index') }}"><i class="fas fa-fw fa-inbox"></i>Shipping <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    {{-- <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Inbox</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Email Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Email Compose</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Message Chat</a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('adminOrders') }}"><i class="fas fa-fw fa-columns"></i>Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt"></i>Maps</a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Google Maps</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Vector Maps</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>Menu Level</a>
                                <div id="submenu-10" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Level 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Level 2</a>
                                            <div id="submenu-11" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Level 1</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Level 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Level 3</a>
                                        </li>
                                    </ul>
                                </div>
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
