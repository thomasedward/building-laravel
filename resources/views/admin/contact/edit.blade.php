@extends('admin.layouts.layout')

@section('title')
| تعديل الرسالة {{ $contact->contact_name }}
@endsection

@section('header')

@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
        تعديل الرسالة {{ $contact->contact_name }}  </h1>
  <ol class="breadcrumb pull-left">
    <li><a href=" {{ url('/controlpanel') }} "><i class="fa fa-dashboard"></i> الرئيسية</a></li>
    <li class="active"><a href="{{ url('/controlpanel/contact') }}">التحكم فى الرسائل</a></li>
    <li class="active"><a href="{{ url('/controlpanel/contact/ '. $contact->id . '/edit ') }}">تعديل الرسالة {{ $contact->contact_name }}</a></li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">تعديل الرسالة {{ $contact->contact_name }} </h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                      
      {!! Form::model($contact,array('method'=>'PATCH','action'=>["ContactController@update",$contact->id],'files'=>true)) !!}                       
                            @include('admin.contact.form')
     {!! Form::close() !!}

                      
                        

 


@endsection

@section('footer')




@endsection
