@extends('admin.layout')
 @section('content')
 <div class="container" style="margin-top: 20px;">
    <h3 style="text-align: center;color:red">Add Category</h3>
    @include('errors.error')
    <form action="{{url("categories/insert")}}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter Title" value="{{old('name')}}">
      </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Describtion</label>
          <textarea name="desc" class="form-control" placeholder="Enter Describtion">{{old('desc')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  @endsection
