<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequestAdmin;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Datatables;
use  App\User;
use  App\Bu;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequestAdmin $request ,User $user)
    {
      $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'admin' => $request ->admin,
        ]);
        return  redirect('/controlpanel/users')->withFlashMessage('تم اضافة العضو بنجاح');
    }

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
        $user = User::find($id);
        $buable =Bu::where('user_id' , $id)->where('bu_status',1)->paginate(10);
        $buunable =Bu::where('user_id' , $id)->where('bu_status',0)->paginate(10);
      //  dd($bu);

        return view('admin.user.edit',compact('user','buable','buunable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id  )
    {
        $userUpdate  = User::find($id);
        $userUpdate->fill($request->all())->save();
        return redirect('/controlpanel/users')->withFlashMessage('تم تعديل العضوية بنجاح');
    }

     public function changePassword(Request $request ,User $user)
    {
        # code...
        $UserUpdatePassword  = $user->find($request->user_id);
       // dd($UserUpdatePassword); 
        $password = bcrypt($request->password);
        $UserUpdatePassword->fill(['password' => $password ])->save();
       
      return redirect('/controlpanel/users')->withFlashMessage('تم تعديل كلمة المرور للعضوية بنجاح');
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
        if($id !=  1){
            $user = User::findOrFail($id)->delete();
            Bu::where('user_id', $id)->delete();
            return redirect('/controlpanel/users')->withFlashMessage('تم المسح بنجاح');
            }
            else
            {
                return redirect('/controlpanel/users')->withFlashMessage('لا يمكن مسح هذا المسخدم نهائيا ');
            }
    }
    public function myData()
    {
        
        $user = User::all(); 
        return Datatables::of($user)
        ->editColumn('name', function($model){
            return \Html::link('/controlpanel/users/'.$model->id.'/edit',$model->name);
        })
         ->editColumn('admin', function($model){
            return $model->admin == 0 ? '<span class="badge badge-info">'.'عضو'. '</span>' :'<span class="badge badge-info">'.'مدير'. '</span>';
        })
         ->editColumn('mybu', function($model){
            return '<a href="/controlpanel/building/'.$model->id.'" class="btn btn-primary btn-circle"><i class="fa fa-link"></i>';
        })
        ->editColumn('control', function($model){
        $all = '<a href="/controlpanel/users/'.$model->id.'/edit" class="btn btn-info btn-circle"><i class="fa fa-edit"></i>';
        if($model->id != 1){
        $all .= '<a href="/controlpanel/users/'.$model->id.'/delete" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>';
        }
        return $all;

        })
        ->make(true);
        
    }

      //user out 
      public function usersetting()
      { 
         
             $user =  Auth::user();
           return view('website.profile.edit',compact('user'));
      }

      public function usersettingupdate(UserUpdateRequest $request)
      {
          //dd($request);
          $user = 
          Auth::user();
         // dd('request : '.$request->email .'/user : '.$user->email);
            if($request->email !== $user->email)
            {
                
                  $checkemail = User::where('email',$request->email)->count();
              
                  if($checkemail == 0)
                  { 
                      // dd(3);
                      User::findOrFail($user->id)->update($request->all());
                  }
                  else
                  {
                      //  dd(4);
                      return redirect()->back()->withFlashMessage('هذا البريد موجود مسبقا');
                  }
            }
         
              else
              {
                      // dd(2);
                      User::findOrFail($user->id)->update(['name' => $request->name]);
                  
              }
          
          return redirect()->back()->withFlashMessage('تم تعديل البيانات');
      }
      public function updatepassworduser(UserUpdatePasswordRequest $request)
      {
          $user = Auth::user();
          
          $input = User::find($user->id);
          $password = bcrypt($request->password);
          $newpassword = bcrypt($request->newpassword);
          // dd('123456 => '. $user->password.'== : '.$request->password .' => '.$password);
          if(
          Hash::check($request->password, $user->password)
          )
          {
              // dd('new');
          $input->fill([ 'password'=>$newpassword ])->save();
          }
          else
          {
              // dd('noconfirm');
              return redirect()->back()->withFlashMessage('كلمة المرور القديمة غير صحيحة');
          }
          return redirect()->back()->withFlashMessage('تم التعديل  ');
      }
}
