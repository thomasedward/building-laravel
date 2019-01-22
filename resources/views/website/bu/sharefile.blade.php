@if (count($bu) > 0)

@foreach ($bu as $key => $bu)
 	@if ($key % 3 == 0)
        <div class="clearfix"> </div>
    @endif  
   
        <div class="col-md-4 column productbox pull-right">
                <div class='part1'>
                <img src="{{ checkImageFound($bu->bu_image) }}" width="100%"  height="50%">
                <div class="producttitle">{{ $bu->bu_name }}</div>
                <div class="product-desc">{{ str_limit($bu->bu_small_dis,80) }}</div>
                <span style="display : block;"> <strong>المساحه :</strong> {{  $bu->bu_square}} </span>
                <span style="display : block;"> <strong>نوع العمليه :</strong> {{ bu_rent ()[$bu->bu_rent]}} </span>
                <span style="display : block;"> <strong>نوع العقار :</strong> {{ bu_type ()[$bu->bu_type]}} </span>
                </div>
                <div class="productprice">
                <div class="pull-left">
                @if($bu->bu_status == 0)
                
                {{-- <a href="{{url('/singlebuilding/' . $b->id)}}" class="btn     btn-xm" role="button">  ينتظر الاداره   <i class="fa fa-file-text"></i>  </a> --}}
                <a href="{{url('/user/singlebuildinguser/' . $bu->id)}}" class="btn  btn-danger   btn-xm" role="button"> تعديل  <i class="fa fa-file-text"></i>  </a>
                @else
                <a href="{{  url('/singlebuilding/' . $bu->id )}}" class="btn btn-info  btn-sm" role="button"> اظهر التفاصيل  <i class="fa fa-file-text"></i>  </a>
                @endif
                </div>
                <div class="pricetext">{{ str_limit($bu->bu_price,12) }} ج.م</div>
                </div>
        </div>
    @endforeach

   
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    
    @else
    <br>
    <div class="alert alert-danger">
     لا يوجد اى عقارت حاليا
    </div>
    
    @endif