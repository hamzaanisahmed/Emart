@extends('frontend.layouts.main')
@section('main-container')

  <div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
          <div class="col-lg-6">
            <h1 class="h2 text-uppercase mb-0">Shop</h1>
          </div>
          <div class="col-lg-6 text-lg-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5">
      <div class="container p-0">
        <div class="row">
          <div class="col-lg-3 order-2 order-lg-1">
                <!-- SHOP SIDEBAR-->
                <h5 class="text-uppercase mb-4">Categories</h5>
                @if ($categories->isNotEmpty())
                @foreach ($categories as $category)

                <div class="py-2 px-4 bg-light mb-3">
              </a><strong class="small text-uppercase fw-bold">{{ $category->name }}

                    </strong>
                </div>
                @if ($category->subcategory->isNotEmpty())
                @foreach ($category->subcategory as $subcategory)

                <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                    <li class="mb-2">
                        <a class="reset-anchor {{ ($subcategorySelected == $subcategory->id) ? 'text-primary' : '' }} " href="{{ route('shop', [$category->slug,$subcategory->slug]) }}">{{ $subcategory->name }}</a>
                    </li>
                </ul>
                @endforeach
                @endif
                @endforeach
                @endif

                <br>
                <h6 class="text-uppercase mb-4">Price range</h6>

                <div class="price-range pt-4 mb-5">
                  <div id="range"></div>
                  <div class="row pt-2">
                    <div class="col-6">
                        <strong class="small fw-bold text-uppercase" name="my_range">From</strong>
                    </div>
                    <div class="col-6 text-end">
                        <strong class="small fw-bold text-uppercase" name="my_range">To</strong>
                    </div>
                  </div>
                </div>
                <h6 class="text-uppercase mb-3">Brands</h6>
                @if ($brands->isNotEmpty())
                @foreach ($brands as $brand)
                <div class="form-check mb-1">
                    <input {{ (in_array($brand->id, $brandsArray)) ? 'checked' : '' }} class="form-check-input brand-label" type="checkbox" name="brand[]" id="brand-{{ $brand->id }}" value="{{ $brand->id }}">
                    <label class="form-check-label" for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                </div>
                @endforeach
                @endif
                <br>
              </div>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-sm text-muted mb-0">Showing 1–12 of 53 results</p>
                  </div>
                  <div class="col-lg-6">
                    <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                      <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th-large"></i></a></li>
                      <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th"></i></a></li>
                      <li class="list-inline-item">
                        <select class="selectpicker" data-customclass="form-control form-control-sm" id="sort" name="sort">
                          <option value>Sort By </option>
                          <option value="all-listing">All Listing </option>
                          <option value="default" {{ ($sort == 'default') ? 'selected' : '' }}>Default sorting </option>
                          <option value="latest" {{ ($sort == 'latest') ? 'selected' : '' }}>Latest sorting </option>
                          <option value="low-high" {{ ($sort == 'low-high') ? 'selected' : '' }}>Price: Low to High </option>
                          <option value="high-low" {{ ($sort == 'high-low') ? 'selected' : '' }}>Price: High to Low </option>
                        </select>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <!-- PRODUCT-->
                  @if ($products->isNotEmpty())
                  @foreach ($products as $product)
                  @php
                  $productImage = $product->product_images->first();

                  @endphp
                  <div class="col-lg-4 col-sm-6">

                    <div class="product text-center">
                      <div class="mb-3 position-relative">
                        <div class="badge text-white bg-">
                        </div>
                            @if ($product->created_at > now()->subDays(6))
                            <div class="badge text-white bg-info">New</div>
    
                            @elseif ($product->qty == 0)
                                <div class="badge text-white bg-danger">Sold</div>
        
                            @elseif ($product->compare_price > $product->price)
                                <div class="badge text-white bg-primary">Sale</div>
        
                                @else
                                <div class="badge text-white bg-"></div>
                            @endif
                            <a class="d-block" href="{{ route("detail", $product->slug) }}">
                                @if (!empty($productImage))
                                <img class="img-fluid w-100" src="{{ url('uploads/products/small/'.$productImage->image) }}" alt="...">
                                @else
                                <img class="img-fluid w-100" src="{{ url('uploads/products/small/constant/default-150x150.png') }}" class="img-thumbnail">
                                @endif
                            </a>
                        <div class="product-overlay">
                          <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="javascript:void(0);" onclick="addToCart({{ $product->id }});">Add to cart</a></li>
                          </ul>
                        </div>
                      </div>
                      <h6> <a class="reset-anchor" href="{{ route("detail", $product->slug) }}">{{ $product->title }}</a></h6>
                      @if ($product->compare_price > $product->price)
                      <span class="small text-danger" style="text-decoration: line-through;">Rs. {{ number_format($product->compare_price) }} </span>
                      &nbsp;
                      @endif
                      <span class="small text-muted">Rs. {{ number_format($product->price) }}</span>
                      <br><br>
                      {{-- @endif --}}
                      {{-- <p class="small text-muted">Rs. {{ $product->price }} </p> --}}
                    </div>
                  </div>
                  @endforeach
                  @endif
                  <!-- PRODUCT-->
                </div>
                <!-- PAGINATION-->
                {{ $products->withQueryString()->links() }}
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection

      @section('customJs')

      <!-- Nouislider Config-->
      <script>
        var range = document.getElementById('range');
        noUiSlider.create(range, {
            range: {
                'min': 0,
                'max': 2000
            },
            step: 5,
            start: [100, 1000],
            margin: 300,
            connect: true,
            direction: 'ltr',
            orientation: 'horizontal',
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
              to: function ( value ) {
                return '$' + value;
              },
              from: function ( value ) {
                return value.replace('', '');
              }
            }
        });

      </script>

      <script>
        // Get all elements with the class "brand-label"
        const brandLabels = document.querySelectorAll(".brand-label");

        // Add event listeners to each element
        brandLabels.forEach(function (label) {
            label.addEventListener("change", applyFilters);
        });

        let sort = document.getElementById("sort");

        sort.addEventListener("change", function() {
            applyFilters()
        });

        function applyFilters() {
            let brand = [];

            // Loop through all elements with the class "brand-label"
            brandLabels.forEach(function (label) {
            // Check if the current element is checked
                if (label.checked) {
                    brand.push(label.value);
                }
            });

            console.log(brand.toString());

            let url = '{{ url()->current() }}?';

            if(brand.length > 0) {
                url += '&brand='+brand.toString()
            }

            // sorting filters
            var sortValue = document.getElementById("sort").value;

            url+= '&sort=' + sortValue;
            window.location.href = url;
        }


      </script>
>
      @endsection




