<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.includes.style')
  <title>
    @yield('title')
  </title>
</head>
<body>
  <div class="container-scroller"> 
    @include('admin.includes.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('admin.includes.sidebar')
      @include('admin.includes.right-sidebar')
      @yield('pages.index')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('admin.includes.script')
</body>

</html>