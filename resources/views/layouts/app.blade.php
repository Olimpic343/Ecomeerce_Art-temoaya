<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Art-Temoaya')</title>

    {{-- Aquí cargas todos tus CSS, etc. --}}
    @include('partials.head')
</head>
<body class="theme-color-2 bg-effect">

    {{-- Loader --}}
    @include('partials.loader')

    {{-- Header --}}
    @include('partials.header')

    {{-- Menú móvil --}}
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

    {{-- Aquí va el contenido de cada vista --}}
    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Items section (carrito lateral, etc.) --}}
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
            <br><br>
        </h6>

        <button onclick="location.href='{{ route('cart.index') }}';"
                class="btn item-button btn-sm fw-bold"
                id="total-uno">
            $ 00.00
        </button>
    </div>

    {{-- Bg overlay --}}
    <div class="bg-overlay"></div>

    {{-- jQuery y demás scripts globales de tu template --}}
    @include('partials.js')

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Tu script de carrito y sincronización --}}
    <script src="{{ asset('js/cart.js') }}"></script>
    <script>
        window.authUserId = {{ Auth::check() ? Auth::id() : 'null' }};
        window.syncCartWishlistUrl = "{{ route('sync.cart.wishlist') }}";
    </script>
    <script src="{{ asset('js/syncro.js') }}"></script>

    {{-- 1) Cargar Chart.js UNA sola vez, antes de cualquier script @push --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- 2) Aquí se inyectarán todos los bloques @push('scripts') de tus vistas --}}
    @stack('scripts')
</body>
</html>
