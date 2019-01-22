@if ( Session::has('flash_message') )
<div  class="container "style="width:600px; padding : 10px;">
<div class="alert alert-success" id="mes">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  {{ Session::get('flash_message') }}
  </div>
</div>  
    
@endif