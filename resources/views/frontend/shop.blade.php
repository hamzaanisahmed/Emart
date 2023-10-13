@extends('frontend.layouts.main')
@section('main-container')


      <!--  Modal -->
      <div class="modal fade" id="productView" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url(frontend/img/product-5.jpg)" href="{{ url('frontend/img/product-5.jpg')}}" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="{{ url('frontend/img/product-5-alt-1.jpg')}}" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="{{ url('frontend/img/product-5-alt-2.jpg')}}" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4"></h2>
                    <p class="text-muted">$250</p>
                    <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5"><a class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
                    </div><a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

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
              <!-- SHOP SIDEBAR-->
              <div class="col-lg-3 order-2 order-lg-1">
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
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <h6> <a class="reset-anchor" href="{{ route("detail", $product->slug) }}">{{ $product->title }}</a></h6>
                      <p class="small text-muted">Rs. {{ $product->price }} </p>
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




