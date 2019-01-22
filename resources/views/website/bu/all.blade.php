@extends('layouts.app')
@section('title')
كل العقارات 
 
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
	<br>


	<div class="row profile">
			<div class="col-md-9">
					<ol class="breadcrumb">
						<li><a href="{{url('/')}}">الرئيسية</a></li>
						@if(isset($array))
				
						@if(!empty($array))
						   @foreach($array as $key => $in )
						   
							   <li><a href="{{url('search?'.$key . '=' .$in)}}">{{ searchname()[$key] }} =>
							   @if($key == 'bu_place')
								{{bu_place()[$in]}}
								@elseif($key == 'bu_type')
								  {{bu_type()[$in]}}
								@elseif($key == 'bu_rent')
								  {{bu_rent()[$in]}}
								{{-- @elseif($key == 'bu_price')
								  {{$in}} --}}
								  @else
								  
								  {{ $in}}
								  @endif
								</a></li>
						   @endforeach
						@endif
						@endif
					</ol>
					<div class="profile-content">
					
				@include('website.bu.sharefile' , ['bu'])


			</div>
				<div class="paginatios col-lg-12 text-center" >
						{{ $bu->appends(Request::except('page'))->render() }}
			
						  </div>
					
				</div>
				
      @include('website.bu.pages' , ['bu'])
					
								<br>
					
				</div>
			
			<br>
			
			<br>
		
	
		
		
		</div> 

	{{--  <div class="col-md-9">
			@include('website.bu.sharefile' , ['bu' => $buAll])

	</div>

	<div class="col-md-3">
		
	</div>  --}}
	

	

	</div>
	<br>


@endsection
@section('footer')
{!! Html::script('admin/cus/js/select2.min.js') !!}

<script type="text/javascript">
  $('select').select2({
 
  dir: "rtl"
});
</script>
@endsection