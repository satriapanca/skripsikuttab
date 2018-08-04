<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('layouts.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('layouts.aside')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title', 'Pages')
        <small>@yield('small_title')</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('errors')

      @yield('contents')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; {{ date('Y') > 2018 ? '2018-'.date('Y') : date('Y') }} <a href="#">Kuttab Al-Fatih</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<script src="{{ asset('admin/dist/js/laravel.js') }}"></script>
<script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
$(document).ready(function () {
	$('#tanggal_lahir').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		startDate: new Date('1970-01-02'),
		endDate: new Date('2038-01-18'),
		defaultViewDate: { year: 1970, month: 0, day: 1 },
		disableTouchKeyboard: true
	});
});
</script>

@yield('custom_js')
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!!Toastr::message()!!}
</body>
</html>