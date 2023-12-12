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
                <h3>My Orders</h3>
                <p class="lead f15">Your orders details.</p>
                <p class="text-muted f15">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                
              {{-- <div class="card card-sm"> --}}
                <div class="card-body bg-light mb-3 f13">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <!-- Heading -->
                            <h6 class="heading-xxxs text-muted f15">Order No:</h6>
                            <!-- Text -->
                            <p class="mb-lg-0 fs-sm fw-bold">
                            #{{ $order->id }}
                            </p>
                        </div>
                        <div class="col-6 col-lg-3">
                            <!-- Heading -->
                            @if ($order->status == 'shipped')
                            <h6 class="heading-xxxs text-muted f15">Shipped Date:</h6>
                            @elseif ($order->status == 'cancelled')
                            <h6 class="heading-xxxs text-muted f15">Cancelled Date:</h6>
                            @elseif ($order->status == 'delivered')
                            <h6 class="heading-xxxs text-muted f15">Delivered Date: </h6>
                            @else
                            <h6 class="heading-xxxs text-muted f15">Date: </h6>
                            @endif
                            <!-- Text -->
                            <p class="mb-lg-0 fs-sm fw-bold">
                              @if (!empty($order->shipped_date))
                              {{ \Carbon\Carbon::parse($order->shipped_date)->format('d-m-Y') }}
                              @else
                              {{ \Carbon\Carbon::parse($order->shipped_date)->format('d-m-Y') }}
                              @endif
                            </p>
                        </div>
                        <div class="col-6 col-lg-3">
                            <!-- Heading -->
                            <h6 class="heading-xxxs text-muted f15">Status:</h6>
                            <!-- Text -->
                            <p class="mb-0 fs-sm fw-bold">
                                @if ($order->status == 'pending')
                                    <span class="badge bg-secondary f12">Pending</span>
                                    @elseif ($order->status == 'shipped')
                                    <span class="badge bg-info f12">Shipped</span>
                                    @elseif ($order->status == 'delivered')
                                    <span class="badge bg-success f12">Delivered</span>
                                    @else
                                <span class="badge bg-danger f12">Cancelled</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-6 col-lg-3">
                            <!-- Heading -->
                            <h6 class="heading-xxxs text-muted f15">Order Amount:</h6>
                            <!-- Text -->
                            <p class="mb-0 fs-sm fw-bold">
                            Rs. {{ number_format($order->grand_total) }}
                            </p>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
              <div class="table-responsive mb-4 f15">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Product</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (!empty($orderItem))
                    @foreach ($orderItem as $item)
                    @php
                        $productImage = getProductImages($item->product_id);
                    @endphp
                    <tr>
                      <td>
                        @if (!empty($productImage->image))
                        <img src="{{ url('uploads/products/small/'.$productImage->image) }}" class="img-thumbnail" width="90">
                        @else
                        <img src="{{ url('uploads/products/small/constant/default-150x150.png') }}" class="img-thumbnail" width="90">
                        @endif
                      </td>
                      <td class="align-middle">{{ $item->name }}</td>
                      <td class="align-middle">{{ $item->qty }}</td>
                      <td class="align-middle">{{ number_format($item->price) }}</td>
                      <td class="align-middle">10%</td>
                      <td class="align-middle">{{ number_format($item->total) }}</td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="5" class="text-right fw-normal">Subtotal</th>
                      <th>{{ number_format($order->subtotal) }} /-</th>
                    </tr>
                    <tr>
                      <th colspan="5" class="text-right fw-normal">Shipping and handling</th>
                      <th>{{ $order->shipping }} /-</th>
                    </tr>
                    <tr>
                      <th colspan="5" class="text-right fw-normal">Discount</th>
                      <th>{{ $order->discount }}</th>
                    </tr>
                    <tr>
                      <th colspan="5" class="text-right fw-normal">Total</th>
                      <th>Rs. {{ number_format($order->grand_total) }}</th>
                    </tr>
                  </tfoot>
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
