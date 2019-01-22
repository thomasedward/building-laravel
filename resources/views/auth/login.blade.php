@extends('layouts.app')

@section('title')
تسجيل الدخول
@endsection


@section('content')

<div class="container">
    

<div class="contact_bottom">
    <hr>
    <h3>
        تسجيل دخول
    </h3>

    <hr>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="text2">
            <div class="col-md-offset-6 col-md-6">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> تذكرنى 
                    </label>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
                <div class="text2">
            <div class=" col-md-12 ">
               

                <button type="submit" class=" btn btn-warning " style="color:#fff;">
                    تسجيل الدخول  <i class="fa fa-sign-in" style="color:#fff;"></i> 
                </button>

                <a class="btn btn-info" href="{{ url('/password/reset') }}">
                     هل نسيت كلمة المرور ؟ 

                </a>
            </div>
            
        </div>
    </form>

</div>
<div class="clearfix"></div>
<br>
</div>
@endsection
