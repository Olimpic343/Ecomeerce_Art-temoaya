
        <!DOCTYPE html>
<html lang="en">

<head>

    <title>Art-Temoaya</title>
     @include('partials.head')

</head>

<body class="theme-color-2 bg-effect">

    <!-- Loader Start -->
@include('partials.loader')
    <!-- Loader End -->

    <!-- Header Start -->
   @include('partials.header')
    <!-- Header End -->

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist.html" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->


     @yield('content')



    <!-- Newsletter Section End -->
    <!-- Footer Start -->
@include('partials.footer')
    <!-- Footer End -->

    <!-- Items section Start -->
    <div class="button-item">
        <button class="item-btn btn text-white">
            <i class="iconly-Bag-2 icli"></i>
        </button>
    </div>
    <div class="item-section">
        <button class="close-button">
            <i class="fas fa-times"></i>
        </button>
        <h6>
            <i class="iconly-Bag-2 icli"></i>
            <span id="cart-count-dos">0</span>
            <br>
            <br>
        </h6>

        <button onclick="location.href = '{{ route('cart.index') }}';" class="btn item-button btn-sm fw-bold" id="total-uno">$ 00.00</button>
    </div>
    <!-- Items section End -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    @include('partials.js')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ asset('js/cart.js') }}"></script>

    <script>
        window.authUserId = {{ Auth::check() ? Auth::id() : 'null' }};
        window.syncCartWishlistUrl = "{{ route('sync.cart.wishlist') }}";

    </script>
    <script src="{{ asset('js/syncro.js') }}"></script>
</body>

</html>
