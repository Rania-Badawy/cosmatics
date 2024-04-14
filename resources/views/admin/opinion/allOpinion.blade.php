@extends('admin.layout')
 @section('content')
 <div class="container" style="margin-top: 20px;">
    <h3>All opinions</h3>
    @include('errors.success')
  <a href="{{url("opinions/add")}}" class="btn btn-primary">Add opinion</a>
  <table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
            
    </thead>
    <tbody>
        @foreach ($opinions as $opinion)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$opinion->name}}</td>
            <td>
                @if(isset($opinion->image))
                <img src="{{asset("storage/$opinion->image")}}" style="height: 50px;width: 50px;">
                @endif
             </td>
             <td><a href="{{url("opinions/show/$opinion->id")}}" class="btn btn-success">Show</a></td>
            <td><a href="{{url("opinions/edit/$opinion->id")}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{url("opinions/delete/$opinion->id")}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure to delete')">Delete</button>
                </form>
              </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    {{$opinions->links()}}
  </div>
  @endsection
