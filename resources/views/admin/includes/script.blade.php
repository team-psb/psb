  <!-- plugins:js -->
  <script src="{{ asset('template/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('template/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('template/vendors/progressbar.js/progressbar.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('template/js/off-canvas.js') }}"></script>
  <script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('template/js/template.js') }}"></script>
  <script src="{{ asset('template/js/settings.js') }}"></script>
  <script src="{{ asset('template/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('template/js/dashboard.js') }}"></script>
  <script src="{{ asset('template/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/r-2.2.9/datatables.min.js"></script>
  <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>