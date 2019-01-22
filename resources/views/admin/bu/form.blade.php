
 {{ csrf_field() }}
 <div class="form-group{{ $errors->has('bu_name') ? ' has-error' : '' }}">

     <div class="col-md-offset-5 col-md-5">
         {!! Form::text('bu_name', 
                         null,
                         array('class'=>'form-control' 
                         ))
                          !!}
         @if ($errors->has('bu_name'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_name') }}</strong>
             </span>
         @endif
     </div>
     <label for="bu_name" class="col-md-2 control-label">اسم العقار</label>
 </div>
 <div class="clearfix"></div>
 <br>
                   
 <div class="form-group{{ $errors->has('bu_rooms') ? ' has-error' : '' }}">
                            

        <div class="col-md-offset-5 col-md-5">
            {!! Form::text('bu_rooms', 
                            null,
                            array( 'class'=>'form-control' 
                            ))
                             !!}
            @if ($errors->has('bu_rooms'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_rooms') }}</strong>
                </span>
            @endif
        </div>
        <label for="bu_rooms" class="col-md-2 control-label">عدد الغرف </label>
    </div>
    <div class="clearfix"></div>
    <br>                    

 <div class="form-group{{ $errors->has('bu_price') ? ' has-error' : '' }}">
     

     <div class="col-md-offset-5 col-md-5">
         {!! Form::text('bu_price', 
                         null,
                         array( 'class'=>'form-control' 
                         ))
                          !!}
         @if ($errors->has('bu_price'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_price') }}</strong>
             </span>
         @endif
     </div>
     <label for="bu_price" class="col-md-2 control-label">السعر</label>
 </div>
 <div class="clearfix"></div>
 <br>
 <div class="form-group{{ $errors->has('bu_place') ? ' has-error' : '' }}">
     

        <div class="col-md-offset-5 col-md-5">
            {!! Form::select('bu_place', 
            bu_place(),null,
                            array( 'class'=>'my-select form-control select2' 
                            ))
                             !!}
                                 @if ($errors->has('bu_place'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_place') }}</strong>
                </span>
            @endif
        </div>
        <label for="bu_place" class="col-md-2 control-label"> المنطقة </label>
    </div>
    <div class="clearfix"></div>
    <br> 
     <div class="form-group{{ $errors->has('bu_rent') ? ' has-error' : '' }}">
     

     <div class="col-md-offset-5 col-md-5">
         {!! Form::select('bu_rent', 
                         bu_rent(),null,
                         array( 'class'=>'form-control select2' 
                         ))
                          !!}
                              @if ($errors->has('bu_rent'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_rent') }}</strong>
             </span>
         @endif
     </div>
     <label for="bu_rent" class="col-md-2 control-label"> نوع العمليه </label>
 </div>
 <div class="clearfix"></div>
 <br> 

 
 <div class="form-group{{ $errors->has('bu_square') ? ' has-error' : '' }}">
     

     <div class="col-md-offset-5 col-md-5">
         {!! Form::text('bu_square', 
                         null,
                         array( 'class'=>'form-control' 
                         ))
                          !!}
         @if ($errors->has('bu_square'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_square') }}</strong>
             </span>
         @endif
     </div>
     <label for="bu_square" class="col-md-2 control-label">المساحه</label>
 </div>
 <div class="clearfix"></div>
 <br>

 <div class="form-group{{ $errors->has('bu_type') ? ' has-error' : '' }}">
      <div class="col-md-offset-5 col-md-5">
         {!! Form::select('bu_type', 
                         bu_type(),null,
                         array( 'class'=>'form-control select2' 
                         ))
                          !!}
                              @if ($errors->has('bu_type'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_type') }}</strong>
             </span>
         @endif
     </div>
     <label for="text" class="col-md-2 control-label">النوع </label>
 </div>
 <div class="clearfix"></div>
 <br> 

 <div class="form-group{{ $errors->has('bu_meta') ? ' has-error' : '' }}">
     <div class="col-md-offset-5 col-md-5">
         {!! Form::text('bu_meta', 
                         null,
                         array( 'class'=>'form-control select2' 
                         ))
                          !!}
         @if ($errors->has('bu_meta'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_meta') }}</strong>
             </span>
         @endif
     </div>
     <label for="bu_meta" class="col-md-2 control-label">الكلمات الداليه</label>
 </div>
 <div class="clearfix"></div>
 <br>

 <div class="form-group{{ $errors->has('bu_small_dis') ? ' has-error' : '' }}">
     <div class="col-md-offset-5 col-md-5">
         {!! Form::textarea('bu_small_dis', 
                         null,
                         array( 'class'=>'form-control' ,'rows'=>'4'
                         ))
                          !!}
         @if ($errors->has('bu_small_dis'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_small_dis') }}</strong>
             </span>
         @endif
         <br>
         <div class="alert alert-danger text-center" style="padding:0;">
         لا يمكن ادخال اكثر من 160 حرف ع حسب معاير جوجل
         </div>
     </div>
     <label for="bu_small_dis" class="col-md-2 control-label">وصف العقار لمحركات البحث</label>
 </div>
 <div class="clearfix"></div>
 <br>

 <div class="form-group{{ $errors->has('bu_langtude') ? ' has-error' : '' }}">
     <div class="col-md-offset-5 col-md-5">
         {!! Form::text('bu_langtude', 
                         null,
                         array( 'class'=>'form-control' 
                         ))
                          !!}
         @if ($errors->has('bu_langtude'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_langtude') }}</strong>
             </span>
         @endif
     </div>
     <label for="bu_langtude" class="col-md-2 control-label">خط الطول  </label>
 </div>
 <div class="clearfix"></div>
 <br>

 <div class="form-group{{ $errors->has('bu_latitude') ? ' has-error' : '' }}">
     <div class="col-md-offset-5 col-md-5">
         {!! Form::text('bu_latitude', 
                         null,
                         array( 'class'=>'form-control' 
                         ))
                          !!}
         @if ($errors->has('bu_latitude'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_latitude') }}</strong>
             </span>
         @endif
     </div>
     <label for="bu_latitude" class="col-md-2 control-label"> دوائر العرض </label>
 </div>
 <div class="clearfix"></div>
 <br>
 <div class="form-group{{ $errors->has('bu_large_dis') ? ' has-error' : '' }}">
        <div class="col-md-offset-5 col-md-5">
            {!! Form::textarea('bu_large_dis', 
                            null,
                            array( 'class'=>'form-control' 
                            ))
                             !!}
            @if ($errors->has('bu_large_dis'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_large_dis') }}</strong>
                </span>
            @endif
        </div>
        <label for="bu_large_dis" class="col-md-2 control-label">  وضف مطول للعقار </label>
    </div>
    <div class="clearfix"></div>
    <br>

 
 @if(!isset($user))
 <div class="form-group{{ $errors->has('bu_status') ? ' has-error' : '' }}">
      <div class="col-md-offset-5 col-md-5">
         {!! Form::select('bu_status', 
                         bu_status (),null,
                         array( 'class'=>'form-control select2' 
                         ))
                          !!}
                              @if ($errors->has('bu_status'))
             <span class="help-block">
                 <strong>{{ $errors->first('bu_status') }}</strong>
             </span>
         @endif
     </div>
     <label for="text" class="col-md-2 control-label">الحاله </label>
 </div>
 <div class="clearfix"></div>
 <br>
 @endif

 <div class="form-group{{ $errors->has('bu_image') ? ' has-error' : '' }}">
        <div class="col-md-offset-5 col-md-5">
       @if(isset($bu))
        @if($bu->bu_image != '')
         <img width="477" height="200" src="{{ Request::root().'/website/bu_images/'.$bu->bu_image }}">


        @endif
       @endif
         <br>
         <br>
           {!! Form::file('bu_image', 
                           array( 'class'=>'form-control ' 
                           ))
                            !!}
                                @if ($errors->has('bu_image'))
               <span class="help-block">
                   <strong>{{ $errors->first('bu_image') }}</strong>
               </span>
           @endif
       </div>
       <label for="text" class="col-md-2 control-label">صورة العقار </label>
   </div> 
   <div class="clearfix"></div>
 <br>
            
 <div class="form-group">
     <div class=" col-md-offset-8 col-md-4">
         <button type="submit" class="btn btn-success">
           <i class="fa fa-user"></i>   تاكيد 
         </button>
     </div>
 </div>
