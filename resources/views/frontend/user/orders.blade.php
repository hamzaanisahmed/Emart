@extends('frontend.layouts.main')
@section('main-container')

<section class="py-5 bg-light">
    <div class="container">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
          <h1 class="h2 text-uppercase mb-0">User</h1>
        </div>
        <div class="col-lg-6 text-lg-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
              <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Login</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
<br>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
              @include('frontend.user.sidebar.userSidebar')
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div class="col-lg-9">
                <div class="box nav-link text-dark card sidebar-menu fw-normal">
                  <h1>My orders</h1>
                  <p class="lead f13">Your orders on one place.</p>
                  <p class="text-muted f15">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                  <hr>
                  <div class="table-responsive f13">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Order</th>
                          <th>Order Date</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if ($orders->isNotEmpty())
                        @foreach ($orders as $order)
                        <tr>
                          <th>#{{ $order->id }}</th>
                          <td>{{ $order->created_at->format('d-m-Y') }}</td>
                          <td>Rs. {{ number_format($order->grand_total) }}</td>
                          <td>
                            @if ($order->status == 'pending')
                                <span class="badge bg-secondary f12">Pending</span>
                                @elseif ($order->status == 'shipped')
                                <span class="badge bg-info f12">Shipped</span>
                                @elseif ($order->status == 'delivered')
                                <span class="badge bg-success f12">Delivered</span>
                                @else 
                                <span class="badge bg-danger f12">Cancelled</span>
                            @endif
                          </td>
                          <td><a href="{{ route('userOrderDetails', $order->id) }}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="fw-bold f15">Empty ! Order Some Items</td>
                        </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <br>

@endsection
