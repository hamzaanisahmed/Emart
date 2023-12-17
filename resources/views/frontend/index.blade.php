@extends('frontend.layouts.main')
@section('main-container')

      <!-- HERO SECTION-->
      <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(frontend/img/hero-banner-alt.jpg)">
          <div class="container py-5">
            <div class="row px-4 px-lg-5">
              <div class="col-lg-6">
                <p class="text-muted small text-uppercase mb-2">New Collections Of 2023</p>
                <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark" href="shop.html">Browse collections</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
          </header>
          <div class="row">
            @if (getCategories()->isNotEmpty())
            @foreach (getCategories() as $category)
            <div class="col-md-4">
                <a class="category-item" href="{{ route('shop',[$category->slug]) }}">
                    @if ($category->image != null)
                    <img class="img-fluid" src="{{ url('uploads/categories/thumbnail/'.$category->image)}}" alt=""/>
                    @endif
                    <strong class="category-item-title">{{ $category->name }}</strong>
                </a>
            </div>
            @endforeach
            @endif
          </div>
        </section>
        <!-- TRENDING PRODUCTS-->
        <section class="py-5">
          <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
          </header>
          <div class="row">
            <!-- PRODUCT-->
            @if ($featuredProducts->isNotEmpty())
            @foreach ($featuredProducts as $product)

            @php
                $productImage = $product->product_images->first();
            @endphp

            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="product text-center">
                <div class="position-relative mb-3">
                    @if ($product->created_at > now()->subDays(6))
                        <div class="badge text-white bg-info">New</div>

                    @elseif ($product->qty == 0)
                        <div class="badge text-white bg-danger">Sold</div>

                    @elseif ($product->compare_price > $product->price)
                        <div class="badge text-white bg-primary">Sale</div>

                        @else
                        <div class="badge text-white bg-"></div>
                    @endif

                  <a class="d-block" href="{{ route("detail",$product->slug) }}">
                    @if (!empty($productImage))
                    <img class="img-fluid w-100" src="{{ url('uploads/products/large/'.$productImage->image)}}" alt="...">
                    @endif
                  </a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="javascript:void(0);" onclick="addToCart({{ $product->id }});">Add to cart</a></li>
                    </ul>
                  </div>
                </div>
                <h6><a class="reset-anchor" href="{{ route("detail",$product->slug) }}">{{ $product->title }}</a></h6>
                @if ($product->compare_price > $product->price)
                <span class="small text-danger" style="text-decoration: line-through;">Rs. {{ number_format($product->compare_price) }}</span>
                @endif
                &nbsp;
                <span class="small text-muted">Rs. {{ number_format($product->price) }}</span>
              </div>
              <br>
            </div>
            @endforeach
            @endif
            <!-- PRODUCT-->
          </div>
        </section>
        <!-- SERVICES-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center gy-3">
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Free shipping</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Festivaloffers</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- NEWSLETTER-->
        <section class="py-5">
          <div class="container p-0">
            <div class="row gy-3">
              <div class="col-lg-6">
                <h5 class="text-uppercase">Let's be friends!</h5>
                <p class="text-sm text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
              </div>
              <div class="col-lg-6">
                <form action="#">
                  <div class="input-group">
                    <input class="form-control form-control-lg" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                    <button class="btn btn-dark" id="button-addon2" type="submit">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>

@endsection






