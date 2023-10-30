@extends('frontend.layouts.main')
@section('main-container')

<div class="page-holder bg-light">

    @if (!empty($relatedProducts))
    @foreach ($relatedProducts as $relatedProduct)
    <!--  Modal -->
    <div class="modal fade" id="productView" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0">
                    @if (!empty($relatedProduct->product_images))
                    @foreach ($relatedProduct->product_images as $productImage)
                    <a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url('{{ asset('uploads/products/large/' . $productImage->image) }}')" data-gallery="gallery1" data-glightbox="Red digital smartwatch">
                    </a>
                    @endforeach
                    @endif
                </div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <h2 class="h4">{{ $relatedProduct->title }}</h2>
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                        <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                        <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                        <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                        <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>&nbsp;<span class="small text-info">(20 Customers Reviews) </span>
                    </ul>
                    @if ($relatedProduct->compare_price < $relatedProduct->price)
                    <span class="small text-danger" style="text-decoration: line-through;">Rs. {{ $relatedProduct->compare_price }}</span>
                    @endif
                    &nbsp;
                    <span class="text-muted">Rs. {{ $relatedProduct->price }}</span>
                    <p class="text-sm mb-4">{!! $relatedProduct->short_description !!}</p>
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
    @endforeach
    @endif
    <section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                  <div class="swiper product-slider-thumbs">
                    <div class="swiper-wrapper">
                        @if (!empty($product->product_images))
                        @foreach ($product->product_images as $productImage)
                            <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="{{ url('uploads/products/small/'.$productImage->image) }}" alt="..."></div>
                        @endforeach
                        @endif
                    </div>
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="swiper product-slider">
                    <div class="swiper-wrapper">
                        @foreach ($product->product_images as $productImage)
                            <div class="swiper-slide h-auto"><a class="glightbox product-view" href="{{ url('uploads/products/large/'. $productImage->image) }}" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="{{ url('uploads/products/large/'. $productImage->image) }}" alt="..."></a></div>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
              <h1>{{ $product->title }}</h1>
              <ul class="list-inline mb-2">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>&nbsp;<span class="small text-info">(20 Customers Reviews) </span>
              </ul>
              @if ($product->compare_price < $product->price)
                <span class="small text-danger" style="text-decoration: line-through;">Rs. {{ $product->compare_price }}</span>
                @endif
                &nbsp;
              <span class="text-muted lead">Rs. {{ $product->price }}</span>
              <p class="text-sm mb-4">{!! $product->short_description !!}</p>
              <div class="row align-items-stretch mb-4">
                <div class="col-sm-5 pr-sm-0">
                  <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                    <div class="quantity">
                      <button class="dec-btn p-0" data-id="{{ $product->rowId }}"><i class="fas fa-caret-left"></i></button>
                      <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                      <button class="inc-btn p-0" data-id="{{ $product->rowId }}"><i class="fas fa-caret-right"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="javascript:void(0);" onclick="addToCart({{ $product->id }});">Add to cart</a></div>
              </div><a class="text-dark p-0 mb-4 d-inline-block" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a><br>
              <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ms-2 text-muted">{{ $product->sku }}</span></li>
                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ms-2" href="#!">{{ $product->category->name }}</a></li>
                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ms-2" href="#!">Innovation</a></li>
              </ul>
            </div>
          </div>
          <!-- DETAILS TABS-->
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
            <li class="nav-item"><a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
          </ul>
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Product description</h6>
                <p class="text-muted text-sm mb-0">{!! $product->description !!}</p>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
              <div class="p-4 p-lg-5 bg-white">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="d-flex mb-3">
                      <div class="flex-shrink-0"><img class="rounded-circle" src="{{ url('frontend/img/customer-1.png')}}" alt="" width="50"/></div>
                      <div class="ms-3 flex-shrink-1">
                        <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                        <p class="small text-muted mb-0 text-uppercase">20 May 2023</p>
                        <ul class="list-inline mb-1 text-xs">
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                        </ul>
                        <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="flex-shrink-0"><img class="rounded-circle" src="{{ url('frontend/img/customer-2.png')}}" alt="" width="50"/></div>
                      <div class="ms-3 flex-shrink-1">
                        <h6 class="mb-0 text-uppercase">Jane Doe</h6>
                        <p class="small text-muted mb-0 text-uppercase">1 September 2023</p>
                        <ul class="list-inline mb-1 text-xs">
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                        </ul>
                        <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- RELATED PRODUCTS-->
          @if (!empty($relatedProducts))
          <h2 class="h5 text-uppercase mb-4">Related products</h2>
          <div class="row">
            <!-- PRODUCT-->
            @foreach ($relatedProducts as $relatedProduct)

            @php
                $productImage = $relatedProduct->product_images->first();
            @endphp

            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative">
                    @if ($relatedProduct->compare_price < $relatedProduct->price)
                    <div class="badge text-white bg-primary">Sale</div>
                    @endif
                    <a class="d-block" href="{{ route("detail", $relatedProduct->slug) }}">
                        @if (!empty($productImage->image))
                        <img class="img-fluid w-100" src="{{ url('uploads/products/small/'.$productImage->image) }}" alt="...">
                        @else
                        <img class="img-fluid w-100" src="{{ url('uploads/products/small/constant/default-150x150.png') }}">
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
                <h6> <a class="reset-anchor" href="{{ route("detail", $relatedProduct->slug) }}">{{ $relatedProduct->title }}</a></h6>
                @if ($relatedProduct->compare_price < $relatedProduct->price)
                <span class="small text-danger" style="text-decoration: line-through;">Rs. {{ $relatedProduct->compare_price }}</span>
                @endif
                &nbsp;
                <span class="small text-muted">Rs. {{ $relatedProduct->price }}</span>
              </div>
            </div>
            @endforeach
            <!-- PRODUCT-->
          </div>
          @endif
        </div>
    </section>
</div>

@endsection



