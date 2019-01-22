
 {{ csrf_field() }}
 <div class="form-group{{ $errors->has('contact_name') ? ' has-error' : '' }}">

     <div class="col-md-offset-5 col-md-5">
         {!! Form::text('contact_name', 
                         null,
                         array('class'=>'form-control' 
                         ))
                          !!}
         @if ($errors->has('contact_name'))
             <span class="help-block">
                 <strong>{{ $errors->first('contact_name') }}</strong>
             </span>
         @endif
     </div>
     <label for="contact_name" class="col-md-2 control-label">الاسم</label>
 </div>
 <div class="clearfix"></div>
 <br>

 <div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
     

     <div class="col-md-offset-5 col-md-5">
         {!! Form::text('contact_email', 
                         null,
                         array( 'class'=>'form-control' 
                         ))
                          !!}
         @if ($errors->has('contact_email'))
             <span class="help-block">
                 <strong>{{ $errors->first('contact_email') }}</strong>
             </span>
         @endif
     </div>
     <label for="contact_email" class="col-md-2 control-label">البريد الالكترونى</label>
 </div>
 <div class="clearfix"></div>
 <br>
   <div class="form-group{{ $errors->has('contact_type') ? ' has-error' : '' }}">
      <div class="col-md-offset-5 col-md-5">
         {!! Form::select('contact_subject', 
                         contact (),null,
                         array( 'class'=>'form-control select2' 
                         ))
                          !!}
                              @if ($errors->has('contact_type'))
             <span class="help-block">
                 <strong>{{ $errors->first('contact_type') }}</strong>
             </span>
         @endif
     </div>
     <label for="text" class="col-md-2 control-label">الموضوع  </label>
 </div>
 <div class="clearfix"></div>
 <br> 
       <div class="form-group{{ $errors->has('contact_message') ? ' has-error' : '' }}">
     

     <div class="col-md-offset-5 col-md-5">
         {!! Form::textarea('contact_message', 
                         null,
                         array( 'class'=>'form-control' 
                         ))
                          !!}
         @if ($errors->has('contact_message'))
             <span class="help-block">
                 <strong>{{ $errors->first('contact_message') }}</strong>
             </span>
         @endif
     </div>
     <label for="contact_message" class="col-md-2 control-label">الرساله </label>
 </div>
 <div class="clearfix"></div>
 <br>
{{--   @if($contact)
<div class="form-group{{ $errors->has('contact_view') ? ' has-error' : '' }}">
     

     <div class="col-md-offset-5 col-md-5">
         {!! Form::select('contact_view', 
                         view_con (),null,
                         array( 'class'=>'form-control select2' 
                         ))
                          !!}
         @if ($errors->has('contact_view'))
             <span class="help-block">
                 <strong>{{ $errors->first('contact_view') }}</strong>
             </span>
         @endif
     </div>
     <label for="contact_view" class="col-md-2 control-label">الحاله </label>
 </div>
 <div class="clearfix"></div>
 <br>
@endif  --}}

 <div class="form-group">
     <div class=" col-md-offset-8 col-md-4">
         <button type="submit" class="btn btn-success">
           <i class="fa fa-user"></i>   الرساله   
         </button>
     </div>
 </div>
