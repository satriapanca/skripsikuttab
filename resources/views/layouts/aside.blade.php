<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/dist/img/no-photo.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <a href="#"><i class="fa fa-circle text-success"></i></a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        {!! get_menu() !!}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>