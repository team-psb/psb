<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="https://mahirteknologi.com/" target="_blank">
          <img src="{{ asset('assets_new/logo/logo-l-rgb.png') }}" height="100%" alt="logo" />
          {{-- <img src="{{ asset('template/images/Pita_web_logo-1.png') }}" alt="logo" /> --}}
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">
            @php
              date_default_timezone_set("Asia/Jakarta");
              $b = time();
              $hour = date("G",$b);

              if ($hour >=0 && $hour <= 11)
              {
              echo "Selamat Pagi,";
              }
              elseif ($hour >=12 && $hour <= 14)
              {
              echo "Selamat Siang,";
              }
              elseif ($hour >=15 && $hour <= 17)
              {
              echo "Selamat Sore,";
              }
              elseif ($hour >=17 && $hour <= 18)
              {
              echo "Selamat Petang,";
              }
              elseif ($hour >=19 && $hour <= 23)
              {
              echo "Selamat Malam,";
              }
            @endphp


            <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
          <h3 class="welcome-sub-text">This system performance summary</h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item d-none d-lg-block">
          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
            <span class="input-group-addon input-group-prepend border-right">
              <span class="icon-calendar input-group-text calendar-icon"></span>
            </span>
            <input type="text" class="form-control">
          </div>
        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="{{ asset('template/images/faces/face8.jpg') }}" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="{{ asset('template/images/faces/face8.jpg') }}" alt="Profile image">
              <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
              <p class="fw-light text-muted mb-0">{{ Auth::user()->phone }}</p>
            </div>
            <form method="POST" action="{{ url('/logout') }}">
              @csrf
                  <a
                  class="dropdown-item"
                  href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                  this.closest('form').submit();">
                      <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>
                      <span class="menu-title">Sign Out</span>
                  </a>
          </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
</nav>
