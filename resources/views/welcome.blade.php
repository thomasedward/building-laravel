@extends('layouts.app')

 @section('title')
اهلا بيك زائرنا الكريم 
@endsection
@section('header')
 {!! Html::style('/main/css/style.css') !!}
{!! Html::style('/main/css/reset.css') !!}
{!! Html::script('/main/js/modernizr.js') !!}
 <style>
              .banner {
                background: url('{{ checkImageFound(getSetting ('main_image' ),'/public/website/slider/','/website/slider/') }}') no-repeat center;
                min-height: 500px;
                width: 100%;
                -webkit-background-size: 100%;
                -moz-background-size: 100%;
                -o-background-size: 100%;
                background-size: 100%;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                padding-bottom: 100px;
            }
         
           </style>  
       @endsection
@section('content')
            <div class="banner text-center" >
                    <div class="container">
                    {{--  style="background:url({{ checkImageFound(getSetting ('main_image' ),'/public/website/slider/','/website/slider/') }}) no-repeat center"  --}}
                      <div class="banner-info" >
                   
                     
                        <h1>{{ getSetting() }}</h1>
                        <p>
                            {!! Form::open(['url'=>'search','method'=>'get']) !!}
                            <div class="row">
            
                                          <div class="col-md-3">
                                            {!! Form::text('bu_price_from', 
                                                            null,
                                                            array( 'class'=>'search-query form-control' ,
                                    'placeholder' => ' سعر العقار من', 
                                                            ))
                                                             !!}
                                          </div>
                      
                                          <div class="col-md-3">
                                            {!! Form::text('bu_price_too', 
                                                            null,
                                                            array( 'class'=>'search-query form-control' ,
                                    'placeholder'=>' سعر العقار الى',
                                                            ))
                                                             !!}
                                          </div>
                                           <div class="col-md-3">
                                            {!! Form::select('bu_rooms', 
                                                            num_rooms (),
                                    null,
                                                            [ 'class'=>'my-select form-control select2' ,
                                    'placeholder' => 'عدد الغرف '
                                    ])
                                                             !!}
                            
                                          </div>
                                        
                            
                                          <div class="col-md-3">
                                            {!! Form::select('bu_type', 
                                                            bu_type (),
                                    null,
                                                            array( 'class'=>'my-select form-control select2' ,
                                    'placeholder'=>' نوع العقار '
                                                            ))
                                                             !!}
                                          </div>
                            </div>
                            <br>
                              <div class="row">
                                         
                                         
                                          <div class="col-md-4">
                                            {!! Form::select('bu_place', 
                                                            bu_place (),
                                    null,
                                                            array( 'class'=>'my-select form-control select2' ,
                                    'placeholder'=>'المنطقه  '
                                                            ))
                                                             !!}
                                          </div>
                            
                                          <div class="col-md-4">
                                            {!! Form::select('bu_rent', 
                                                            bu_rent (),
                                    null,
                                                            array( 'class'=>'my-select form-control' ,
                                    'placeholder'=>'نوع العمليه  '
                                                            ))
                                                             !!}
                                          </div>
                            
                                           <div  class="col-md-4">
                                            {!! Form::text('bu_square', 
                                                            null,
                                                            array( 'class'=>'search-query form-control select2' ,
                                    'placeholder'=> 'مساحه العقار '
                                                            ))
                                                             !!}
                                                          </div>
                                                           </div>
                                        <br>
                                        <div class="row">
                                          <div class="col-md-12" >
                                            {!! Form::submit('ابحث', 
                                                            array( 'class'=>'banner_btn' ,'style'=>'width:200px',
                                                            ))
                                                             !!}
                                                             </div>
                                         
                            
                      {!! Form::close() !!}
                        </p>
                        <a class="banner_btn" href="{{ url('/showbu') }}">المزيد</a> </div>
                        <a class="banner_btn" href="{{ url('/user/create/building') }}">أضف عقار </a> </div>
                    </div>
                  </div>
                </div>

                  <div class="clearfix"></div>
                  <br>
                  <div class="main">
                
                      <ul class="cd-items cd-container">
                   
                  
                          @foreach($bu as $b)
                            <li class="cd-item">
                              <img src="{{ checkImageFound($b->bu_image) }}" alt="{{$b->bu_name}}" title="{{ $b->bu_name }}" width="100"  height="250">
                              <a href="#0" data-id="{{$b->id}}" title="{{$b->bu_name}}" class="cd-trigger">اظهر تفاصيل</a>
                            </li> <!-- cd-item -->
                             @endforeach 
                           <div class="paginatios col-lg-12" >
                        
                            {{ $bu->appends(Request::except('page'))->render() }}
                              </div>
                        
                              </ul> <!-- cd-items -->


                              <div class="cd-quick-view" style="direction:rtl">
                                  <div class="cd-slider-wrapper" >
                                    <ul class="cd-slider">
                                      <li ><img style="width:250px;height:350px;" src="" alt="" class="imagebox"></li>
                                    </ul> <!-- cd-slider -->
                              
                                  </div> <!-- cd-slider-wrapper -->
                              
                                  <div class="cd-item-info">
                                    <h2 class="titlebox"></h2>
                                    <p class="detailsboxsmall" > </p>
                                    <p class="detailsboxlarge" > </p>
                              
                                    <ul class="cd-item-action">
                                      <li><a href="#0" class="add-to-cart typebox" >   </a></li>
                                      <br> <br>		  <br>			
                                      <li><a href="#0" class="add-to-cart rentbox" >   </a></li>			
                                      <br> <br>		  <br>		
                                      <li><a href="#0" class="add-to-cart pricebox" >   </a></li>				
                                   
                                      <li><a href="#0" class="more">اعرف المزيد</a></li>	
                                    </ul> <!-- cd-item-action -->
                                  </div> <!-- cd-item-info -->
                                  <a href="#0" class="cd-close">اغلق</a>
                                </div> <!-- cd-quick-view -->
                              
                  </div>
                 
               
                  
 @endsection
@section('footer')
{!! Html::script('/main/js/jquery-2.1.1.js') !!}
{!! Html::script('/main/js/velocity.min.js') !!}
<script>
 function urlhome()
 {
  return '{{ Request::root()}}';
 }
 function noImageUrl()
 {
  return '{{ getSetting('noImage') }}';
 }
</script>
{!! Html::script('/main/js/main.js') !!} <!-- Resource jQuery -->

@endsection