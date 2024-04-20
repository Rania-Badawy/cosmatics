@extends('user.layout')
@section('content')
        <div class="row d-flex" style="padding-top: 100px;">
            @include('errors.success')
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
                            @auth
                            <form action="{{url("addCart")}}" method="post">
                                @csrf
                                <input type="number" max="<?php echo $product['quantity']-$product['quantity_reserved'] ;?>" name="quantity" placeholder="Enter Quantity" ><br>
                                <input type="hidden" name="product_id" value="<?php echo $product['id'] ;?>"><br>
                                <input type="submit" name="submit"     value="Reserved">
                                </form>
                                @endauth
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
@endsection