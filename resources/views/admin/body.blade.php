@php
 $contact=\App\Models\Contact::first(); 
 $subQuery = \App\Models\Email::selectRaw('MAX(id) as id')
                             ->groupBy('email');
 $mails = \App\Models\Email::joinSub($subQuery, 'sub', function($join) {
                $join->on('emails.id', '=', 'sub.id');
            })
            ->select('emails.name', 'emails.email', 'emails.subject', 'emails.message')
            ->get();
$category = \App\Models\Category::count();
$product = \App\Models\Product::count();
$opinion = \App\Models\Opinion::count();
$email = \App\Models\Email::count();
           
@endphp
<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card corona-gradient-card">
        <div class="card-body py-0 px-0 px-sm-3">
          <div class="row align-items-center">
            <div class="col-4 col-sm-3 col-xl-2">
              <img src="{{asset('user')}}/images/hero.jpg" class="gradient-corona-img img-fluid" alt="">
            </div>
            <div class="col-5 col-sm-7 col-xl-8 p-0">
              <h4 class="mb-1 mb-sm-0">Welcome Mr {{Auth::user()->name}}</h4>
            </div>
            <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">{{$category}}</h3>
                <p class="text-success ms-2 mb-0 font-weight-medium">Category</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <a href="{{url('categories')}}"><span class="mdi mdi-arrow-top-right icon-item"></span></a>
                
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">All Categories</h6>
        </div>
      </div>
    </div>
    
    <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">{{$product}}</h3>
                <p class="text-success ms-2 mb-0 font-weight-medium">Product</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <a href="{{url('products')}}"><span class="mdi mdi-arrow-top-right icon-item"></span></a>
                
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">All Products</h6>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">{{$opinion}}</h3>
                <p class="text-success ms-2 mb-0 font-weight-medium">Opinion</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <a href="{{url('opinions')}}"><span class="mdi mdi-arrow-top-right icon-item"></span></a>
                
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">All Opinions</h6>
        </div>
      </div>
    </div>

  </div>
 
 
  <div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Mails</h4></h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Client Name </th>
                  <th> Email </th>
                  <th> Subject </th>
                  <th> Message </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mails as $item)
                <tr>
                  <td> {{$item->name}} </td>
                  <td> {{$item->email}} </td>
                  <td> {{$item->subject}} </td>
                  <td> {{$item->message}} </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Visitors by Countries</h4>
          <div class="row">
            
            {{-- <div class="col-md-7">
              <div id="audience-map" class="vector-map"></div>
            </div> --}}
            <div class="map">             
              <iframe style="width:100%;height:300px" id="gmap_canvas" src="{{$contact->map}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>