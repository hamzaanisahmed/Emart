@extends('frontend.layouts.main')
@section('main-container')

      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-dark" href="cart.html">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <!-- BILLING ADDRESS-->
          <h2 class="h5 text-uppercase mb-4">Billing details</h2>
          <div class="row">
            <div class="col-lg-8">
              <form id="userCheckoutForm" name="userCheckoutForm">
                <div class="row gy-3">
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="firstName">First name </label>
                    <input class="form-control form-control-lg" type="text" name="firstName" id="firstName" placeholder="Enter your first name" value="{{ (!empty($customerAddress)) ? $customerAddress->first_name : '' }}">
                    <span class="p"></span>
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="lastName">Last name </label>
                    <input class="form-control form-control-lg" type="text" name="lastName" id="lastName" placeholder="Enter your last name" value="{{ (!empty($customerAddress)) ? $customerAddress->last_name : '' }}">
                    <span class="p"></span>
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="email">Email address </label>
                    <input class="form-control form-control-lg" type="text" name="email" id="email" placeholder="e.g. abc@example.com" value="{{ (!empty($customerAddress)) ? $customerAddress->email : '' }}">
                    <span class="p"></span>
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                    <input class="form-control form-control-lg" type="number" name="phone" id="phone" placeholder="e.g. +02 245354745" value="{{ (!empty($customerAddress)) ? $customerAddress->phone : '' }}">
                    <span class="p"></span>
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="company">Company name (optional) </label>
                    <input class="form-control form-control-lg" type="text" name="company" id="company" placeholder="Your company name" value="{{ (!empty($customerAddress)) ? $customerAddress->company : '' }}">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="form-label text-sm text-uppercase" for="country">Country</label>
                    <select class="form-control form-control-lg fw-light " name="country" id="country" data-customclass="form-control form-control-lg rounded-0">
                      <option value="">Choose your country</option>
                      @if ($countries->isNotEmpty())
                      @foreach ($countries as $country)
                      <option {{ (!empty($customerAddress) && $customerAddress->country_id == $country->id) ? 'selected' : ''  }} value="{{ $country->id }}">{{ $country->name }}</option>
                      @endforeach
                      @endif
                    </select>
                    <span class="p"></span>
                  </div>
                  <div class="col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="address">Address line 1 </label>
                    <input class="form-control form-control-lg" type="text" name="address" id="address" placeholder="House number and street name" value="{{ (!empty($customerAddress)) ? $customerAddress->address : '' }}">
                    <span class="p"></span>
                  </div>
                  <div class="col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="apartment">Address line 2 </label>
                    <input class="form-control form-control-lg" type="text" name="apartment" id="apartment" placeholder="Apartment, Suite, Unit, etc (optional)" value="{{ (!empty($customerAddress)) ? $customerAddress->apartment : '' }}">
                    <span class="p"></span>
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="city">City </label>
                    <input class="form-control form-control-lg" type="text" name="city" id="city" placeholder="Town/City" value="{{ (!empty($customerAddress)) ? $customerAddress->city : '' }}">
                    <span class="p"></span>
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="state">State </label>
                    <input class="form-control form-control-lg" type="text" name="state" id="state" placeholder="State" value="{{ (!empty($customerAddress)) ? $customerAddress->state : '' }}">
                    <span class="p"></span>
                  </div>
                  <div class="col-lg-6">
                  </div>
                </div>
              {{-- </form> --}}
            </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Your order</h5>
                  <ul class="list-unstyled mb-0">
                    @foreach (Cart::content() as $item)
                    <li class="d-flex align-items-center justify-content-between mb-3"><strong class="small fw-normal">{{ $item->name }} x {{ $item->qty }}</strong><span class="text-muted small fw-bold">Rs. {{ $item->price }}</span></li>
                    @endforeach
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-2"><strong class="text-uppercase small fw-normal">SubTotal</strong><span class="fw-bold text-muted">{{ Cart::subtotal() }}</span></li>
                    <li class="d-flex align-items-center justify-content-between mb-2"><strong class="text-uppercase small fw-normal" id="disount">Discount</strong><span class="fw-bold text-muted">{{ $discount }}</span></li>
                    <li class="d-flex align-items-center justify-content-between mb-2"><strong class="text-uppercase small fw-normal">Shipping Charges</strong><span class="fw-bold text-muted">{{ number_format($totalShippingCharge) }}</span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small fw-bold">Total</strong><span class="fw-bold">Rs. {{ number_format($grandTotal) }}</span></li>
                  </ul>
                </div>
              </div>
              {{-- <br> --}}
              <div class="input-group apply-coupan mt-4 mb-4">
                <input type="text" class="form-control" name="couponCode" id="couponCode" placeholder="Coupon Code" >
                <button class="btn btn-dark" type="button" id="couponCodeBtn">Apply Coupon</button>
            </div> 
              {{-- <br> --}}
            <!-- Payment Method-->
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Payment Method</h5>
                        <p>Select your payment method here</p>
                        <div class="form-group mb-2">
                            <input type="radio" name="payment_method" id="payment_method_one" value="cod" checked><span class="fw-bold"> Cash on Delivery </span>
                        </div>
                        <div class="form-group mb-4">
                            <input type="radio" name="payment_method" id="payment_method_two" value="stripe"><span class="fw-bold"> Stripe </span>
                        </div>
                        <div class="form-group mb-0 d-none" id="stripeForm">
                        <h5 class="text-uppercase mb-3">Payment Details</h5>
                        <p>Enter your payment details here</p>
                        <div class="form-group mb-4">
                            <label for="card_number" class="mb-2">Card Number</label>
                            <input class="form-control" type="text" name="card_number" id="card_number" placeholder="Valid Card Number">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="expiry_date" class="mb-2">Expiry Date</label>
                                    <input class="form-control" type="date" name="expiry_date" id="expiry_date">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="cvv_code" class="mb-2">CVV Code</label>
                                    <input class="form-control" type="text" name="cvv_code" id="cvv_code" placeholder="123">
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-12 pt-3">
                            <button class="btn btn-dark" type="submit">Place order</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </section>
      </div>

@endsection


@section('customJs')
<script>
    $("#payment_method_one").click(function() {
        if ($(this).is(":checked") == true) {
            $("#stripeForm").addClass('d-none');
        }
    });

    $("#payment_method_two").click(function() {
        if ($(this).is(":checked") == true) {
            $("#stripeForm").removeClass('d-none');
        }

    });

    $("#userCheckoutForm").submit(function(event) {

        event.preventDefault();
        let formData = $(this).serializeArray();

        $("button[type=submit]").prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "{{ route('checkout.store') }}",
            data: formData,
            dataType: "JSON",
            success: function (response) {

                $("button[type=submit]").prop('disabled', false);

                if (response.status == true) {

                    $(".span").removeClass('invalid-feedback').html('');
                    $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                    // swal("Good Job!", "Thankyou For Your Order", "success");
                    swal("Good Job!", "Thank you For Your Order", "success")
                    .then(() => {
                        window.location.href="{{ route('home') }}";
                    });

                } else {

                    let errors = response.errors;

                    $(".span").removeClass('invalid-feedback').html('');
                    $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                    $.each(errors, function (key, value) {

                        $(`#${key}`).addClass('is-invalid').siblings('span').addClass('invalid-feedback').html(value);

                    });

                }

            }

        });
    });


    $(document).on('click', '#couponCodeBtn', function (event){
      event.preventDefault();

      $.ajax({
        url: "{{ route('applyDiscountCoupons') }}",
        type: "post",
        data: {code: $("#couponCode").val(), country_id: $("#country").val()},
        dataType: "json",
        success: function (response) {
          if(response.status == true) {
          // $("#disount").html(response.discount);
          }
        }
      });
      
    }); //couponCodeBtn.
</script>
@endsection




