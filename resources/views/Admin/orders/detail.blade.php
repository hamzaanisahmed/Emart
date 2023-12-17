@extends('Admin.layouts.main')
@section('main-container')
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Admin </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit
                                amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Order
                                                Details</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Module</li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="{{ route('adminOrders') }}" class="btn btn-primary productsbtn">Back</a>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header pt-4">
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                            <h1 class="h5 mb-3">Orders Details</h1>
                                            <address>
                                                <strong> Name: {{ $order->first_name. ' ' .$order->last_name }}</strong><br><br>
                                                <strong>Address: </strong>
                                                {{ $order->address }}
                                            </address>
                                            </div> 
                                            <div class="col-sm-4 invoice-col">
                                                <b>Invoice #007612</b><br>
                                                <br>
                                                <address>
                                                    <strong> Order ID: #{{ $order->id }}</strong><br><br>
                                                    <strong>Appartment: </strong>
                                                    {{ $order->apartment }}
                                                    <strong>Phone No: </strong>
                                                    {{ $order->phone }}
                                                    <strong>Country: </strong>
                                                    {{ $order->city }}, {{ $order->state }}
                                                </address>
                                            </div>
                                            <div class="col-sm-4 invoice-col">
                                                <b>Date: {{ $order->created_at->format('d-m-Y') }}</b><br>
                                            <br>
                                                <strong>Total: Rs. {{ number_format($order->grand_total) }}</strong><br><br>
                                                <b>Status:</b> 
                                                @if ($order->status == 'pending')
                                                    <span class="badge bg-primary text-white">Pending</span>
                                                    @elseif ($order->status == 'shipped') 
                                                    <span class="badge bg-info text-white">Shipped</span>
                                                    @elseif ($order->status == 'delivered')
                                                    <span class="badge bg-success text-white">Delivered</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">Cancelled</span>
                                                @endif
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-3">								
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th width="100">Price</th>
                                                    <th width="100">Qty</th>                                        
                                                    <th width="100">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($orderItem->isNotEmpty())
                                                @foreach ($orderItem as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>Rs. {{ number_format($item->price) }}</td>                                        
                                                    <td>{{ $item->qty }}</td>
                                                    <td>Rs. {{ number_format($item->total) }}</td>
                                                </tr>
                                                @endforeach 
                                                <tr>
                                                    <th colspan="3" class="text-right">Subtotal:</th>
                                                    <td>Rs. {{ number_format($order->subtotal) }}</td>
                                                </tr>                                               
                                                <tr>
                                                    <th colspan="3" class="text-right">Shipping:</th>
                                                    <td>Rs. {{ $order->shipping }}</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="3" class="text-right">Total:</th>
                                                    <td>Rs. {{ number_format($order->grand_total) }}</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>								
                                    </div>                            
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                <form action="" id="changeOrderStatusForm" name="changeOrderStatusForm">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3" style="font-size: 21px">Order Status</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="pending" {{ ($order->status == 'pending') ? 'selected' : '' }}>Pending</option>
                                                <option value="shipped" {{ ($order->status == 'shipped') ? 'selected' : '' }}>Shipped</option>
                                                <option value="delivered" {{ ($order->status == 'delivered') ? 'selected' : '' }}>Delivered</option>
                                                <option value="cancelled" {{ ($order->status == 'cancelled') ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" style="font-size: 20px">Shipped Date</label>
                                            @if (!empty($order->shipped_date))
                                            <input autocomplete="off" type="text" class="form-control" name="shipped_date" id="shipped_date" 
                                                value="{{ \Carbon\Carbon::parse($order->shipped_date)->format('d-m-Y H:i:s') }}" placeholder="Select Shipping Date">
                                            @else
                                            <input autocomplete="off" type="text" class="form-control" name="shipped_date" id="shipped_date" placeholder="Select Shipping Date">
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary btn-sm">Update</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3" style="font-size: 19px">Send Inovice Email</h2>
                                        <div class="mb-3">
                                            <select name="" id="" class="form-control">
                                                <option value="">Customer</option>                                                
                                                <option value="">Admin</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                        </div>
					</div>
					<!-- /.card -->
				</section>
            </div>
        </div>
    @endsection

    @section('customJs')
    <script>
        $(document).ready(function () {

            $("#changeOrderStatusForm").submit(function(event) {
                event.preventDefault();
                $.ajax({

                    url: "{{ route('orderStatusId', $order->id) }}",
                    type: "post",
                    data: $(this).serializeArray(),
                    dataType: "json",
                    success: function (response) {
                        swal("Good Job!", "Order Status Has Been Updated", "success")
                        .then(() => {
                            window.location.href="{{ route('adminOrders') }}";
                        });                  
                    },
                    error:function(jqXHR, exception) {
                        console.log("Somethings went wrong");
                    }
                });

            });

        }); //Document.
    </script>
    @endsection
