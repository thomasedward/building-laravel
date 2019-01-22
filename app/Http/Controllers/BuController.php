<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\BuRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use  App\User;
use  App\Bu;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use function Symfony\Component\VarDumper\Dumper\esc;
use Psy\Util\Str;
  
class BuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->uid != null ? '?user_id='.$request->uid : null;
        //$status = $request->status != null ? '?status='.$request->status : null;
        
      
        $user = User::all();
        return view('admin.bu.index',compact('user','id','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuRequest $request)
    {
        if($request->file('bu_image'))
        {
            $filename =  $request->file('bu_image')->getClientOriginalName();
            $destinationPath= base_path().'/public/website/bu_images/' ;
            $request->file('bu_image')->move($destinationPath, $filename);
            $imageName = $filename;
        }
        else
        {
            $imageName = 'defailt.png';
        }
        $user =Auth::user();

        $data = [
            "bu_name"      => $request->bu_name, 
            "bu_price"     => $request->bu_price, 
            "bu_rent"      => $request->bu_rent,
            "bu_square"    => $request->bu_square,
            "bu_type"      => $request->bu_type,
            "bu_rooms"        => $request->bu_rooms,
            "bu_small_dis" => $request->bu_small_dis,
            "bu_large_dis" => $request->bu_large_dis,
            "bu_meta"      => $request->bu_meta,
            "bu_langtude"  => $request->bu_langtude,
            "bu_latitude"  => $request->bu_latitude, 
            "bu_place"  => $request->bu_place, 
            "bu_image"  => $imageName, 
            "bu_status"    => $request->bu_status ,
            "user_id"      => $user->id,
            "bu_month"     => date('m'),
            
            //"bu_place"     => $request->bu_place,
            //"bu_image"     => $image,
        ];
      //  dd($data);
        Bu::create($data);
        return redirect('/controlpanel/building')->withFlashMessage('تم الاضافة بنجاح');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bu = Bu::find($id);
        if($bu->user_id ==  0)
        {
            $userbu = '';
        
        }
        else
        {
        $userbu = User::where('id' , $bu->user_id)->get()[0];
            }
           
       
        return view('admin.bu.edit',compact('bu','userbu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BuRequest $request, $id)
    {
        $buUpdate  = Bu::find($id); 
        

        //v1.0
        $buUpdate->fill(array_except( $request->all(), ['bu_image']))->save();
        if($request->file('bu_image'))
        {
           $filename = uploadImage2($request->file('bu_image'));
      if($filename == false)
      {
               return Redirect::back()->withFlashMessage('(  من فضلك اختبار صورة مناسبة الاحجام العرض 500 -- الطول 362  ) ');
            }
            else
            {   
            $buUpdate->fill(['bu_image' => $filename])->save();
        }
        }

        return redirect('/controlpanel/building')->withFlashMessage('تم تعديل العضوية بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
        //secrch about id and delete this element
       
        Bu::findOrFail($id)->delete();
        return redirect('/controlpanel/building')->withFlashMessage('تم المسح بنجاح');
        
    }


    public function myData(Request $request)
    {
   
     
        if($request->user_id )
        {
           
        $bu = Bu::where('user_id', $request->user_id)->get(); 
        }
        else
         {
        $bu = Bu::all(); 
        }
        
 
        return Datatables::of($bu)
        ->editColumn('bu_name', function($model){
            return \Html::link('/controlpanel/building/'.$model->id.'/edit',$model->bu_name);
        })
      
         ->editColumn('bu_type', function($model){
             $type = bu_type();
            return '<span class="badge badge-info">'. $type[$model->bu_type] . '</span>' ;
        })
        ->editColumn('bu_status', function($model){
            return $model->bu_status == 0 ? '<span class="badge badge-info">'.'غير مفعل'. '</span>' :'<span class="badge badge-info">'.'مفعل'. '</span>';        })
        ->editColumn('control', function($model){
        $all = '<a href="/controlpanel/building/'.$model->id.'/edit" class="btn btn-info btn-circle"><i class="fa fa-edit"></i>';
        if($model->id != 1){
        $all .= '<a href="/controlpanel/building/'.$model->id.'/delete" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>';
        }
        return $all;

        })
        ->make(true);
      
    }
    public function showBuAllEnable(Bu $bu)
    {
        $bu = Bu::where('bu_status', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('website.bu.all',compact('bu')); 
    }

    public function showBuRentEnable(Bu $bu)
    {
        
        $bu = Bu::where('bu_status', 1)->where('bu_rent',1)->orderBy('id', 'DESC')->paginate(3);
        return view('website.bu.all',compact('bu')); 
    }
    public function showBuBuyEnable(Bu $bu)
    {
        $bu = Bu::where('bu_status', 1)->where('bu_rent',0)->orderBy('id', 'DESC')->paginate(3);
        return view('website.bu.all',compact('bu')); 
    }
    public function showByType($type ,Bu $bu)
    {
        if( in_array($type , ['0','1','2']) )
        {
            $bu = Bu::where('bu_status', 1)->where('bu_type',$type)->orderBy('id', 'DESC')->paginate(3);
            return view('website.bu.all',compact('bu')); 
        }
        else
        {
             return redirect()->back();
        }
    }

    public function search(Request $request)
    {
       

        // v2.0
 
        $requestBuAll  = array_except($request->toArray() , ['submit','_token','page']);
        $query = DB::table('bu')->select('*');
        $array = [];
        $cout = count($requestBuAll);
        $i = 0; 
        
        foreach ($requestBuAll as $key => $req) 
        {
            
            $i++;
          if($req != ''  )
          {
               
   
                   if( $key == 'bu_price_from' && $request->bu_price_too == '')
                   {
                       $query->where('bu_price', ">=", $req)->get();
                   }
                   elseif( $key == 'bu_price_too' && $request->bu_price_from == '')
                   {
                       $query->where('bu_price', "<=", $req)->get();
                   }
               
                   else
                   {
                       if($key != 'bu_price_too' && $key != 'bu_price_from' )
                       {
                           $query->where($key,$req)->get();
                       }    
                   }
   
                       $array[$key] = $req;
            }
            elseif($cout == $i && $request->bu_price_too != '' && $request->bu_price_from )
                   {

                  
                     $query->whereBetween('bu_price', [ $request->bu_price_from ,  $request->bu_price_too  ])->get();
                    
                       if(!empty($request->bu_square))
                       {
                       $array[$key] = $req;
                    }
                   }    
        }
    
        $bu = $query->where('bu_status',1)->orderBy('bu_price','ASC')->paginate(3);
       


        return view('website.bu.all',compact('bu','array'));
        
       /* 
        //v1.0
       $buAll = Bu::where('bu_status', 1)
                   ->where('bu_price',$request->bu_price_from)
                   ->where('bu_rooms',$request->bu_rooms)
                   ->where('bu_type',$request->bu_type)
                   ->where('bu_rent',$request->bu_rent)
                   ->where('bu_square',$request->bu_square)
                   ->orderBy('id', 'DESC')->paginate(3);
        return view('website.bu.all',compact('buAll')); 
 */

    } 
    public function showBuilding($id , Bu $bu)
    {
     
        $buinfo = Bu::findOrFail($id);
        if($buinfo->bu_status == 0 )
        {
            return  view('website.bu.noper',compact('buinfo'));

        }
        $same_rent  = Bu::where('bu_rent',$buinfo->bu_rent)->where('id', '<>', $id)->orderBy(DB::raw('RAND()'))->take(3)->get();   
        $same_type  = Bu::where('bu_type',$buinfo->bu_type)->where('id', '<>', $id)->orderBy(DB::raw('RAND()'))->take(3)->get();   
        $same_place = Bu::where('bu_place',$buinfo->bu_place)->where('id', '<>', $id)->orderBy(DB::raw('RAND()'))->take(3)->get();   
        $same_rooms = Bu::where('bu_rooms',$buinfo->bu_rooms)->where('id', '<>', $id)->orderBy(DB::raw('RAND()'))->take(3)->get();   
     
    return  view('website.bu.buinfo',compact('buinfo','same_rent','same_type','same_place','same_rooms'));
    }

    public function ajaxinfo(Request $request)
    {
      return  Bu::find($request->id)->toJson();
    } 

    public function userAddView()
    {
        return view('website.userbu.useradd');
    }
    public function userStore(BuRequest $request)
    {
    
        if($request->file('bu_image'))
        {
            $filename =  $request->file('bu_image')->getClientOriginalName();
            $destinationPath= base_path().'/public/website/bu_images/' ;
            $request->file('bu_image')->move($destinationPath, $filename);
            $imageName = $filename;
        }
        else
        {
            $imageName = 'defailt.png';
        }
        if(Auth::user())
        {
        
          $user =Auth::user()->id;
        }
        else
        {
            $user = 1;
        }

        $data = [
            "bu_name"      => $request->bu_name, 
            "bu_price"     => $request->bu_price, 
            "bu_rent"      => $request->bu_rent,
            "bu_square"    => $request->bu_square,
            "bu_type"      => $request->bu_type,
            "bu_rooms"      => $request->bu_rooms,
            "bu_small_dis" => $request->bu_small_dis,
            "bu_large_dis" => $request->bu_large_dis,
            "bu_meta"      => $request->bu_meta,
            "bu_langtude"  => $request->bu_langtude,
            "bu_latitude"  => $request->bu_latitude, 
            "bu_place"  => $request->bu_place, 
            "bu_image"  => $imageName, 
            "user_id"      => $user,
            "bu_month"     => date('m'),
          
        ];
      //  dd($data);
        Bu::create($data);
        return view('website.userbu.done');
    }

      // show bu for user
    public function buildingshow()
    {
        $user =   Auth::user();
        
      $bu = Bu::where('user_id', $user->id )->where('bu_status', 1)->orderBy('id','desc')->paginate(3);
      return view('website.userbu.showuserbu',compact('bu','user'));
    }
    public function buildingshowunable()
    {
      $user = Auth::user();
      $bu = Bu::where('user_id', $user->id )->where('bu_status', 0 )->orderBy('id','desc')->paginate(3);
      return view('website.userbu.showuserbu',compact('bu','user'));
    } 
    // edit bu after active
     // for update building for user
    public function singlebuildinguser($id)
    {
         $user =  Auth::user();
        
         $bu = Bu::find($id);
         
         if($user->id != $bu->user_id || Bu::where('bu_status', 1 )->find($id))
         {
             return redirect()->back()->withFlashMessage('هذا خارج صلاحياتك ');
         }
         else
         {
         return view('website.userbu.edituserbu',compact('bu','user'));
         }

    }
    public function updateuserbu(BuRequest $request)
    {
   
         $updateimage =Bu::find($request->bu_id);
        $input = $request->all();
      
        $imagename = $updateimage['bu_image'];
        if(!isset($input['bu_image']))
     { 
        // dd($imagename);
     Bu::find($request->bu_id)->fill( array_except($request->all(), ['bu_image']) )->save() ;
        return redirect()->back()->withFlashMessage('تم التعديل ');
      
     }
     else
     {
       Bu::find($request->bu_id)->fill(array_except($request->all(), ['bu_image']))->save() ;  
     
     }
     if($imagename == '' || $imagename ="defailt.png" )
     {
     
       
            $filename = uploadImage1($request->file('bu_image'),'/website/bu_images/');
            if(!$filename)
            {
                 return redirect()->back()->withFlashMessage('عذرا اختيار صوره زى مقاس مناسب وهو 500*400');
                 dd('here3');
            }
            Bu::find($request->bu_id)->update( ['bu_image'=> $filename]  )  ;

        return redirect()->back()->withFlashMessage('تم التعديل ');
        dd('here4');
     }
    
    }

   public function changeStatus(Request $request) 
   {
     $bu = Bu::find($request->id)->update(['bu_status' => $request->status]);
     
     if($request->status == 1)
     {
        return redirect()->back()->withFlashMessage('تم التفعيل ');
     }
     else
     {
        return redirect()->back()->withFlashMessage('تم الغاء التفعيل ');
     }
    
   }
    
}
