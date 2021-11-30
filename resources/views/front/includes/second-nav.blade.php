<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
      <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('user/home') ? 'active' : '' }}">
          <a href="{{ route('user-dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item {{ request()->is('user/profile') ? 'active' : '' }}">
          <a href="{{ route('user-profile') }}" class="nav-link"><i class="fas fa-user"></i><span>Profile</span></a>
        </li>
        <li class="nav-item {{ request()->is('user/qna') ? 'active' : '' }}">
          <a href="{{ route('user-qna') }}"class="nav-link"><i class="fas fa-question-circle"></i><span>Q&A</span></a>
        </li>
        <li class="nav-item {{ request()->is('user/informasi') ? 'active' : '' }}">
          <a href="{{ route('user-informasi') }}" class="nav-link"><i class="fas fa-leaf"></i><span>Informasi</span></a>
        </li>
      </ul>
    </div>
</nav>