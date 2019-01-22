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
				<li><a href="#"> تم اضافة العقار</a></li>
			</ol>
            <div class="profile-content">

         <div class="alert alert-success">
                تم اضافة العقار بنجاح 
                                      <br>
                                      انتظر موافقة المدير
         </div>		  

      </div>
		</div>
		@include('website.bu.pages',['bu']);

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