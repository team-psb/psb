<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    @yield('title')
  </title>
  @stack('before-style')
  @include('admin.includes.style')
  @stack('after-style')
  
</head>
<body>
  <div class="container-scroller"> 
    @include('admin.includes.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('admin.includes.sidebar')
      @include('admin.includes.right-sidebar')
      @yield('content')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @stack('before-script')
  @include('admin.includes.script')
  @stack('after-script')
</body>

</html>