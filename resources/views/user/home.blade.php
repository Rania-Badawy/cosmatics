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

<section class="ftco-section bg-light pt-5">
    <div class="container">
        <div class="row heading-section ftco-animate justify-content-center pb-3">
            <h3 class="subheading">Our Products</h3>
        </div>
        @foreach($categories as $category)
        @php
        $products=\App\Models\Product::where('category_id',$category->id)->latest()->take(3)->paginate(3); 
        @endphp
        <h2 class="row justify-content-center mb-2 pb-3">{{$category->name}}</h2>
        <div class="row d-flex">
            @if(!$products->isEmpty())
            @foreach($products as $product)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a  class="block-20" style="height: 500px; width: 400px;background-image: url('{{asset("storage/$product->image")}}');">
                    </a>

                    <div class="text p-4 float-right d-block">
                        <div class="d-flex align-items-center pt-2 mb-4">
                            <div class="one" style="width: auto;">
                                <span class="day">{{$product->name}}</span>
                            </div>
                        </div>
                        
                        <p>{{$product->desc}}</p>
                            <h3 class="heading mt-2">{{$product->price}}</h3>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @endforeach
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="row heading-section ftco-animate justify-content-center pb-3">
        <h3 class="subheading" style="font-size: xx-large;margin-top: 40px;">Offers</h3>
    </div>
    <div class="container">
        <div class="row no-gutters">
            @foreach($products_offer as $offer)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="offer-deal text-center px-2 px-lg-5">
                    <div class="img" style="background-image: url('{{asset("storage/$offer->image")}}');"></div>
                    <div class="text mt-4">
                        <h3 class="mb-4">{{$offer->name}}</h3>
                        <p class="mb-5">{{$offer->desc}}</p>
                        <p>
                            <del style="padding-right: 20px;">{{$offer->price}}</del>
                            <b>{{$offer->new_price}}</b>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-10 heading-section ftco-animate text-center">
                <h3 class="subheading">Testimony</h3>
                <h2 class="mb-1">Customer opinions</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach($opinions as $opinion)
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="text">
                                <div class="line pl-5">
                                    <p class="mb-4 pb-1">{{$opinion->desc}}</p>
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url('{{asset("storage/$opinion->image")}}')">
                                    </div>
                                    <div class="ml-4">
                                        <p class="name">{{$opinion->name}}</p>
                                        <span class="position">Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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



<section class="ftco-gallery ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h3 class="subheading">Gallery</h3>
                <h2 class="mb-1">See the latest products</h2>
            </div>
        </div>
        <div class="row">
            @foreach($latest_products as $value)
            <div class="col-md-3 ftco-animate">
                <a href="{{asset("storage/$value->image")}}" class="gallery image-popup img d-flex align-items-center"
                    style="background-image: url({{asset("storage/$value->image")}});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection