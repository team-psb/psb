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
{{-- <script src="{{ asset('template/js/dashboard.js') }}"></script> --}}
<script>
    $('#datepicker-popup').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
        });
        $("#datepicker-popup").datepicker("setDate", "0");
</script>
<script src="{{ asset('template/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/r-2.2.9/datatables.min.js"></script>



<script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        lengthMenu: [10, 20, 50, 100, 200, 500],
        'columnDefs': [ {
        'targets': [0], /* column index */
        'orderable': false, /* true or false */
            }]
        });
    } );
</script>

<script>
jQuery(document).ready(function($){
    $('#mymodal').on('show.bs.modal', function(e){
        var button = $(e.relatedTarget);
        var modal = $(this);

        modal.find('.modal-body').load(button.data('remote'));
        modal.find('.modal-title').html(button.data('title'));
    });
});
</script>

<div class="modal" id="mymodal" tabindex="-1">
    <div class="modal-dialog mt-4">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>

{{-- checkall --}}
<script type='text/javascript'>
    $(document).ready(function(){
      // Check or Uncheck All checkboxes
    $("#checkall").change(function(){
        var checked = $(this).is(':checked');
        if(checked){
            $(".checkbox").each(function(){
            $(this).prop("checked",true);
            });
        }else{
            $(".checkbox").each(function(){
            $(this).prop("checked",false);
            });
        }
        });

        // Changing state of CheckAll checkbox 
        $(".checkbox").click(function(){

        if($(".checkbox").length == $(".checkbox:checked").length) {
            $("#checkall").prop("checked", true);
        } else {
            $("#checkall").prop("checked", false);
        }

        });
    });
</script>