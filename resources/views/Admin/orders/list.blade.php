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
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Module</li>
                        </ol>
                    </nav>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Manage Orders</h5>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search Here">
                        </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Orders #</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Purchase Date</th>
                            </tr>
                        </thead>
                        <tbody id="ordersTable">
                            @if ($orders->isNotEmpty())
                            @foreach ($orders as $order)   
                            <tr>
                                <td><a href="{{ route('adminOrdersId', $order->id) }}">#{{ $order->id }}</a></td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>
                                    @if ($order->status == 'pending')
                                    <span class="badge badge-pill badge-primary">Pending</span>
                                    @elseif ($order->status == 'shipped') 
                                    <span class="badge badge-pill badge-info">Shipped</span>
                                    @elseif ($order->status == 'delivered')
                                    <span class="badge badge-pill badge-success">Delivered</span>
                                    @else
                                    <span class="badge badge-pill badge-danger">Cancelled</span>          
                                    @endif
                                </td>
                                <td>{{ number_format($order->grand_total) }}</td>
                                <td>{{ $order->created_at->format('d-m-Y') }}</td>                            
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
                <div id="pagination-links"> {{ $orders->links() }} </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection


@section('customJs')
<script>
    $(document).ready(function() {

        $("#searchInput").on("keyup",function() {
            let search = $(this).val().toLowerCase();

            $("#ordersTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search) >-1 );

            });

        }); // searchInput.
        

    }); //Ready.
</script>
@endsection





