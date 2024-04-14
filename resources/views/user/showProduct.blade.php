@extends('user.layout')
@section('content')
        <div class="row d-flex" style="padding-top: 100px;">
            @if(!$products->isEmpty())
            @foreach($products as $product)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end" style="margin: 30px;">
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
@endsection