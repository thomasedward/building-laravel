@extends('admin.layouts.layout')

@section('title')
| أضف عضو جديد
@endsection

@section('header')

@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
أضافة عضو جديد  </h1>
  <ol class="breadcrumb pull-left">
    <li><a href=" {{ url('/controlpanel') }} "><i class="fa fa-dashboard"></i> الرئيسية</a></li>
    <li class="active"><a href="{{ url('/controlpanel/users') }}">التحكم فى الاعضاء</a></li>
    <li class="active"><a href="{{ url('/controlpanel/users/create') }}">اضافة عضو</a></li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">أضافة عضو جديد </h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/controlpanel/users') }}">

                @include('admin.user.form')

            </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->



@endsection

@section('footer')




@endsection
