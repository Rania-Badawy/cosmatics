@extends('admin.layout')
@section('content')
<div class="container" style="margin-top: 20px;">
    <h3 style="text-align: center;color:red">Edit Contact</h3>
    @include('Errors.error')
    <form action="{{url("contacts/update")}}" method="post" enctype="multipart/form-data" >
      @csrf
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text"  name="address" class="form-control" placeholder="Enter address" value="{{$contact->address}}">
    </div>
      <div class="mb-3">
        <label for="phone" class="form-label">phone</label>
        <input type="text" name="phone" class="form-control" placeholder="Enter phone" value="{{$contact->phone}}"></input>
      </div>
      <div class="mb-3">
        <label for="whatsapp" class="form-label">whatsapp</label>
        <input type="text"  name="whatsapp" class="form-control" placeholder="Enter whatsapp" value="{{$contact->whatsapp}}">
    </div>
      <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="text" name="email" class="form-control" placeholder="Enter email" value="{{$contact->email}}"></input>
      </div>
      <div class="mb-3">
        <label for="twitter" class="form-label">twitter</label>
        <input type="text"  name="twitter" class="form-control" placeholder="Enter twitter" value="{{$contact->twitter}}">
    </div>
      <div class="mb-3">
        <label for="facebook" class="form-label">facebook</label>
        <input type="text" name="facebook" class="form-control" placeholder="Enter facebook" value="{{$contact->facebook}}"></input>
      </div>
      <div class="mb-3">
        <label for="instagram" class="form-label">instagram</label>
        <input type="text" name="instagram" class="form-control" placeholder="Enter instagram" value="{{$contact->instagram}}"></input>
      </div>
      <div class="mb-3">
        <label for="youtube" class="form-label">youtube</label>
        <input type="text" name="youtube" class="form-control" placeholder="Enter youtube" value="{{$contact->youtube}}"></input>
      </div>
      <div class="mb-3">
        <label for="snapchat" class="form-label">snapchat</label>
        <input type="text" name="snapchat" class="form-control" placeholder="Enter snapchat" value="{{$contact->snapchat}}"></input>
      </div>
      <div class="mb-3">
        <label for="google_plus" class="form-label">google_plus</label>
        <input type="text" name="google_plus" class="form-control" placeholder="Enter google_plus" value="{{$contact->google_plus}}"></input>
      </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection