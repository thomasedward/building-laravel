<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        
        لوحة تحكم الموقع |
       {{ getsetting() }} 
        @yield('title')

    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    
    <!-- Bootstrap 3.3.5 -->
    {!! Html::style('admin/bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
        {!! Html::style('admin/bootstrap/css/font-awesome.css') !!}
    <!-- Ionicons -->
    <!-- download -->

        {!! Html::style('admin/dist/css/ionicons.min.css') !!}
    <!-- Theme style -->
        {!! Html::style('admin/dist/css/AdminLTE.min.css') !!}
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
         {!! Html::style('admin/dist/css/skins/_all-skins.min.css') !!}
    <!-- iCheck -->
    {!! Html::style('admin/plugins/iCheck/flat/blue.css') !!}
    <!-- Morris chart -->
    {!! Html::style('admin/plugins/morris/morris.css') !!}
    <!-- jvectormap -->
    {!! Html::style('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
    <!-- Date Picker -->
    {!! Html::style('admin/plugins/datepicker/datepicker3.css') !!}
    <!-- Daterange picker -->
    {!! Html::style('admin/plugins/daterangepicker/daterangepicker-bs3.css') !!}
    <!-- bootstrap wysihtml5 - text editor -->
    {!! Html::style('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

    {!! Html::style('admin/cus/bu.css') !!}
{!! Html::style('admin/cus/css/select2.min.css') !!}

<style>
.breadcrumb
{
	background-color:#fff;
}
</style>


    @yield('header')
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini" style="direction:rtl">
    <div class="wrapper">


        <header class="main-header">
            <!-- Logo -->
            <a href=" {{ url('/controlpanel') }} " class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini">التحكم</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>لوحة </b>تحكم الموقع</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
               
                  <li class="dropdown notifications-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning">{{countallbuforuser(0)}}</span>
                      </a>
                      <ul class="dropdown-menu">
                      <li class="header"> لديك {{countallbuforuser(0)}}   عقار غير مفعمل  </li>
                      <li>
                          <!-- inner menu: contains the actual data -->
                          <ul class="menu">
                            @foreach(buunable() as $key => $b)
                          <li>
                              <a href="{{url('controlpanel/changestatus/'.$b->id.'/1')}}" style="color:#fff;" class="btn btn-danger pull-right"> 
    
                               <i class="fa fa-edit"></i>
                                </a> 
                             
                              <a href="{{url('controlpanel/users/'.$b->user_id.'/edit')}}" class="pull-left">
                               {{$b->bu_name}}
                              </a>
                              
                             
                             <div class="clearfix"></div>
                          </li>
                         @endforeach
                          </ul>
                      </li>
                      <li class="footer"><a href="{{ url ('/controlpanel/building')}}">View all</a></li>
                      </ul>
                  </li>
                  <!-- Tasks: style can be found in dropdown.less -->
                  <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-flag-o"></i>
                      <span class="label label-danger"> {{ countUnRead() }} </span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">ليك {{ countUnRead() }} رسالة غير مقروه يا فتى</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            @foreach(getUnRead() as $key => $con)
                            <li><!-- Task item -->
                                <a href="{{url('controlpanel/contact/'.$con->id.'/edit')}}">
                                <h3>
                                   {{$con->contact_name}}
                                    <small class="pull-right">{{$con->created_at}}</small>
                                </h3>
                                <div >
                                    
                                  <small class="pull-left">{{ contact()[ $con->contact_subject] }}</small> 
                                   <small class="pull-right">{{str_limit($con->contact_message,20)}}</small>
                                </div>
                                <br>
                                </a>
                            </li><!-- end task item -->
                          
                           @endforeach
                   {{--        
                       <li><!-- Task item -->
                            <a href="#">
                              <h3>
                                Make beautiful transitions
                                <small class="pull-right">80%</small>
                              </h3>
                              <div class="progress xs">
                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                  <span class="sr-only">80% Complete</span>
                                </div>
                              </div>
                            </a>
                          </li><!-- end task item -->  --}}
                        </ul>
                      </li>
                      <li class="footer">
                        <a href="{{ url('/controlpanel/contact') }} ">كل الرسائل</a>
                      </li>
                    </ul>
                  </li>
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="{{ Request::root() }}/website/bu_images/2.jpg" class="user-image" alt="User Image">
                      <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="{{ Request::root() }}/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        <p>
                            {{ Auth::user()->name }} - مطور ويب 
                          <small>عضو منذ {{ Auth::user()->created_at }} </small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <li class="user-body">
                          <div class="col-xs-3 text-center">
                              <a href="{{url('/controlpanel/users')}}">مستخدمين</a>
                              </div>
                              <div class="col-xs-3 text-center">
                              <a href="{{url('/controlpanel/building')}}">العقارات</a>
                              </div>
                              <div class="col-xs-3 text-center">
                              <a href="{{url('/controlpanel/contact')}}">الرسائل</a>
                              </div>
                              <div class="col-xs-3 text-center">
                              <a href="{{url('/controlpanel/sitesetting')}}">اعدادات</a>
                              </div>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          
                          <a href="{{ url('/controlpanel/users/'.Auth::user()->id.'/edit') }}" class="btn btn-default btn-flat">تعديل شخصي</a>
                        </div>
                        <div class="pull-right">
                          <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">تسجيل خروج</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                  <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                  </li>
                </ul>
              </div>
            </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-right image">
                  <img src="{{ Request::root() }}/admin/dist/img/2.jpg" class="img-circle" alt="User Image" style="height:40px;width:40px;">
                </div>
                <div class="pull-right info">
                  <p> {{ Auth::user()->name }} </p>
                  <a href="#"><i class="fa fa-circle text-success"></i> متواجد حاليا</a>
                </div>
              </div>
              <!-- search form -->
              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
              <!-- /.search form -->
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu">
                <li class="header">القائمة الرئيسية</li>
               @include('admin/layouts/nav')
              
              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>
          <!--content-->  


 <div class="content-wrapper">


  @include('admin.layouts.message')

@yield('content')



</div>
</div>







 <!--footer-->  
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdons Birthday</h4>
                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-user bg-yellow"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul><!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>
              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>
              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>
              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>
              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul><!-- /.control-sidebar-menu -->

      </div><!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>
          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>
            <p>
              Some information about this general settings option
            </p>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>
            <p>
              Other sets of options are available
            </p>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>
            <p>
              Allow the user to show his name in blog posts
            </p>
          </div><!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div><!-- /.form-group -->
        </form>
      </div><!-- /.tab-pane -->
    </div>
  </aside><!-- /.control-sidebar -->
  <!-- Add the sidebars background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

          </div>







          <!--script-->  
        <!-- jQuery 2.1.4 -->
        {!! Html::script('admin/plugins/jQuery/jQuery-2.1.4.min.js') !!}
        <!-- jQuery UI 1.11.4 -->
        <!-- download -->
        {!! Html::script('admin/plugins/jquery-ui.min.js') !!}
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        {!! Html::script('admin/bootstrap/js/bootstrap.min.js') !!}
  
         <!-- Morris.js charts -->
         <!-- download -->
         {!! Html::script('admin/plugins/raphael-min.js') !!}
   {!! Html::script('admin/plugins/morris/morris.min.js') !!}
        <!-- Sparkline -->
        {!! Html::script('admin/plugins/sparkline/jquery.sparkline.min.js') !!}
        <!-- jvectormap -->
        {!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
        {!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
              <!-- jQuery Knob Chart -->
              {!! Html::script('admin/plugins/knob/jquery.knob.js') !!}
              <!-- daterangepicker -->
              <!-- download -->
              {!! Html::script('admin/plugins/moment.min.js') !!}
              {!! Html::script('admin/plugins/daterangepicker/daterangepicker.js') !!}
        <!-- datepicker -->
         {!! Html::script('admin/plugins/datepicker/bootstrap-datepicker.js') !!}
        <!-- Bootstrap WYSIHTML5 -->
         {!! Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
        <!-- Slimscroll -->
         {!! Html::script('admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}
        <!-- FastClick -->
         {!! Html::script('admin/plugins/fastclick/fastclick.min.js') !!}
         <!-- ChartJS 1.0.1 -->
         {!! Html::script('admin/plugins/chartjs/Chart.min.js') !!}
         <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
         {!! Html::script('admin/dist/js/pages/dashboard2.js') !!}
        <!-- AdminLTE App -->
         {!! Html::script('admin/dist/js/app.min.js') !!}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
         {!! Html::script('admin/dist/js/pages/dashboard.js') !!}
        <!-- AdminLTE for demo purposes -->
         {!! Html::script('admin/dist/js/demo.js') !!}
         <script>
          $(function (){
           
           setTimeout(function(){
             $('#mes').hide('blind',{},500)
           },5000);
   
          });
        </script>
        {!! Html::script('admin/cus/js/select2.min.js') !!}

        <script type="text/javascript">
          $('select').select2({
         
          dir: "rtl"
        });
        </script>
        @yield('footer')
    </body>
    </html>