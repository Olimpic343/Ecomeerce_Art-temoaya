<header class="header-2">
    <div class="header-notification theme-bg-color overflow-hidden py-2">




        <div class="notification-slider">
            <div>
                <div class="timer-notification text-center">
                    <h6><strong class="me-1">Bienvenido a ArtTemoaya</strong>nuevas ofertas y regalos.<strong class="ms-1">New Coupon Code: Fast024
                        </strong>
                    </h6>
                </div>
            </div>

            <div>
                <div class="timer-notification text-center">
                    <h6>Something you love is now on sale!<a href="shop-left-sidebar.html" class="text-white">Buy
                            Now
                            !</a>
                    </h6>
                </div>
            </div>
        </div>
        <button class="btn close-notification"><span>Close</span> <i class="fas fa-times"></i></button>
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
                        <a href="index.html" class="web-logo nav-logo">
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
                                    <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="search for product, delivered to your door...">
                                    <button class="btn search-button">
                                        <i class="iconly-Search icli"></i>
                                    </button>
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



                                    <li class="onhover-dropdown">
                                        <a href="javascript:void(0)" class="header-icon swap-icon">
                                            <i class="iconly-Heart icli"></i>
                                        </a>

                                    </li>

                                    <li class="onhover-dropdown">
                                        <a href="cart.html" class="header-icon bag-icon">
                                            <small class="badge-number">2</small>
                                            <i class="iconly-Bag-2 icli"></i>
                                        </a>
                                        <div class="onhover-div">
                                            <ul class="cart-list">
                                                <li>
                                                    <div class="drop-cart">
                                                        <a href="product-left-thumbnail.html" class="drop-image">
                                                            <img src="../assets/images/vegetable/product/1.png" class="blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="drop-contain">
                                                            <a href="product-left-thumbnail.html">
                                                                <h5>Fantasy Crunchy Choco Chip Cookies</h5>
                                                            </a>
                                                            <h6><span>1 x</span> $80.58</h6>
                                                            <button class="close-button">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="drop-cart">
                                                        <a href="product-left-thumbnail.html" class="drop-image">
                                                            <img src="../assets/images/vegetable/product/2.png" class="blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="drop-contain">
                                                            <a href="product-left-thumbnail.html">
                                                                <h5>Peanut Butter Bite Premium Butter Cookies 600 g
                                                                </h5>
                                                            </a>
                                                            <h6><span>1 x</span> $25.68</h6>
                                                            <button class="close-button">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>


                                            <div class="price-box">
                                                <h5>Price :</h5>
                                                <h4 class="theme-color fw-bold">$106.58</h4>
                                            </div>

                                            <div class="button-group">
                                                <a href="cart.html" class="btn btn-sm cart-button">View Cart</a>
                                                <a href="checkout.html" class="btn btn-sm cart-button theme-bg-color
                                                text-white">Checkout</a>
                                            </div>
                                        </div>
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

                                                        <a href="#">Perfil</a>

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
