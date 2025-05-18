
@extends('layouts.app')

@section('title','Inicio')

@section('content')
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2>🛒 Checkout</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-lg-8">
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <ul>
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="../../ggihhudh.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a" class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Direccion de Envio</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                  <div class="col-xxl-6 col-lg-12 col-md-6">
                                                    <div class="delivery-address-box">
                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="jack" id="flexRadioDefault2" checked="checked">
                                                            </div>

                                                            <ul class="delivery-address-detail">
                                                                <li>
                                                                    <h4 class="fw-500">Adress</h4>
                                                                </li>

                                                                <li>
                                                                    <p class="text-content"><span class="text-title">Ciudad:</span>Nakhimovskiy R-N / Lastovaya Ul.,
                                                                        bld. 5/A, appt. 12
                                                                    </p>
                                                                </li>

                                                                <li>
                                                                    <h6 class="text-content"><span class="text-title">Estado:</span>
                                                                        +380</h6>
                                                                </li>

                                                                <li>
                                                                    <h6 class="text-content mb-0"><span class="text-title">Codigo Postal:</span> + 380 (0564) 53 - 29 - 68</h6>
                                                                </li>

                                                                 <li>
                                                                    <h6 class="text-content"><span class="text-title">Pais:</span>
                                                                        +380</h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                                    <div class="delivery-address-box">
                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="jack" id="flexRadioDefault2" checked="checked">
                                                            </div>

                                                            <ul class="delivery-address-detail">
                                                                <li>
                                                                    <h4 class="fw-500">Adress</h4>
                                                                </li>

                                                                <li>
                                                                    <p class="text-content"><span class="text-title">Ciudad:</span>Nakhimovskiy R-N / Lastovaya Ul.,
                                                                        bld. 5/A, appt. 12
                                                                    </p>
                                                                </li>

                                                                <li>
                                                                    <h6 class="text-content"><span class="text-title">Estado:</span>
                                                                        +380</h6>
                                                                </li>

                                                                <li>
                                                                    <h6 class="text-content mb-0"><span class="text-title">Codigo Postal:</span> + 380 (0564) 53 - 29 - 68</h6>
                                                                </li>

                                                                 <li>
                                                                    <h6 class="text-content"><span class="text-title">Pais:</span>
                                                                        +380</h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="../../oaflahpk.json" trigger="loop-on-hover" colors="primary:#0baf9a" class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Opcion de envio</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                <div class="col-xxl-12">
                                                    <div class="delivery-option">
                                                        <div class="delivery-category">
                                                            <div class="shipment-detail">
                                                                <div class="form-check custom-form-check hide-check-box">
                                                                    <input class="form-check-input" type="radio" name="standard" id="standard" checked="">
                                                                    <label class="form-check-label" for="standard">Envio Standard</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 future-box">
                                                    <div class="future-option">
                                                        <div class="row g-md-0 gy-4">
                                                            <div class="col-md-6">
                                                                <div class="delivery-items">
                                                                    <div>
                                                                        <h5 class="items text-content"><span>3
                                                                                Items</span>@
                                                                            $693.48</h5>
                                                                        <h5 class="charge text-content">Delivery Charge
                                                                            $34.67
                                                                            <button type="button" class="btn p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Extra Charge">
                                                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                                            </button>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <form class="form-floating theme-form-floating date-box">
                                                                    <input type="date" class="form-control">
                                                                    <label>Select Date</label>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="../../qmcsqnle.json" trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a" class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Pagar</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place Order</button>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <div class="summery-header">
                                <h3>Order Summery</h3>
                            </div>

                            <ul class="summery-contain">
                                <li>
                                    <img src="../assets/images/vegetable/product/1.png" class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Bell pepper <span>X 1</span></h4>
                                    <h4 class="price">$32.34</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/2.png" class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Eggplant <span>X 3</span></h4>
                                    <h4 class="price">$12.23</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/3.png" class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Onion <span>X 2</span></h4>
                                    <h4 class="price">$18.27</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/4.png" class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Potato <span>X 1</span></h4>
                                    <h4 class="price">$26.90</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/5.png" class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Baby Chili <span>X 1</span></h4>
                                    <h4 class="price">$19.28</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/6.png" class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Broccoli <span>X 2</span></h4>
                                    <h4 class="price">$29.69</h4>
                                </li>
                            </ul>

                            <ul class="summery-total">
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">$111.81</h4>
                                </li>

                                <li>
                                    <h4>Shipping</h4>
                                    <h4 class="price">$8.90</h4>
                                </li>


                                <li class="list-total">
                                    <h4>Total (MXN)</h4>
                                    <h4 class="price">$19.28</h4>
                                </li>
                            </ul>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout section End -->


@endsection


