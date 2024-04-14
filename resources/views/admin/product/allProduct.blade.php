@extends('admin.layout')
 @section('content')
 <div class="container" style="margin-top: 20px;">
    <h3>All Products</h3>
    @include('errors.success')
  <a href="{{url("products/add")}}" class="btn btn-primary">Add Product</a>
  <table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Image</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
            
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->category->name}}</td>
            <td>
                @if(isset($product->image))
                <img src="{{asset("storage/$product->image")}}" style="height: 50px;width: 50px;">
                @endif
             </td>
             <td><a href="{{url("products/show/$product->id")}}" class="btn btn-success">Show</a></td>
            <td><a href="{{url("products/edit/$product->id")}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{url("products/delete/$product->id")}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure to delete')">Delete</button>
                </form>
              </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    {{$products->links()}}
  </div>
  @endsection
