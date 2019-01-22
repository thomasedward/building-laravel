@extends('layouts.app')
@section('title')
كل العقارات 
@endsection
@section('header')
{!! Html::style('admin/cus/bu.css') !!}

@endsection
@section('content')
<div class="container">

<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->


    <div class="row profile">
    <div class="col-md-9">
	        <ol class="breadcrumb">
				<li><a href="{{url('/')}}">الريئيسية</a></li>
			
			</ol>
            <div class="profile-content">
		
        </section>
          <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">تعديل العضويه</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::model($user,array('method'=>'post','route'=>["user.usersetting"])) !!}                  
                  
                                       {{-- @include('admin.user.form') --}}

                    <input type="hidden"  name="user_id" value="{{$user->id}}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-md-offset-5 col-md-5">
                              {!! Form::text('name', 
                                                null,
                                                array('required' , 'class'=>'form-control' 
                                                ))
                                                 !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="name" class="col-md-2 control-label">الاسم</label>
                        </div>
                        <div class="clearfix"></div>
                        <br>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">    <div class="col-md-offset-5 col-md-5">
                               {!! Form::text('email', 
                                                null,
                                                array('required' , 'class'=>'form-control' 
                                                ))
                                                 !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="email" class="col-md-2 control-label">البريد الالكترونى</label>
                        </div>
                        <div class="clearfix"></div>
                        <br> 
                    
                        <div class="form-group">
                            <div class=" col-md-offset-8 col-md-4">
                            {!! Form::submit('تعديل', 
                                                array('class'=>'btn btn-success ' )) 
                                                !!}
                            </div>
                        </div>
                    
                   {!! Form::close() !!}

      
                </div>
              </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <hr>
         <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">تعديل كلمه المرور</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 {{-- <a href="{{url('/adminpanel/users/'. $user->id .'/editpassword')}}">
<i class="fa fa-edit"></i>
              </a> --}}

        {!! Form::open( ['url' => '/user/usersetting/changepassword','method'=>'post']) !!}
         {{ csrf_field() }}

       <div>
         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <div class="col-md-offset-5 col-md-5">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="password" class="col-md-2 control-label">  كلمه المرور القديمة</label>
                        </div>
                        <div class="clearfix"></div>
                        <br>
       <div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
                      <div class="col-md-offset-5 col-md-5">
                                <input id="password" type="password" class="form-control" name="newpassword" >

                                @if ($errors->has('newpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="password" class="col-md-2 control-label"> كلمه المرور الجديدة</label>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                         
                         <div class="form-group">
                            <div class=" col-md-offset-10 col-md-2">
                            {!! Form::submit('تحديث', 
                                                array('class'=>'btn btn-success btn-block' )) 
                                                !!}
                                {{-- <button type="submit" class="btn btn-success">
                                  <i class="fa fa-user"></i>    تعديل  كلمه المرور   
                                </button> 
                            </div>
                        </div>--}}

</div>
                   {!! Form::close() !!}  
                </div>
               
              </div>
            </div>
        </section>
 
			 
            </div>
		</div>
		@include('website.bu.pages',['bu','user' => 1]);

<br>
<br>


</div>
<div class="clearfix"></div>
@endsection
@section('footer')

@endsection