<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Emart | Ecommerce Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="{{ url('frontend/vendor/glightbox/css/glightbox.min.css')}}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{ url('frontend/vendor/nouislider/nouislider.min.css')}}">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="{{ url('frontend/vendor/choices.js/public/assets/styles/choices.min.css')}}">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="{{ url('frontend/vendor/swiper/swiper-bundle.min.css')}}">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ url('frontend/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ url('frontend/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ url('frontend/img/favicon.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="{{ route('home') }}"><span class="fw-bold text-uppercase text-dark">Emart</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>

                    @if (getCategories()->isNotEmpty())
                    @foreach (getCategories() as $category)

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                        @if ($category->subcategory->isNotEmpty())
                        <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown">
                            @foreach ($category->subcategory as $subcategory)
                            @if ($subcategory->homepage == 'Yes' && $subcategory->status == 1)
                                <a class="dropdown-item border-0 transition-link" href="{{ route('shop',[$category->slug, $subcategory->slug]) }}">{{ $subcategory->name }}
                                </a>
                            @endif
                            @endforeach
                        </div>
                        @endif
                    </li>

                    @endforeach
                    @endif

                </ul>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}"> <i class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small class="text-gray fw-normal"> ( {{ Cart::count() }} ) </small></a></li>
                <li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1"></i><small class="text-gray fw-normal"> (0)</small></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.login') }}">

                   <i class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </header>


