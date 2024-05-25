<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('admin/assets')}}/images/logo-mini.svg"
        alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">

      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
          <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="{{asset('admin/assets')}}/images/faces/face23.jpg" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name">{{Auth::user()->name}}</p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item" href="logout">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-logout text-danger"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Log out</p>
            </div>
          </a>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <?php if(session()->has("lang") && session()->get("lang")=="ar"){ ?>
      <li class="nav-item dropdown d-none d-lg-block">
        <a href="change/en">English</a>
      </li>
      <?php }else{ ?>
      <li class="nav-item dropdown d-none d-lg-block p-5">
        <a href="change/ar">العربية</a>
      </li>
      <?php } ?>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>