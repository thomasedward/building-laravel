@extends('admin.layouts.layout')

@section('title')
| أضف عقار جديد
@endsection

@section('header')

@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
أضافة عقار جديد  </h1>
  <ol class="breadcrumb pull-left">
    <li><a href=" {{ url('/controlpanel') }} "><i class="fa fa-dashboard"></i> الرئيسية</a></li>
    <li class="active"><a href="{{ url('/controlpanel/users') }}">التحكم فى العقارات</a></li>
    <li class="active"><a href="{{ url('/controlpanel/users/create') }}">اضافة عقار</a></li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">أضافة عقار جديد </h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                 
             {!! Form::open(['url'=>'/controlpanel/building','method'=>'post','files'=>true]) !!}
                @include('admin.bu.form')
                {!! Form::close() !!}

            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->



@endsection

@section('footer')




@endsection
