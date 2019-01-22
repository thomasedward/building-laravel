
				<div class="col-md-3">
                        @if (!isset($user))
    
                   
                        <div class="profile-sidebar">
                                     <div class="producttitle text-center">خيارات البحث</div>
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                          {!! Form::open(['url'=>'search','method'=>'get']) !!}
                                        <ul class="nav navbu">
                                            <li >
                                                  <div id="custom-search-input">
                                                          <div class="input-group col-md-12">
                                                              {!! Form::text('bu_price_from', 
                                                                              null,
                                                                              array( 'class'=>'search-query form-control' ,
                                                                              'placeholder' => ' سعر العقار من', 
                                                                              ))
                                                                               !!}
                                                              
                                                          </div>
                                                      </div>
                                            </li>
                                            <br>
                                            <br>
                                            <li>
                                              <div id="custom-search-input">
                                                <div class="input-group col-md-12">
                                                    {!! Form::text('bu_price_too', 
                                                                    null,
                                                                    array( 'class'=>'search-query form-control' ,
                                                                    'placeholder'=>' سعر العقار الى',
                                                                    ))
                                                                     !!}
                                                    
                                                </div>
                                            </div>
                                            </li>
                                            <br>
                                            <br>
                                            <li>
                                              <div id="custom-search-input" style="margin-right:10px;">
                                                <div class="input-group col-md-12">
                                                    {!! Form::select('bu_rooms', 
                                                                    num_rooms (),
                                                                    null,
                                                                    [ 'class'=>'my-select form-control select2' ,
                                                                    'placeholder' => 'عدد الغرف '
                                                                    ])
                                                                     !!}
                                                    
                                                </div>
                                            </div>
                                            </li>
                                      
                                            <li>
                                              <div id="custom-search-input" style="margin-right:10px;">
                                                <div class="input-group col-md-12" >
                                                    {!! Form::select('bu_place', 
                                                                    bu_place (),
                                                                    null,
                                                                    array( 'class'=>'my-select form-control select2' ,
                                                                    'placeholder'=>'المنطقه  '
                                                                    ))
                                                                     !!}
                                                    
                                                </div>
                                            </div>
                                            </li>
                                          
                                                <li>
                                              <div id="custom-search-input">
                                                <div class="input-group col-md-12" style="margin-right:10px;">
                                                    {!! Form::select('bu_type', 
                                                                    bu_type (),
                                                                    null,
                                                                    array( 'class'=>'my-select form-control select2' ,
                                                                    'placeholder'=>' الحاله '
                                                                    ))
                                                                     !!}
                                                    
                                                </div>
                                            </div>
                                            </li>
                                                   
                                        <li>
                                              <div id="custom-search-input" style="margin-right:10px;">
                                                <div class="input-group col-md-12">
                                                    {!! Form::select('bu_rent', 
                                                                    bu_rent (),
                                                                    null,
                                                                    array( 'class'=>'my-select form-control' ,
                                                                    'placeholder'=>'نوع العمليه  '
                                                                    ))
                                                                     !!}
                                                    
                                                </div>
                                            </div>
                                            </li>
                                      
                                            <li>
                                              <div id="custom-search-input" >
                                                <div class="input-group col-md-12">
                                                    {!! Form::text('bu_square', 
                                                                    null,
                                                                    array( 'class'=>'search-query form-control select2' ,
                                                                    'placeholder'=> 'مساحه العقار '
                                                                    ))
                                                                     !!}
                                                    
                                                </div>
                                            </div>
                                            </li>
                                            <br>
                                            <br>		
                                            <li>
                                              <div id="custom-search-input">
                                                <div class="input-group col-md-12">
                                                    {!! Form::submit('ابحث', 
                                                                    array( 'class'=>'btn btn-success' 
                                                                    ))
                                                                     !!}
                                                    
                                                </div>
                                            </div>
                                            </li>
                                            <br>
                                            <br>		
                                   </ul>
                                    {!! Form::close() !!}
                                    </div>
                                    <!-- END MENU -->
                                </div>
                                @endif
                  
                      <br>
                          <div class="profile-sidebar">
                               <div class="producttitle text-center">خيارات العضو</div>
                              <!-- SIDEBAR MENU -->
                              <div class="profile-usermenu">
                                  <ul class="nav navbu">
                                      <li class="{{ setActive(['user','usersetting']) }}">
                                          <a href="{{ url('/user/usersetting') }}">
                                          <i class="fa fa-building fa-2x"></i>
                                          تعديل المعلومات الشخصيه 
                                      
                                        </a> 
                                      </li>
                                      
                                      <li class="{{ setActive(['user','buildingshow']) }}">
                                          <a href="{{ url('/user/buildingshow') }}">
                                          <i class="fa fa-bookmark fa-2x"></i>
                                  <span class="pull-left text-center" 
                                        style="background-color:#2abb9b;width:20px; border-radius: 20px; color:#fff;"></span>	
                                            عقارتى    
                                            @if (Auth::user())
                                            <span class="pull-left"> {{ countforbuildactive(Auth::user()->id) }}</span>   
                                                    
                                                @endif
                                        </a>
                                      </li>
                                      <li  class="{{ setActive(['user','buildingshowunable']) }}">
                                          <a href="{{ url('/user/buildingshowunable') }}">
                                          <i class="fa fa-bookmark fa-2x" style='color:#f00;'></i>
                                  <span class="pull-left text-center" style="background-color:#f00;width:20px; border-radius: 20px; color:#fff;"></span>		 (تنتظر الادارة) عقارتى  
                                  @if (Auth::user())
                                  <span class="pull-left"> {{ countforbuildunactive(Auth::user()->id) }}</span>   
                                          
                                      @endif
                                </a>
                                      </li>
                                      <li class="{{ setActive(['user','create','building']) }}">
                                          <a href="{{ url('/user/create/building') }}" target="_blank">
                                          <i class="fa fa-bookmark-o"></i>
                                          اضف عقار </a>
                                      </li>
                                
                                                                  </ul>
                              </div>
                              <!-- END MENU -->
                          </div>
                          <br>
                          <div class="profile-sidebar">
                                  <div class="producttitle text-center">خيارات العقارات</div>
                                 <!-- SIDEBAR MENU -->
                                 <div class="profile-usermenu">
  
  
                                     <ul class="nav navbu">
                                         <li class="{{ setActive(['showbu']) }}">
                                             <a href="{{ url('/showbu') }}">
                                             <i class="fa fa-building fa-2x"></i>
                                          كل العقارات 
                                          <span class="pull-left"> {{ conutbu() }}</span>   
                                        </a>
                                         </li>
                                         
                                         <li class="{{ setActive(['forrent']) }}">
                                             <a href="{{ url('/forrent') }}">
                                             <i class="fa fa-bookmark fa-2x"></i>
                                     <span class="pull-left text-center" style="background-color:#2abb9b;width:20px; border-radius: 20px; color:#fff;"></span>	ايجار  
                                     <span class="pull-left"> {{ conutrent() }}</span> 
                                    </a>
                                         </li>
                                         <li  class="{{ setActive(['forbuy']) }}">
                                             <a href="{{ url('/forbuy') }}">
                                             <i class="fa fa-bookmark fa-2x" style='color:#f00;'></i>
                                     <span class="pull-left text-center" style="background-color:#f00;width:20px; border-radius: 20px; color:#fff;">
                                         </span>		تمليك 
                                         <span class="pull-left"> {{ conutbuy() }}</span> 
                                        </a>
                                         </li>
                                         <li class="{{ setActive(['type','0']) }}">
                                             <a href="{{ url('/type/0') }}" >
                                             <i class="fa fa-bookmark-o"></i>
                                             شقق 
                                             <span class="pull-left"> {{ conuttype0() }}</span> 
                                            </a>
                                         </li>
                                         <li class="{{ setActive(['type','1']) }}">
                                                 <a href="{{ url('/type/1') }}" >
                                                 <i class="fa fa-bookmark-o"></i>
                                                 فلل
                                                 <span class="pull-left"> {{ conuttype1() }}</span> 
                                                </a>
                                             </li>
                                             <li class="{{ setActive(['type','2']) }}">
                                                  <a href="{{ url('/type/2') }}" >
                                                  <i class="fa fa-bookmark-o"></i>
                                                  شاليها
                                                  <span class="pull-left"> {{ conuttype2() }}</span> 
                                                </a>
                                              </li>
                                                                     </ul>
                                 </div>
                                 <!-- END MENU -->
                             </div>
                             <br>
                              </div>