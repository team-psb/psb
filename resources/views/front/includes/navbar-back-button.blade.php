<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <div class="container d-flex justify-content-between">
    <a href="{{ route('user-dashboard') }}" class="navbar-brand sidebar-gone-hide"><img width="80px" src="{{ asset('assets_new/logo/logo-bw-l.png') }}" alt=""></a>
    <div class="navbar-nav d-flex align-items-center">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars" style="font-size: 24px;"></i></a>
    </div>
    <div class="d-flex align-items-center">
        <div class="except-xl btn text-white" onclick="history.back()"><i class="fas fa-chevron-left"></i> Back</div>
        <a href="{{ route('user-dashboard') }}" class="except-xl btn text-white"><i class="fas fa-home"></i> Home</a>
    </div>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ Avatar::create(Auth::user()->name)->toGravatar(['d' => 'wavatar', 'r' => 'pg', 's' => 100])}}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Login {{ \Carbon\Carbon::parse(Auth::user()->last_login)->diffForHumans() }}</div>
          <div class="dropdown-divider"></div>
            <form method="POST" action="{{ url('/logout') }}">
              @csrf
                  <a
                  class="dropdown-item has-icon text-danger"
                  href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                  this.closest('form').submit();">
                      <i class="fas fa-sign-out-alt"></i> Logout
                  </a>
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
