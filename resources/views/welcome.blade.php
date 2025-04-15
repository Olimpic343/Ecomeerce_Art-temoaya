@extends('layouts.app')
@section('title', 'inicio')
@section('content')
 <!-- home section start -->
 @include('partials.home')
<!-- Home Section End -->
<!-- Category Section Start -->
@include('partials.category')
<!-- Category Section End -->
<!-- Value Section Start -->
@include('partials.value')
<!-- Value Section End -->
<!-- Banner Section Start -->
@include('partials.banner1')
<!-- Banner Section End -->
<!-- Banner Section Start -->
@include('partials.banner2')
<!-- Banner Section End -->
<!-- Product Section Start -->
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Top Products</h2>
        </div>

        <div class="slider-6 img-slider slick-slider-1 arrow-slider">
            <div>
                <div class="product-box-4 wow fadeInUp">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/1.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Eggplant</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="product-image">
                        <div class="label-flex">
                            <div class="discount">
                                <label>-25%</label>
                            </div>

                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/18.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Ginger</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-box-4 wow fadeInUp">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/2.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Eggplant</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/4.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Potato</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-box-4 wow fadeInUp">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/3.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Onion</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/6.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Broccoli</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-box-4 wow fadeInUp">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/10.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Pea</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="product-image">
                        <div class="label-flex">
                            <div class="discount">
                                <label>50%</label>
                            </div>

                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/17.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Cabbage</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-box-4 wow fadeInUp">
                    <div class="product-image">
                        <div class="label-flex">
                            <div class="discount">
                                <label>-25%</label>
                            </div>

                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/13.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Strawberry</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="product-image">
                        <div class="label-flex">
                            <div class="discount">
                                <label>50%</label>
                            </div>

                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/11.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Cucumber</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-box-4 wow fadeInUp">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/8.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Apple</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/16.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Blackberry</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-box-4 wow fadeInUp">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/9.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Apple</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/12.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Bell pepper</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-box-4 wow fadeInUp">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/2.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Eggplant</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/4.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Potato</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-box-4 wow fadeInUp">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/6.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Broccoli</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="product-image">
                        <div class="label-flex">
                            <button class="btn p-0 wishlist btn-wishlist notifi-wishlist">
                                <i class="iconly-Heart icli"></i>
                            </button>
                        </div>

                        <a href="product-left-thumbnail.html">
                            <img src="../assets/images/veg-3/cate1/11.png" class="img-fluid" alt="">
                        </a>

                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                        </ul>
                        <a href="product-left-thumbnail.html">
                            <h5 class="name">Cucumber</h5>
                        </a>
                        <h5 class="price theme-color">$70.21<del>$65.25</del></h5>
                        <div class="price-qty">
                            <div class="counter-number">
                                <div class="counter">
                                    <div class="qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                    <div class="qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button class="buy-button buy-button-2 btn btn-cart">
                                <i class="iconly-Buy icli text-white m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<!-- Newsletter Section Start -->
@include('partials.news')
@endsection


