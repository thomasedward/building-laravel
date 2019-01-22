<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
       {{ getSetting() }} |
        @yield('title')

    </title>


    {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/font-awesome.min.css') !!}
    {!! Html::style('website/css/style.css') !!}
    {!! Html::style('website/css/main.css') !!}



    
      
        
    @yield('header')

   
</head>
<body>
    <div id="app" style="direction:rtl">

            <div class="header">
                    <div class="container"> <a class="navbar-brand {{ setActive(['welcome']) }}" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> ONE</a>
                      <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{{ Request::root() }}/website/images/nav_icon.png" alt="" /> </a>
                        <ul class="nav" id="nav">
                          <li class="{{ setActivemenu(['home']) }}"><a href="{{ url('/home') }}">الرئيسية</a></li>
                          <li class="{{ setActivemenu(['showbu']) }}"><a href="{{ url('/showbu') }}">العقارات</a></li>
                          
                          <li class="dropdown {{ setActive(['search' ,'bu_rent=1']) }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             ايجار <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @foreach (bu_type() as $key => $type)
                                    
                               
                                <li class="  ">  <a href="{{url('/search?bu_rent=1&bu_type='.$key)}}">
                                       {{$type}}
                                    </a>
                                </li>
                                <br>
                                    @endforeach
                                
                              
                            </ul>
                        </li>

                        <li class="dropdown {{ setActive(['search' ,'bu_rent=0']) }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              تمليك <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                    @foreach (bu_type() as $key => $type)
                                        
                                   
                                    <li class="  ">  <a href="{{url('/search?bu_rent=0&bu_type='.$key)}}">
                                           {{$type}}
                                        </a>
                                    </li>
                                    <br>
                                        @endforeach
                                    
                                  
                                </ul>
                        </li>
                          <li class=" {{ setActivemenu(['contact' ]) }}" ><a href="{{ url('/contact') }}">اتصل بنا</a></li>
                          <!-- Authentication Links -->
                          @if (Auth::guest())
                              <li class=" {{ setActivemenu(['login' ]) }}" ><a href="{{ url('/login') }}">تسجيل دخول</a></li>
                              <li class="{{ setActivemenu(['register' ]) }} "><a href="{{ url('/register') }}">عضوية جديدة </a></li>
                          @else
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                  </a>
  
                                  <ul class="dropdown-menu" role="menu">
                                        <li class="{{ setActive(['user','usersetting']) }}">
                                                <a href="{{ url('/user/usersetting') }}">
                                                <i class="fa fa-building "></i>
                                                تعديل المعلومات الشخصيه  </a>
                                            </li>
                                            
                                            <li class="{{ setActive(['user','buildingshow']) }}">
                                                <a href="{{ url('/user/buildingshow') }}">
                                                <i class="fa fa-bookmark "></i>
                                        <span class="pull-left text-center" style="background-color:#2abb9b;width:20px; border-radius: 20px; color:#fff;"></span>		عقارتى    </a>
                                            </li>
                                            <li  class="{{ setActive(['user','buildingshowunable']) }}">
                                                <a href="{{ url('/user/buildingshowunable') }}">
                                                <i class="fa fa-bookmark " style='color:#f00;'></i>
                                        <span class="pull-left text-center" style="background-color:#f00;width:20px; border-radius: 20px; color:#fff;"></span>		 (تنتظر الادارة) عقارتى  </a>
                                            </li>
                                            <li class="{{ setActive(['user','create','building']) }}">
                                                <a href="{{ url('/user/create/building') }}" target="_blank">
                                                <i class="fa fa-bookmark-o"></i>
                                                اضف عقار </a>
                                            </li>
                                      
                                      <li class="{{ setActive(['logout']) }}">
                                          <a href="{{ url('/logout') }}"
                                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                       <i class="fa fa-sign-out"></i>
                                              تسجيل الخروج
                                          </a>
  
                                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                      </li>

                                  </ul>
                              </li>
                          @endif
                          <div class="clear"></div>
                        </ul>
                       
                      </div>
                    </div>
                  </div>

                  @include('layouts.message')
        @yield('content')
    </div>




    <div class="footer">
            <div class="footer_bottom">
              <div class="follow-us">
                   <a class="fa fa-facebook social-icon" href="{{ getsetting('facebook') }}"></a> 
                   <a class="fa fa-twitter social-icon" href="{{ getsetting('twitter') }}">
                       </a> <a class="fa fa-youtube social-icon" href="{{ getsetting('youtube') }}"></a> </div>
              <div class="copy">
                <p>Copyright &copy; 2018 Group. Programming by {{ getSetting('copyright') }} </p>
              </div>
            </div>
          </div>


    <!-- Scripts -->
   
   
    {!! Html::script('website/js/jquery.min.js') !!}
    {!! Html::script('website/js/responsive-nav.js') !!}
    {!! Html::script('website/js/bootstrap.min.js') !!}
    {!! Html::script('website/js/jquery.flexslider.js') !!}
    {!! Html::script('website/js/plugins.js') !!}
   @yield('footer')
</body>
</html>
