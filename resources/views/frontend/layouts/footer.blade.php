<footer class="bg-dark text-white">
    <div class="container py-4">
      <div class="row py-5">
        <div class="col-md-4 mb-3 mb-md-0">
          <h6 class="text-uppercase mb-3">Customer services</h6>
          <ul class="list-unstyled mb-0">
            <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
            <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
            <li><a class="footer-link" href="#!">Online Stores</a></li>
            <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
          <h6 class="text-uppercase mb-3">Company</h6>
          <ul class="list-unstyled mb-0">
            <li><a class="footer-link" href="#!">What We Do</a></li>
            <li><a class="footer-link" href="#!">Available Services</a></li>
            <li><a class="footer-link" href="#!">Latest Posts</a></li>
            <li><a class="footer-link" href="#!">FAQs</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h6 class="text-uppercase mb-3">Social media</h6>
          <ul class="list-unstyled mb-0">
            <li><a class="footer-link" href="#!">Twitter</a></li>
            <li><a class="footer-link" href="#!">Instagram</a></li>
            <li><a class="footer-link" href="#!">Tumblr</a></li>
            <li><a class="footer-link" href="#!">Pinterest</a></li>
          </ul>
        </div>
      </div>
      <div class="border-top pt-4" style="border-color: #1d1d1d !important">
        <div class="row">
          <div class="col-md-6 text-center text-md-start">
            <p class="small text-muted mb-0">&copy; 2023 All rights reserved.</p>
          </div>
          <div class="col-md-6 text-center text-md-end">
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- JavaScript files-->
  <script src="{{ url('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ url('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ url('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
  <script src="{{ url('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ url('frontend/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
  <script src="{{ url('frontend/js/front.js')}}"></script>
  {{-- Sweet Alert Cdn --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
  integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- jquery 3.3.1 -->
  <script src="{{ url('Admin/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>

    <!-- Added Permanently Csrf Token -->
    <script type="text/javascript">

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    </script>

  @yield('customJs')


  {{-- /* ===============================================================
PRODUCT ADD TO CART
=============================================================== */ --}}

  <script>

  function addToCart(id) {

        $.ajax({
            url: "{{ route('addToCart') }}",
            type: "POST",
            data: {id:id},
            dataType: "json",
            success: function (response) {

                if (response.status == true) {
                    window.location.href= "{{ route('cart') }}";

                } else {
                    alert(response.message);
                }

            }

        });
    }


    </script>


  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

  </script>

  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


</div>
</body>
</html>
