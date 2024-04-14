@extends('user.layout')
@section('content')
<section class="hero-wrap js-fullheight" style="background-image: url('user/images/hero.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-10 ftco-animate text-center">
                <div class="icon">
                    <span class="flaticon-lotus"></span>
                </div>
                <h1>CRC Cosmatics Center</h1>
                <div class="row justify-content-center">
                    <div class="col-md-7 mb-3">
                        <p style="color:black">The New Beauty Collection</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-counter img" id="section-counter" style="background-image: url(user/images/bg_3.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="1000">0</strong>
                                <span>Happy Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="100">0</strong>
                                <span>Products</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="10">0</strong>
                                <span>Years of Experience</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="30">0</strong>
                                <span>Our Branches</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-section-services bg-light">
    <div class="row heading-section ftco-animate justify-content-center pb-3">
        <h3 class="subheading" style="font-size: xx-large;margin-top: 40px;">WHY CHOOSE US</h3>
    </div>
    <div class="container-fluid px-md-5">
        <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="services text-center ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-candle"></span>
                        </div>
                        <div class="text mt-3">
                            <h3>Fast Delivery</h3>
                            <p>Delivery time can be a source of stress for the customer. The faster it is, the less customers will give up their shopping cart and the more they will come back. Thanks to fast delivery options your e-commerce will be more competitive.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="services text-center ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-beauty-treatment"></span>
                        </div>
                        <div class="text mt-3">
                            <h3>Free Shipping</h3>
                            <p>free shipping on all orders for limit time</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="services text-center ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-stone"></span>
                        </div>
                        <div class="text mt-3">
                            <h3>Easy Returns</h3>
                            <p> Easy to return product you deliever </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
@endsection
