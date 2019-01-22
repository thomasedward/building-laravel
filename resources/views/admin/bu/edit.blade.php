@extends('admin.layouts.layout')

@section('title')
| تعديل العقار {{ $bu->bu_name }}
@endsection

@section('header')

@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
        تعديل العقار {{ $bu->bu_name }}  </h1>
  <ol class="breadcrumb pull-left">
    <li><a href=" {{ url('/controlpanel') }} "><i class="fa fa-dashboard"></i> الرئيسية</a></li>
    <li class="active"><a href="{{ url('/controlpanel/building') }}">التحكم فى العقارات</a></li>
    <li class="active"><a href="{{ url('/controlpanel/building/ '. $bu->id . '/edit ') }}">تعديل العقار {{ $bu->bu_name }}</a></li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">تعديل العقار {{ $bu->bu_name }} </h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                      
      {!! Form::model($bu,array('method'=>'PATCH','action'=>["BuController@update",$bu->id],'files'=>true)) !!}                       
                            @include('admin.bu.form')

     {!! Form::close() !!}

            </div>
          </div>
        </div>
      </div>
    </section>

 

    
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">معلومات عن صاحب العقار</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
      
          <table class="table table-bordered">
            <tr>
            <td>اسم صاحب العقار</td>
            <td> الصلاحيات</td>
            <td>معاد الانشاء</td>
            <td>التحكم</td>
            </tr>
              @if ($userbu == '')
              <tr>
                  <td class="producttitle"> مستخدما زائر </td>
                  <td > 
              لا يوجد 
                  </td>
      
                  <td >  لا يوجد  </td>
                  <td class="btn btn-success">  لا يوجد </td>
                  </tr>
              @else
              <tr>
                  <td class="producttitle"> <a href="{{ url('controlpanel/users/'.$userbu->id.'/edit') }}"> {{$userbu->name}} </a> </td>
                  <td > 
                  @if($userbu->admin == 0)
                  عضو
                  @else
                  مدير
                  @endif
                  </td>
      
                  <td > {{$userbu->created_at}} </td>
                  <td class="btn btn-success"> <a href="{{url('controlpanel/users/'.$userbu->id.'/edit')}}" style="color:#fff;"><i class="fa fa-edit"></i> </a> </td>
                  </tr>
              @endif


         
          </table>


        </div>
      </div>
    </div>
</section>

@endsection

@section('footer')




@endsection
