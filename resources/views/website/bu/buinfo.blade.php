@extends('layouts.app')
@section('title')
 {{ $buinfo->bu_name }} 
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


    <div class="row profile">
    <div class="col-md-9">
	        <ol class="breadcrumb">
				<li><a href="{{url('/')}}">الريئيسية</a></li>
				<li><a href="{{ url('/showbu') }}">كل العقارات</a></li>
				<li><a href="{{url('/singlebuilding/'.$buinfo->id)}}">{{ $buinfo->bu_name }}</a></li>
			</ol>
            <div class="profile-content">
			
	{{--   @include('website.bu.sharefile',['bu' => $buinfo]);    --}}
		  <h1> {{ $buinfo->bu_name }} </h1>
			  <hr>
		   <img src="{{ checkImageFound($buinfo->bu_image) }}" width="100%"  height="500px"> 
			  <hr>
			  <div class="btn-group" >
			   <a href="{{url('/search?bu_price='.$buinfo->bu_price)}}" class="btn btn-default">
			  السعر : {{ $buinfo->bu_price }}
			  </a>
			  <a href="{{url('/search?bu_square='.$buinfo->bu_square)}}" class="btn btn-default">
			  المساحه : {{ $buinfo->bu_square }}
			  </a>
			  @if(!empty($buinfo->bu_place))
			   <a href="{{url('/search?bu_place='.$buinfo->bu_place)}}" class="btn btn-default">
			  المنطقه : {{ bu_place ()[$buinfo->bu_place] }}
			  </a>
			   @endif
			   <a href="{{url('/search?bu_rooms='.$buinfo->bu_rooms)}}" class="btn btn-default">
			  عدد الغرف : {{ num_rooms ()[$buinfo->bu_rooms] }}
			  </a>
			   <a href="{{url('/search?bu_rent='.$buinfo->bu_rent)}}" class="btn btn-default">
			  نوع العمليه : {{ bu_rent ()[$buinfo->bu_rent] }}
			  </a>
			   <a href="{{url('/search?bu_type='.$buinfo->bu_type)}}" class="btn btn-default">
			  نوع العقار : {{ bu_type ()[$buinfo->bu_type] }}
			  </a>
			  </div>
			  <hr>
			  <p class"lead">
			  {{ $buinfo->bu_large_dis }}
			  </p>
			  <hr>
			   <!-- Go to www.addthis.com/dashboard to customize your tools -->
        {{-- {!! Html::script('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59aab916109130c2') !!} --}}
   <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59aab916109130c2"></script> 
			 <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
			<hr>
			<div id="map" style="width:100%;height:500px"></div>
 				<hr>	
            </div>
			 <div class="profile-content">	
		<h3 class="text-center"> عقارات اخرى قد تهمك </h3>
		<a href="{{url('/search?bu_rent='.$buinfo->bu_rent)}}" class="btn btn-default">  مشتركه فى نفس العملية   : {{  bu_rent ()[$buinfo->bu_rent] }} </a>
		<hr>
		@include('website.bu.sharefile',['bu'=>$same_rent]);  
	   <hr>
	   <hr>
	   <a href="{{url('/search?bu_type='.$buinfo->bu_type)}}" class="btn btn-default"> مشتركة فى النوع    : {{  bu_type ()[$buinfo->bu_type] }} </a>
	 <hr>  
	   @include('website.bu.sharefile',['bu'=>$same_type]);  
	  <hr>
	  <hr>
	  <a href="{{url('/search?bu_place='.$buinfo->bu_place)}}" class="btn btn-default"> مشتركه فى نفس المنطقة  : {{  bu_place ()[$buinfo->bu_place] }} </a>
	 <hr> 
	  @include('website.bu.sharefile',['bu'=>$same_place]);  
	 <hr>
	 <hr>
	 <a href="{{url('/search?bu_rooms='.$buinfo->bu_rooms)}}" class="btn btn-default"> مشتركه فى عدد الغرف   : {{  num_rooms ()[$buinfo->bu_rooms] }} </a>
	 <hr>
	 @include('website.bu.sharefile',['bu'=>$same_rooms]);  

			 </div>
			
  
		</div>
	{{--  @include('website.bu.pages',['bu']);  --}}


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

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var myCenter = new google.maps.LatLng({{ $buinfo->bu_langtude }} ,{{ $buinfo->bu_latitude }}); 
  var mapOptions = {center: myCenter, zoom: 10};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({
    position: myCenter,
    animation: google.maps.Animation.BOUNCE
  });
  marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvunD89KgNpW-sxonTkG-iw0dXN0XjuhU&callback=myMap"></script>

@endsection