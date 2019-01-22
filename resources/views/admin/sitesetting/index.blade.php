@extends('admin.layouts.layout')

@section('title')
| أعدادات الموقع
@endsection

@section('header')

@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
اعدادت الموقع </h1>
  <ol class="breadcrumb pull-left">
    <li><a href=" {{ url('/controlpanel') }} "><i class="fa fa-dashboard"></i> الرئيسية</a></li>
    <li class="active"><a href="{{ url('/controlpanel/sitesetting') }}">أعدادات الموقع</a></li>
  </ol>
</section>


    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">أعدادات الموقع </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/controlpanel/sitesetting') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @foreach ($site as $setting)

                        <div class="text2{{ $errors->has($setting->nameSetting) ? ' has-error' : '' }} " >
                        
                       
                        <div class="col-md-9"> 
                                @if ($setting->type == 0)   
                                {!! Form::text($setting->nameSetting, $setting->value , ['class' => 'form-control' ,'placeholder' =>'الخاصية  ']) !!}
                                @elseif($setting->type == 2)
                                        @if($setting->value != '0')
                                        <img width="100%" height="200" src="{{ checkImageFound(getSetting ('main_image' ),'/public/website/slider/','/website/slider/') }}">
                                    <div class="clearfix"></div>
                                    <br>
                                        @elseif($setting->value == '0')
                                        <div class="clearfix"></div>
                                        <br>
                                        @endif
                               {!! Form::file($setting->nameSetting, array( 'class'=>'form-control '  )) !!}
                                @else
                                {!! Form::textarea($setting->nameSetting, $setting->value , ['class' => 'form-control' ,'placeholder' =>'الخاصية ']) !!}
                                @endif
                                @if ($errors->has($setting->nameSetting))
                                    <span class="help-block">
                                        <strong>{{ $errors->first($setting->nameSetting) }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                    {{ $setting->slug }}
                                </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        <br>
                   
                        @endforeach
                        <hr>
                        <div class="text2">
                                <div class=" col-md-9  ">
                                    <button type="submit" class="btn btn-app btn-block" style="color:#000;">
                                     <i class="fa fa-save"></i>
                                        حفظ أعدادات الموقع
                                    </button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>             
                    </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->



@endsection

@section('footer')




@endsection
