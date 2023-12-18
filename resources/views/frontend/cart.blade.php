@extends('frontend.layouts.main')
@section('main-container')

      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Cart</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Your Cart</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
            @if ($cartContent->isNotEmpty())
          <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <table class="table text-nowrap">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                    </tr>
                  </thead>
                  <tbody class="border-0">
                    {{-- @if ($cartContent->isNotEmpty()) --}}
                    @foreach ($cartContent as $product)
                    <tr>
                      <th class="ps-0 py-3 border-light" scope="row">
                        <div class="d-flex align-items-center">
                            <a class="reset-anchor d-block animsition-link">
                                @if (!empty($product->options->productImage->image))
                                <img src="{{ url('uploads/products/small/'. $product->options->productImage->image) }}" alt="..." width="70"/>
                                @endif
                            </a>
                          <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link">{{ $product->name }}</a></strong></div>
                        </div>
                      </th>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small">Rs. {{ number_format($product->price) }}</p>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">QTY</span>
                          <div class="quantity">
                            <button class="dec-btnn p-0" data-id="{{ $product->rowId }}"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="{{ $product->qty }}"/>
                            <button class="inc-btnn p-0" data-id="{{ $product->rowId }}"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small" id="total">Rs. {{ number_format($product->price*$product->qty) }}</p>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <a class="reset-anchor" onclick="destroyCart('{{ $product->rowId }}');">
                            <i class="fas fa-trash-alt small text-muted"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                    {{-- @endif --}}
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="{{ route('shop') }}"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-end"><a class="btn btn-outline-dark btn-sm" href="{{ route('checkout.create') }}">Procceed to checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Cart Summery</h5>
                  <ul class="list-unstyled mb-0">
                    @foreach (Cart::content() as $item)
                    <li class="d-flex align-items-center justify-content-between mb-3"><strong class="small fw-normal">{{ $item->name }} x {{ $item->qty }}</strong><span class="text-muted small fw-bold">Rs. {{ $item->price }}</span></li>
                    @endforeach
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-2"><strong class="text-uppercase small fw-normal">SubTotal</strong><span class="fw-bold text-muted" id="subtotal">{{ Cart::subtotal() }}</span></li>
                    {{-- <li class="d-flex align-items-center justify-content-between mb-2"><strong class="text-uppercase small fw-normal">Discount</strong><span class="fw-bold text-muted"></span></li>
                    <li class="d-flex align-items-center justify-content-between mb-2"><strong class="text-uppercase small fw-normal">Shipping Charges</strong><span class="fw-bold text-muted"></span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small fw-bold">Total</strong><span class="fw-bold">Rs. </span></li>
                  </ul>
                </div>
                <div class="input-group mb-0">
                  <input class="form-control" type="text" placeholder="Enter your coupon">
                  <button class="btn btn-dark btn-sm w-100" type="submit"> <i class="fas fa-gift me-2"></i>Apply coupon</button>
                </div> --}}
              </div>
            </div>
          </div>
          @else
          <div class="cart-content-empty text-center">
            <span class="cart-text">Your cart is empty</span>
            <div class="col-md-6 mb-3 mb-md-0 text-md-start">
                <a class="btn btn-link p-0 text-dark btn-sm" href="{{ route('shop') }}">
                    <i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping
                </a>
            </div>

        </div>
          @endif
        </section>
      </div>

      @endsection



@section('customJs')
<script>

    $('.dec-btnn').on('click', function() {
    var siblings = $(this).parent().find('input');
    var currentValue = parseInt(siblings.val(), 10);

    if (currentValue > 1) {
        let rowId = $(this).data('id');
        siblings.val(currentValue - 1);
        let newQty = siblings.val();
        updateCart(rowId,newQty);
    }
});

$('.inc-btnn').on('click', function() {
    var siblings = $(this).parent().find('input');
    var currentValue = parseInt(siblings.val(), 10);

    if (currentValue < 8) {
        let rowId = $(this).data('id');
        siblings.val(currentValue + 1);
        let newQty = siblings.val();
        updateCart(rowId,newQty);
    }
});

function updateCart(rowId,qty) {

    $.ajax({
        url: "{{ route('updateCart') }}",
        type: "POST",
        data: {rowId: rowId, qty: qty},
        dataType: "json",
        success: function (response) {
            if (response.status == true) {
                location.reload();
                // $("#total").html(response.total).val();
                // $("#subtotal").html(response.subtotal).val();

            } else {
                alert(response.message);
                location.reload();
            }

        }
    });
}

function destroyCart(rowId) {
    if (confirm("Are you sure you want to delete?")) {

        $.ajax({
            url: "{{ route('deleteCart') }}",
            type: "POST",
            data: {rowId: rowId},
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    alert(response.message);
                    location.reload();

                } else {
                    alert(response.message);
                    location.reload();
                }

            }
        });
    }
}

</script>
@endsection


