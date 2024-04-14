@extends('admin.layout')
@section('content')
<div class="container" style="margin-top: 20px;">
    <h3 style="text-align: center;color:red">Edit Category</h3>
    @include('Errors.error')
    <form action="{{url("categories/update/$category->id")}}" method="post" enctype="multipart/form-data" >
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" id="title" name="name" class="form-control" placeholder="Enter Title" value="{{$category->name}}">
      </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Describtion</label>
          <textarea name="desc" class="form-control" placeholder="Enter Describtion">{{$category->desc}}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection