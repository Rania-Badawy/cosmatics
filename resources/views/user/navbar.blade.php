<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand"><span class="flaticon-lotus"></span></a>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{url("about")}}" class="nav-link">About</a></li>
                @php
                $categories = \App\Models\Category::all();
                @endphp
                @foreach ($categories as $item)
                <li class="nav-item"><a href="{{url("showProducts/$item->id")}}" class="nav-link">{{$item->name}}</a></li>
                @endforeach
                <li class="nav-item"><a href="{{url("contact")}}" class="nav-link">Contact</a></li>
                @guest
                <li class="nav-item"><a href="{{url('login')}}" class="nav-link">Login</a></li>
                @endguest
                @auth
                @if(Auth::user()->role==1)
                <li class="nav-item"><a href="{{url('admin_dashboard')}}" class="nav-link">dashboard</a></li>
                @endif
                <li class="nav-item"><a href="{{url('carts')}}" class="nav-link">carts</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->