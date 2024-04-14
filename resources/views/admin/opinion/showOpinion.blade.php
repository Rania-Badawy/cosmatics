@extends('admin.layout')
 @section('content')
 <div class="container" style="margin-top: 20px;">
    <h3 style="text-align: center;color:red">Show Opinion</h3>
        <div class="mb-3">
          <label for="title" class="form-label">Name</label>
          <input type="text"  name="name" class="form-control"  value="{{$opinion->name}}">
      </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Describtion</label>
          <textarea name="desc" class="form-control" >{{$opinion->desc}}</textarea>
        </div>
       
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          @if(isset($opinion->image))
          <img src="{{asset("storage/$opinion->image")}}" style="height: 200px;width: 200px;">
          @endif
        </div>
  </div>
  @endsection
