@extends('admin.layout')
 @section('content')
 <div class="container" style="margin-top: 20px;">
    <h3 style="text-align: center;color:red">Show product</h3>
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text"  name="name" class="form-control"  value="{{$product->name}}">
      </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Describtion</label>
          <textarea name="desc" class="form-control" >{{$product->desc}}</textarea>
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Price</label>
          <input type="text"  name="price" class="form-control"  value="{{$product->price}}">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Quantity</label>
        <input type="text"  name="quantity" class="form-control"  value="{{$product->quantity}}">
    </div>
      <div class="mb-3">
        <label for="title" class="form-label">Category</label>
        <input type="text"  name="category_id" class="form-control"  value="{{$product->category->name}}">
    </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          @if(isset($product->image))
          <img src="{{asset("storage/$product->image")}}" style="height: 200px;width: 200px;">
          @endif
        </div>
  </div>
  @endsection
