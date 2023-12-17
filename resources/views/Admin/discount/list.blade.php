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
                    <a href="{{ route('disountCouponsCreate') }}" class="btn btn-success checking text-white"><i class="fa fa-plus"></i> Add Coupons</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Manage Discount Coupons</h5>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search Here">
                        </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Discount</th>
                                <th>Starts Date</th>
                                <th>Expires Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="discountCouponsTr">
                            @if ($discount->isNotEmpty())
                            @foreach ($discount as $discounts)
                            <tr>
                                <td>{{ $discounts->id }}</td>
                                <td>{{ $discounts->code }}</td>
                                <td>{{ $discounts->name }}</td>
                                <td>
                                    @if ($discounts->type == 'percent')
                                    {{ $discounts->discount_amount }}%
                                    @else
                                    Rs. {{ number_format($discounts->discount_amount) }} 
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($discounts->starts_at)->format('d/m/Y H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($discounts->expires_at)->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    @if ($discounts->status == '1')
                                    <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                    <span class="badge badge-pill badge-danger">Deactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('discountCouponsEdit', $discounts->id) }}" class="edit-btn">
                                        <img src="{{ url('Admin/assets/images/e2.png') }}" class="editi">
                                    </a>
                                    <button type="button" value="{{ $discounts->id }}" class="delete-btn">
                                        <img src="{{ url('Admin/assets/images/delete.png') }}"
                                            class="deletei">
                                    </a>
                                </td>                            
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="11">Empty! Add Some Records.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <br>
                <div id="pagination-links"> {{ $discount->links() }} </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('customJs')
<script>
    $(document).ready(function() {

        $(document).on('click', '.delete-btn', function (event) {

            let url = "{{ route('discountCouponsDelete', 'ID') }}";
            let Id = $(this).val();
            let newUrl = url.replace('ID', Id);

            if (confirm("Are you sure you Want to delete this coupon?")) {
                $.ajax({
                    url: newUrl,
                    type: "delete",
                    success: function (response) {
                        if (response.status == true) {
                            location.reload();
                        }    
                    }
                });
            }

        }); // deleteBtn.

         // Search Bar.
        $("#searchInput").on("keyup",function() {
            let search = $(this).val().toLowerCase();

            $("#discountCouponsTr tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search) >-1 );
            });

        });
        // End - Search Bar

    }); //Document Ready.
</script>
@endsection





