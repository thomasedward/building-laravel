@extends('layouts.app')
@section('title')
 تواصل معنا 
@endsection
@section('header')
{!! Html::style('admin/cus/bu.css') !!}
{!! Html::style('admin/cus/contact.css') !!}
{!! Html::style('admin/cus/css/select2.min.css') !!}


@endsection
@section('content')
<br>
<br>
<div class="container">
<h1 class="text-center">
اتصل بينا
</h1>
<br>
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
      {!! Form::open(['url'=>'/contact','method'=>'post','files'=>true]) !!}

      {{ csrf_field() }}


                <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                الرساله</label>
                            <textarea name="contact_message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="الرساله"></textarea>
                        </div>
                    
                  
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                الاسم</label>
                            <input 
                                  type="text" 
                                  name="contact_name"
                                  class="form-control" 
                                  id="name" 
                                  placeholder="من فضلك ادخل اسمك" 
                                  required="required" 
                                  value="{{ \Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->name :'' }}"/>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                 البريد الكترونى</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input 
                                      type="email" 
                                      name="contact_email"
                                      class="form-control" 
                                      id="email" 
                                      placeholder="من فضلك ادخل البريد الخاص بيك" 
                                      required="required" 
                                      value="{{ \Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->email :'' }}"/></div>
                        </div>  
                        <div class="form-group">
                            <label for="subject">
                                الموضوع</label>
                            <select id="subject" name="contact_type" class="form-control" required="required">
                         @foreach(contact() as $key => $con)
                              <option value="{{ $key }}">  {{$con}}</option>
                              @endforeach 
                                {{-- <option value="1">  {{contact()[1]}}</option>
                                <option value="2">  {{contact()[2]}}</option>
                                <option value="3">  {{contact()[3]}}</option>
                                <option value="4">  {{contact()[4]}}</option> --}}
                                
                            </select>
                        </div>
                        <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                        <i class="fa fa-user"></i>   تاكيد 
                                      </button>
                             {{--     <button type="submit" class="banner_btn pull-right" id="btnContactUs">
                                    ارسل  
                                </button>  --}}
                            </div>
                    </div>
                    
                </div>
               {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><i class=" fa fa-outdent" style='color:#2ABB9B'></i> مكتبنا  </legend>
            <address>
                {{ nl2br(getSetting('address')) }}
               <br>
                <abbr title="Phone">
            ت : {{getSetting('mobile')  }}</abbr>
                
            </address>
            <address>
                <strong>{{getSetting('sitename')  }}</strong><br>
                <a href="mailto:#">{{getSetting('email')  }}</a>
            </address>
            </form>
        </div>
    </div>
</div>
<br>
@endsection
@section('footer')

@endsection