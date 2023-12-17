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
                        <h2 class="pageheader-title">Form Validations </h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit
                            amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                                </ol>
                            </nav>
                        </div>
                       <button class="btn btn-primary categorybutton" onclick="window.location.href='{{ route('category.list') }}'" >Back</button>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <section class="content">
                <!-- Default box -->
                <form action="" name="updateDiscountCoupunsForm" id="updateDiscountCoupunsForm">
                <div class="container-fluid">
                    <div class="card">
                        <h5 class="card-header">Discount Coupons</h5>
                        <div class="card-body">								
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="code">Code</label>
                                        <input type="text" name="code" id="code" class="form-control" value="{{ $discount->code }}" placeholder="Coupon Code">
                                        <span class="p"></span>	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $discount->name }}" placeholder="Coupon Code Name" autocomplete="off">	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="max_uses">Max Uses</label>
                                        <input type="text" name="max_uses" id="max_uses" class="form-control" value="{{ $discount->max_uses }}" placeholder="Max Uses">	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="max_uses_user">Max Uses User</label>
                                        <input type="text" name="max_uses_user" id="max_uses_user" class="form-control" value="{{ $discount->max_uses_user }}" placeholder="Max Uses User">	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option {{ ($discount->type == 'fixed') ? 'selected' : '' }} value="fixed">Fixed</option>
                                            <option {{ ($discount->type == 'percent') ? 'selected' : '' }} value="percent">Percent</option>
                                        </select>
                                        <span class="p"></span>	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="discount_amount">Discount Amount</label>
                                        <input type="number" name="discount_amount" id="discount_amount" class="form-control" value="{{ $discount->discount_amount }}" placeholder="Discount Amount">
                                        <span class="p"></span>	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="min_amount">Min Amount</label>
                                        <input type="text" name="min_amount" id="min_amount" class="form-control" value="{{ $discount->min_amount }}" placeholder="Min Amount">	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Choose Status</option>
                                            <option {{ (!empty($discount->status == '1') ? 'selected' : '') }} value="1">Active</option>
                                            <option {{ (!empty($discount->status == '0') ? 'selected' : '') }} value="0">Deactive</option>
                                        </select>
                                        <span class="p"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="starts_at">Starts At</label>
                                        <input type="text" class="form-control" name="starts_at" value="{{ $discount->starts_at }}" id="starts_at">
                                        <span class="p"></span> 	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="expires_at">Expires At</label>
                                        <input type="text" class="form-control" name="expires_at" value="{{ $discount->expires_at }}" id="expires_at">
                                        <span class="p"></span> 	
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea type="text" name="description" id="description" class="form-control" placeholder="Coupons Code Description">{{ $discount->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>							
                    </div>
                    <div class="pb-5 pt-3">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        <button class="btn btn-primary ml-3">Update</button>
                    </div>
                </div>
                </form>
                <!-- /.card -->
            </section>
        </div>
    </div>
@endsection


@section('customJs')
<script>
    $(document).ready(function() {

        $("#updateDiscountCoupunsForm").submit(function(event) {
            event.preventDefault();
            let formData = $(this).serializeArray();

            $.ajax({

                url: "{{ route('discountCouponsUpdate', $discount->id) }}",
                type: "put",
                data: formData,
                dataType: "json",
                success: function (response) {

                    if (response.status == true) {
                        // Reset Validations.
                        $("span").removeClass('invalid-feedback').html('');
                        $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                        // Success Alert.
                        swal("", "Discount Coupons Has Been Updated Successfully!", "success")
                            .then(() => {
                                window.location.href="{{ route('discountCoupons') }}";
                        });

                    } else {
                        let errors = response['errors'];
                        
                        $("span").removeClass('invalid-feedback').html('');
                        $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                        $.each(errors, function (key, value) {
                            $(`#${key}`).addClass('is-invalid').siblings('span').addClass('invalid-feedback').html(value);
                        });
                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Error");
                }
            });
    
        }); //-Submit

    }); //ready.
</script>
@endsection



