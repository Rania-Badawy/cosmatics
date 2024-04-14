@extends('admin.layout')
@section('content')
<div class="container" style="margin-top: 20px;">
    <h3 style="text-align: center;color:red">All Categories</h3>
    @include('Errors.success')
  <a href="{{url("categories/add")}}" class="btn btn-primary">Add Category</a>
  <table class="table table-striped">
      <thead>
          <tr>
              <th>#</th>
              <th>Title</th>
              <th>Describtion</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
              
      </thead>
      <tbody>
          @foreach ($categories as $category)
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$category->name}}</td>
              <td>{{$category->desc}}</td>
              <td><a href="{{url("categories/edit/$category->id")}}" class="btn btn-success">Edit</a></td>
              <td>
                <form action="{{url("categories/delete/$category->id")}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure to delete')">Delete</button>
                </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    {{$categories->links()}}
  </div>
@endsection