@extends('admin.layouts.layout')

@section('title')
| تعديل العضو {{ $user->name }}
@endsection

@section('header')

@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
        تعديل العضو {{ $user->name }}  </h1>
  <ol class="breadcrumb pull-left">
    <li><a href=" {{ url('/controlpanel') }} "><i class="fa fa-dashboard"></i> الرئيسية</a></li>
    <li class="active"><a href="{{ url('/controlpanel/users') }}">التحكم فى الاعضاء</a></li>
    <li class="active"><a href="{{ url('/controlpanel/users/ '. $user->id . '/edit ') }}">تعديل العضو {{ $user->name }}</a></li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">تعديل العضو {{ $user->name }} </h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <!--    <form class="form-horizontal" role="form" method="POST" action="{{ url('/controlpanel/users') }}">-->
                      
                        {!! Form::model($user,array('method'=>'PATCH','action'=>["UsersController@update",$user->id])) !!}
                      
                @include('admin.user.form')

                        {!! Form::close() !!}

                      
                        

  <!--</form>-->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->


    <!-- Main content -->
    <section class="content" style="direstion:rtl"> 
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">تعديل كلمة المرور الخاصة بالعضو {{ $user->name }} </h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                      
                  
                        
                        {!! Form::open(['url' =>'/controlpanel/user/changpassword' ,'method' => 'POST']) !!}
                        <input type="hidden" value="{{ $user->id }}" name="user_id">
<div class="clearfix"></div>
                        <div class="text2">
                                <div class="col-md-1 ">
                                    <button type="submit" class="btn btn-info" style="color:#fff; width:100%">
                                        تنفيذ
                                    </button>
                                </div>
                            </div>
                              @if ($user->id != 1)
                                  
                              
                            <div class="text2">
                                    <div class="col-md-1 ">
                                                <a href="{{ url('/controlpanel/users/'.$user->id .'/delete ') }}" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                @endif
                                            
                        <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control" name="password"placeholder="كلمة المرور " >
                        
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    
                      
                         
                                            
                        {!! Form::close() !!}
                        

            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->


    
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class=" col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> عقارات العضو </h3>
          </div><!-- /.box-header -->
          <div class="box-body">
             
             {{-- new --}}
      <div class="col-md-12">
        <div class="nav-tabs-custom">

          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">مفعل {{countbuforuser($user->id,1)}}</a></li>
            <li><a href="#timeline" data-toggle="tab">  غير مفعل {{countbuforuser($user->id,0)}}</a></li>
          </ul>

          <div class="tab-content">


            <div class="active tab-pane" id="activity">
@if( count($buable) > 0 )

<table class="table table-bordered">
<tr>
<td>اسم العقار</td>
<td>السعر</td>
<td>نوع العملية</td>
<td>نوع العقار</td>
<td> عدد الغرف</td>
<td> المنطقة</td>
<td>معاد الانشاء</td>
<td>التحكم</td>
</tr>
@foreach($buable as  $key => $b)
<tr>
<td class="producttitle"> <a href="/controlpanel/building/{{$b->id}}/edit"> {{$b->bu_name}} </a> </td>
<td > {{$b->bu_price}} </td>
<td >{{ bu_rent ()[$b->bu_rent]}} </td>
<td > {{bu_type()[$b->bu_type]}} </td>
<td > {{$b->bu_rooms}} </td>
@if(!empty($b->bu_place))
<td > {{bu_place ()[$b->bu_place]}} </td>
@else
<td > </td>
@endif
<td > {{$b->created_at}} </td>
<td class="btn btn-success"> <a href="{{url('controlpanel/changestatus/'.$b->id.'/0')}}" style="color:#fff;">   الغاء تفعيل  <i class="fa fa-edit"></i> </a> </td>
</tr>
@endforeach
</table>
<div class="paginatios col-lg-12 text-center" >
        {{ $buable->appends(Request::except('page'))->render() }}

          </div>

@else

<div class="alert alert-danger">
لا يوجد اى عقارت حاليا
</div>

@endif
          
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="timeline">
@if( count($buunable) > 0 )
<table class="table table-bordered">
<tr>
<td>اسم العقار</td>
<td>السعر</td>
<td>نوع العملية</td>
<td>نوع العقار</td>
<td> عدد الغرف</td>
<td>  المنطقة</td>
<td>معاد الانشاء</td>
<td> التحكم</td>
</tr>
@foreach($buunable as  $key => $b)
<tr>

<td class="producttitle"> <a href="/controlpanel/bu/{{$b->id}}/edit" style="color:#dd4b39;"> {{$b->bu_name}} </a> </td>
<td > {{$b->bu_price}} </td>
<td >{{ bu_rent ()[$b->bu_rent]}} </td>
<td > {{bu_type()[$b->bu_type]}} </td>
<td > {{$b->bu_rooms}} </td>
@if(!empty($b->bu_place))
<td > {{bu_place ()[$b->bu_place]}} </td>
@else
<td > </td>
@endif
<td > {{$b->created_at}} </td>
<td class="btn btn-danger"> <a href="{{url('controlpanel/changestatus/'.$b->id.'/1')}}" style="color:#fff;">  تفعيل <i class="fa fa-edit"></i> </a> </td>
</tr>

@endforeach
</table>

@else

<div class="alert alert-danger">
لا يوجد اى عقارت حاليا
</div>

@endif
            </div><!-- /.tab-pane -->

            
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div>
             {{-- new --}}
          
          </div>
        </div>
      </div>
  </section>


@endsection

@section('footer')




@endsection
