<?php
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

use App\SiteSetting;
use App\Contact;
use App\User;
use App\Bu;

// general for all website 

function getSetting ($settingname = 'sitename' )
{
    return SiteSetting::where('namesetting',$settingname)->get()[0]->value;
}
// fro check image

function checkImageFound($imagename ='' ,$pathImage = '/public/website/bu_images/',$url="/website/bu_images/" )
{
    $path = base_path().$pathImage .$imagename;
  
    // list($width, $height) = getimagesize($request->file('bu_image')->getClientOriginalName()); 
    //         if($width > 500 || $height > 400)
    //         {
    //             return false;
    //         }
    if($imagename != '')
    {
        if(file_exists($path))
    {
       
        return Request::root().$url  .$imagename;
    }
  
    }
   else
   {
     return    getSetting('noImage');}
   
}
//v1.0
 function uploadImage1($request,$pathimage = '/public/website/bu_images',$width = '1600' ,$height = '800')
{
 
        
        $dim = getimagesize($request);
        if($dim[0] >  $width || $dim[1] > $height  )
        {
           
            return false;
        }
        $filename =  $request->getClientOriginalName();
        $destinationPath= base_path().$pathimage ;
        $request->move($destinationPath, $filename);

        return $filename;
    
}

//v2.0  by Image tools 
  function uploadImage2($request,$pathimage = '/public/website/bu_images',$width = '262' ,$height = '362')
{
 
        
        $dim = getimagesize($request);
      
        $filename =  $request->getClientOriginalName();
        $destinationPath= base_path().$pathimage ;
        $request->move($destinationPath, $filename);
        if($width =='262' && $height == '362')
        {
            $sliderpath = base_path().$pathimage.'/'.$filename;
           Image::make($destinationPath .'/'.$filename)->resize('262','362')->save($sliderpath , 100) ;
        }
        return $filename;
    
}
//v3.0 fro delete 
function uploadImage($request,$pathimage = 'website/bu_images',$deleteFileName = '')
{
            $extension = $request->getClientOriginalExtension();
            $sha1 = sha1($request->getClientOriginalName());
            $filename = date('Y-m-d-h-i-s')."-".$sha1.".".$extension;
            $path = public_path($pathimage);        
            $request->move($path,$filename);
            if($deleteFileName != '')
            {
                if(file_exists($deleteFileName))
                {
                    if($deleteFileName != 'defailt.png')
                    {
                     File::delete($deleteFileName);
                     }
                }
            }
            return $filename;
}

// building

function bu_type ()
{
    $array = [
'شقه',
'فيلا',
'شاليه',
    ];
    return $array;
}
function bu_rent ()
{
    $array = [
'تمليك',
'ايجار',

    ];
    return $array;
}
function bu_status ()
{
    $array = [
'غير مفعل',
'مفعل',

    ];
    return $array;
}

function num_rooms ()
{
    $array = [];
    for($i = 0 ; $i <= 30 ;$i++)
    {
        $array[]=$i;
    }
    return $array;
}
function bu_place ()
{
    $array = [
'n-1'=>'القاهره',
'n-2'=>'مرسى مطروح',
'n-3'=>'سفاجا',
'n-4'=>'سوهاج',
'n-5'=>'الغردقه',
'n-6'=>'شرم الشيخ',
'n-7'=>'جنوب سينا',
'n-8'=>'شمال سينا',
'n-9'=>'سينا',
'n-10'=>'البحر الاحمر',
'n-11'=>'المنوفيه',
'n-12'=>'الفيوم',
'n-13'=>'القاهره الكبرى',
'n-14'=>'المنيا',
'n-15'=>'الغربيه',
'n-16'=>'الشرقيه',
'n-17'=>'الدقاليه',
'n-18'=>'الجيزه',
'n-19'=>'دمياط',
'n-20'=>'اسكندريه',
'n-21'=>'قنا',
'n-22'=>'اسيوط',
'n-23'=>'سوهاج',
'n-24'=>'السويس',
'n-25'=>'بورسعيد',
'n-26'=>'الاسماعليه',
'n-27'=>'القناه',
'n-28'=>'الوادى',
'n-29'=>'الاقصر',
'n-30'=>'اسوان'
    ];
    return $array;
}
 function searchname ()
{
    $array = [
'bu_price_from'=>' السعر من',
'bu_price_too'=>' السعر الى' ,
'bu_price'=>' السعر ' ,
'bu_rooms'=>' عدد الغرف',
'bu_place'=>'المنطقه',
'bu_type'=>'الحاله',
'bu_rent'=>'نوع العمليه',
'bu_square'=>'المساحه '
    ];
    return $array;
}

function countforbuild()
{
    return Bu::count();
}
function countallbuforuser($status)
{
    return Bu::where('bu_status',$status)->count();
}
function buunable()
{
   return  Bu::where('bu_status',0)->orderBy('created_at','desc')->take(10)->get();

}
function countforbuildactive($id)
{
 
    return Bu::where('user_id' , $id)->where('bu_status' , 1)->count();
}
function countforbuildunactive($id)
{
   
    return Bu::where('user_id' , $id)->where('bu_status' , 0)->count();
}


// users
function countforuser()
{
    return User::count();
}

function lastuser($num = 2)
{
    return  User::where('Admin',0)->orderBy('created_at','desc')->take($num)->get(); 
}
function lastbu($num = 5)
{
    return  Bu::orderBy('created_at','desc')->take($num)->get(); 
}
// contact page 
function contact ()
{
    $array = [
'1'=>'  اعجاب',
'2'=>'مشكله' ,
'3'=>'اقتراح' ,
'4'=>'استفسار',

    ];
    return $array;
}


function view_con()
{
    $array = [
'1'=>'رسالة قديمة',
'0'=>'رسالة جديدة' ,


    ];
    return $array;
}

function countforcontact()
{
    return Contact::count();
}
function getUnRead()
{
    return Contact::where('contact_view' , 0)->get();
}
function countUnRead()
{
    return Contact::where('contact_view' , 0)->count();
}


// for active 
function setActive($array)
{
    // dd($array);
    if(!empty($array))
    {
        $seg_array = [];
        foreach($array as $key => $url)
        {
            // dd($key+1);
            if(Request::segment($key+1) == $url)
            {
                $seg_array[]=$url;
                
            }
        }
        if(count($seg_array) == count(Request::segments()))
        {
            // dd(2);
          if(isset($seg_array[0]))
            {
            return "active";
            }
        }
    }
    // dd(Request::segment(1));
    // dd(Request::segments());
    
}
function setActivemenu($array)
{
    // dd($array);
    if(!empty($array))
    {
        $seg_array = [];
        foreach($array as $key => $url)
        {
            // dd($key+1);
            if(Request::segment($key+1) == $url)
            {
                $seg_array[]=$url;
            }
        }
        if(count($seg_array) == count(Request::segments()))
        {
            // dd(2);
            if(isset($seg_array[0]))
            {
            return "current";
            }
        }
    }
    // dd(Request::segment(1));
    // dd(Request::segments());
    
}

// خيارات العقارات كاملة 
function conutbu($status = 1)
{
    return Bu::where('bu_status' , $status)->count();
}
function conutrent()
{
    return Bu::where('bu_status' , 1)->where('bu_rent' , 1)->count();
}
function conutbuy()
{
    return Bu::where('bu_status' , 1)->where('bu_rent' , 0)->count();
}
function conuttype0()
{
    return Bu::where('bu_status' , 1)->where('bu_type' , 0)->count();
}
function conuttype1()
{
    return Bu::where('bu_status' , 1)->where('bu_type' , 1)->count();
}
function conuttype2()
{
    return Bu::where('bu_status' , 1)->where('bu_type' , 2)->count();
}

function countbuforuser($id , $status)
{
    return Bu::where('user_id',$id)->where('bu_status' , $status)->count();
}


?>