@extends('layouts.app')
@section('title')
تم اضافة العقار بنجاح
@endsection
@section('header')
{!! Html::style('admin/cus/bu.css') !!}
{!! Html::style('admin/cus/css/select2.min.css') !!}

<style>
.breadcrumb
{
	background-color:#fff;
}
</style>
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
				<li><a href="{{url('/user/create/building/')}}">اضافة عقار جديد</a></li>
				<li><a href="#"> التعديل على العقار  :  {{ $bu->bu_name }}</a></li>
			</ol>
            <div class="profile-content">

         {!! Form::model($bu,array('method'=>'patch','url'=>["/user/update/singlebuildinguser"],'files'=>true)) !!}                  
                             <input type="hidden"  name="bu_id" value="{{$bu->id}}">

                   @include('admin.bu.form')
         {!! Form::close() !!}

      </div>
		</div>
		@include('website.bu.pages',['bu','user']);

<br>
<br>


</div>
<div class="clearfix"></div>
@endsection
@section('footer')
{!! Html::script('admin/cus/js/select2.min.js') !!}

<script type="text/javascript">
  $('select').select2({
 
  dir: "rtl"
});
</script>
@endsection