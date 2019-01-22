 {{-- setting --}}
                <li class="treeview {{ setActive(['controlpanel','sitesetting']) }}">
                        <a href="#">
                          <i class="fa fa-dashboard"></i> <span>أعدادات الموقع</span> <i class="fa fa-angle-left pull-left"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li class="{{ setActive(['controlpanel','sitesetting']) }}"><a href="{{ url('/controlpanel/sitesetting') }}"><i class="fa fa-circle-o"></i> أعدادت الموقع الرئيسية</a></li>
                        </ul>
                      </li>
                      
                {{-- users --}} 

                      <li class=" {{ setActive(['controlpanel','users','create']) }}  treeview ">
                            <a href="#">
                              <i class="fa fa-users"></i> <span>التحكم فى الاعضاء</span> <i class="fa fa-angle-left pull-left"></i>
                              <span class="label label-primary pull-left">{{ countforuser() }}</span>
                            </a>
                            <ul class="treeview-menu">
                              <li   class="{{ setActive(['controlpanel','users','create']) }}"><a href="{{ url('/controlpanel/users/create') }}"><i class="fa fa-circle-o"></i> اضف عضو جديد </a></li>
                              <li   class="{{ setActive(['controlpanel','users']) }}"><a href=" {{ url('/controlpanel/users') }} "><i class="fa fa-circle-o"></i> عرض كل الاعضاء </a></li>
                            </ul>
                          </li>
                          
                              {{-- building --}}

                      <li class="{{ setActive(['controlpanel','building','create']) }}  treeview">
                          <a href="#">
                            <i class="fa fa-users"></i> <span>التحكم فى العقارات</span> <i class="fa fa-angle-left pull-left"></i>
                            <span class="label label-primary pull-left">{{ countforbuild() }}</span>
                          </a>
                          <ul class="treeview-menu">
                            <li   class="{{ setActive(['controlpanel','building','create']) }}"><a href="{{ url('/controlpanel/building/create') }}"><i class="fa fa-circle-o"></i> اضف عقار جديد </a></li>
                            <li  class="{{ setActive(['controlpanel','building']) }}"><a href=" {{ url('/controlpanel/building') }} "><i class="fa fa-circle-o"></i> عرض كل العقارات </a></li>
                          </ul>
                        </li>

                           {{-- building --}}

                      <li class="{{ setActive(['controlpanel','contact']) }}  treeview">
                          <a href="#">
                            <i class="fa fa-users"></i> <span>التحكم فى الرسائل</span> <i class="fa fa-angle-left pull-left"></i>
                            <span class="label label-primary pull-left">{{ countforcontact() }}</span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="{{ setActive(['controlpanel','contact']) }}"><a href=" {{ url('/controlpanel/contact') }} "><i class="fa fa-circle-o"></i> عرض كل الرسائل </a></li>
                          </ul>
                        </li>

                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-files-o"></i>
                          <span>Layout Options</span>
                          <span class="label label-primary pull-left">4</span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                          <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                          <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                        </ul>
                      </li>