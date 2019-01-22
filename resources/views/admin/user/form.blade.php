    {{ csrf_field() }}

    <div class="text2{{ $errors->has('name') ? ' has-error' : '' }} " >

        <div class="col-md-12"> 

            
            {!! Form::text("name", null , ['class' => 'form-control' ,'placeholder' =>'اسم المستخدم ','required','id'=>'name']) !!}
            
            
      {{--   <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="اسم المستخدم " required>  --}}
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
                {!! Form::text("email", null , ['class' => 'form-control' ,'placeholder' =>'البريد الالكترونى ','required','id'=>'eamil']) !!}

{{--              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="البريد الالكترونى" required>
  --}}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="text2{{ $errors->has('admin') ? ' has-error' : '' }}">

            <div class="col-md-offset-6 col-md-6">
                  
                    {!! Form::select('admin', ['0' => 'user','1' => 'admin'],null,['class' => 'form-control' ]) !!}
                
    
    {{--              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="البريد الالكترونى" required>
      --}}
                @if ($errors->has('admin'))
                    <span class="help-block">
                        <strong>{{ $errors->first('admin') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
@if (!isset($user))
    

    <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password"placeholder="كلمة المرور " >

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="text2">

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"placeholder="تكرار كلمة المرور" >
        </div>
    </div>
    <div class="clearfix"></div>
    <br>
    @endif
    <div class="text2">
        <div class="col-md-12 ">
            <button type="submit" class="btn btn-info" style="color:#fff;">
                تنفيذ
            </button>
        </div>
    </div>
    <div class="clearfix"></div>
    <br>                 
