  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li>
          <a href="{{route('dashboard')}}">
            <i class="fa fa-th"></i> <span>dashboard</span>
          </a>
        </li>

        <li>

            <a href="{{route('users.index')}}">
              <i class="fa fa-user" aria-hidden="true"> </i><span>users</span>
            </a>
          </li>
        <li>
            <a href="{{route('languages.index')}}">
              <i class="fa fa-globe"></i> <span>Langauge</span>
            </a>
          </li>

          <li>

          <a href="{{route('cities.index')}}">
            <i class="fa fa-globe" aria-hidden="true"> </i><span>cities</span>
          </a>
        </li>

          <li>
          <a href="{{route('places.index')}}">
            <i class="fa fa-list-alt" aria-hidden="true"> </i><span>places</span>
          </a>
        </li>


          <li>
          <a href="{{route('sculptures.index')}}">
            <i class="fa fa-list-alt" aria-hidden="true"> </i><span>sculptures</span>
          </a>
        </li>


          <li>
          <a href="{{route('discriptions.index')}}">
            <i class="fa fa-list-alt" aria-hidden="true"> </i><span>discriptions</span>
          </a>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
