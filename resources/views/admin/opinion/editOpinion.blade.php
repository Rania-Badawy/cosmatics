@extends('admin.layout')
 @section('content')
 <div class="container" style="margin-top: 20px;">
    <h3 style="text-align: center;color:red">Edit opinion</h3>
    @include('Errors.error')
    <form action="{{url("opinions/update/$opinion->id")}}" method="post" enctype="multipart/form-data" >
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Name</label>
          <input type="text"  name="name" class="form-control" placeholder="Enter Title" value="{{$opinion->name}}">
      </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Describtion</label>
          <textarea name="desc" class="form-control" placeholder="Enter Describtion">{{$opinion->desc}}</textarea>
        </div>
       
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" name="image" class="form-control" >
          @if(isset($opinion->image))
          <img src="{{asset("storage/$opinion->image")}}" style="height: 50px;width: 50px;">
          @endif
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  
  @endsection
