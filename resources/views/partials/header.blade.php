<header class="header-2">
    <div class="header-notification theme-bg-color overflow-hidden py-2">




        <div class="notification-slider">
            <div>
                <div class="timer-notification text-center">
                    <h6><strong class="me-1">Bienvenido a ArtTemoaya</strong><strong class="ms-1">
                        </strong>
                    </h6>
                </div>
            </div>

            <div>
                <div class="timer-notification text-center">
                    <h6>Encuentra productos artesanales de todo tipo!<a href="shop-left-sidebar.html" class="text-white"></a>
                    </h6>
                </div>
            </div>
        </div>

    </div>




    <div class="top-nav top-header sticky-header sticky-header-3">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-block p-0 me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="iconly-Category icli theme-color"></i>
                            </span>
                        </button>
                        <a href="{{ route('home') }}" class="web-logo nav-logo">
                            <img src="{{ asset ('assets/images/logo/art_logo.png')}}" class="img-fluid blur-up lazyload" alt="">
                        </a>

                        <div class="search-full">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i data-feather="search" class="font-light"></i>
                                </span>
                                <input type="text" class="form-control search-type" placeholder="Search here..">
                                <span class="input-group-text close-search">
                                    <i data-feather="x" class="font-light"></i>
                                </span>
                            </div>
                        </div>

                        <div class="middle-box">
                            <div class="center-box">
                                <div class="searchbar-box order-xl-1 d-none d-xl-block">
                                <form action="{{ route('shop.index') }}" method="GET" class="search-form">
                                        <input type="text" name="search" class="form-control" placeholder="Buscar productos..."
                                            value="{{ request('search') }}">
                                        <button type="submit" class="btn search-button">
                                            <i class="iconly-Search icli"></i>
                                        </button>
                                </form>

                                </div>

                            </div>
                        </div>

                        <div class="rightside-menu">

                            <div class="option-list">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="header-icon user-icon search-icon">
                                            <i class="iconly-Profile icli"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)" class="header-icon search-box search-icon">
                                            <i class="iconly-Search icli"></i>
                                        </a>
                                    </li>



                                    <li class="onhover-dropdown position-relative">
                                        <a href="{{ route('wishlist.index') }}" class="header-icon swap-icon position-relative">
                                            <i class="iconly-Heart icli"></i>
                                            <small id="wishlist-count" class="badge-number badge bg-theme position-absolute top-0 start-100 translate-middle">0</small>
                                        </a>
                                    </li>


                                    <li class="onhover-dropdown">
                                        <a href="{{ route('cart.index') }}" class="header-icon bag-icon">
                                            <small id="cart-count-uno" class="badge-number">2</small>
                                            <i class="iconly-Bag-2 icli"></i>
                                        </a>



                                    </li>


                                    <li class="onhover-dropdown">
                                        <a href="javascript:void(0)" class="header-icon swap-icon">
                                            <i class="iconly-Profile icli"></i>
                                        </a>

                                    </li>

                                    <li class="right-side onhover-dropdown">
                                        <div class="delivery-login-box">

                                            <div class="delivery-detail">
                                                <h6>Hola,</h6>
                                                <h5>{{ Auth::user()->name ?? 'Mi Cuenta'}}</h5>
                                            </div>
                                        </div>

                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">

                                                @guest
                                                    <!-- Usuario NO autenticado -->
                                                    <li class="product-box-contain">
                                                        <a href="{{ route('login') }}">Iniciar sesión</a>
                                                    </li>
                                                    <li class="product-box-contain">
                                                        <a href="{{ route('register') }}">Registrarse</a>
                                                    </li>

                                                @else
                                                    <!-- Usuario autenticado -->
                                                    <li class="product-box-contain">
                                                        <span>Hola, {{ Auth::user()->name }}</span>
                                                    </li>
                                                    <li class="product-box-contain">

                                                        <a href="{{ route('dashboard') }}">Perfil</a>

                                                    </li>
                                                    <li class="product-box-contain">
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger">Cerrar sesión</button>
                                                        </form>
                                                    </li>
                                                @endguest

                                            </ul>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
