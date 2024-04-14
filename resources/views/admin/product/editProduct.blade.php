@extends('admin.layout')
 @section('content')
 <div class="container" style="margin-top: 20px;">
    <h3 style="text-align: center;color:red">Edit product</h3>
    @include('Errors.error')
    <form action="{{url("products/update/$product->id")}}" method="post" enctype="multipart/form-data" >
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text"  name="name" class="form-control" placeholder="Enter Title" value="{{$product->name}}">
          {{-- @error('title')
             {{$message}} 
          @enderror --}}
      </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Describtion</label>
          <textarea name="desc" class="form-control" placeholder="Enter Describtion">{{$product->desc}}</textarea>
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Price</label>
          <input type="text"  name="price" class="form-control" placeholder="Enter Price" value="{{$product->price}}">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Quantity</label>
        <input type="text"  name="quantity" class="form-control" placeholder="Enter quantity" value="{{$product->quantity}}">
    </div>
      <div class="mb-3">
        <label for="title" class="form-label">Category</label>
        <select name="category_id" class="form-control">
          @foreach ($categories as $category)
          <option value="{{$category->id}}" <?php if($product->category_id==$category->id){ echo "selected";}?>>{{$category->name}}</option>
          @endforeach
          
        </select>
    </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" name="image" class="form-control" >
          @if(isset($product->image))
          <img src="{{asset("storage/$product->image")}}" style="height: 50px;width: 50px;">
          @endif
        </div>
        <div class="mb-3">
          <input type="checkbox" id="offerCheckbox" name="offer" onclick="toggleNewPriceInput()" value="1" @if($product->offer==1) checked @endif>
          <label for="offerCheckbox">Offer</label>
          
          <div id="newPriceInput" @if($product->offer!=1) style="display: none;" @endif>
              <input type="text" name="new_price" class="form-control" placeholder="Enter new Price" value="{{$product->new_price}}">
          </div>
      </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <script>
    function toggleNewPriceInput() {
        var offerCheckbox = document.getElementById('offerCheckbox');
        var newPriceInput = document.getElementById('newPriceInput');
  
        if (offerCheckbox.checked) {
            newPriceInput.style.display = 'block';
        } else {
            newPriceInput.style.display = 'none';
        }
    }
  </script>
  @endsection
