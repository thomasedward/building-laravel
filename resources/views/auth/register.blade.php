@extends('layouts.app')

@section('title')
تسجيل عضوية جديدة 
@endsection


@section('content')
<div class="container">
    <div class="contact_bottom">
     
        <hr>
        <h3>
         تسجيل عضوية جديدة 
        </h3>
    
        <hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="text2{{ $errors->has('name') ? ' has-error' : '' }} " >

                            <div class="col-md-12">
                              
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="اسم المستخدم " required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="البريد الالكترونى" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"placeholder="كلمة المرور " required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="text2">

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"placeholder="تكرار كلمة المرور" required>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="text2">
                            <div class="col-md-12 ">
                                <button type="submit" class="banner_btn" style="color:#fff;">
                                    عضوية جديدة
                                </button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>                 
                    </form>
             
    </div>
</div>
@endsection
