<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\controller;

use Datatables;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      
        return view('admin.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
        //;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
     
      /* // method 2
        $input = $request->all();
        //dd($input);
        contact::create($input);
        return redirect()->back()->withFlashMessage('تم الارسال'); */
        
      //method 1 
        $data = [
            "contact_message"      => $request->contact_message, 
            "contact_name"     => $request->contact_name, 
            "contact_email"      => $request->contact_email,
            "contact_subject"    => $request->contact_type,
     ];
      //  dd($data);
        Contact::create($data);
        return Redirect::back()->withFlashMessage('تم الاضافة بنجاح');  
        
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
        $contact = Contact::find($id);
        $contact->fill(['contact_view' => 1])->save();
    return view('admin.contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            "contact_message"      => $request->contact_message, 
            "contact_name"     => $request->contact_name, 
            "contact_email"      => $request->contact_email,
            "contact_subject"    => $request->contact_subject,
            "contact_view"    => $request->contact_view,

     ];
        contact::find($id)->update($data) ;
         
        return redirect('/controlpanel/contact')->withFlashMessage('تم تعديل الرساله بنجاح');
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
       
        Contact::findOrFail($id)->delete();
        return redirect('/controlpanel/contact')->withFlashMessage('تم المسح بنجاح');
        
    }

    public function myData()
    {
        
        $contact = Contact::all(); 
        return Datatables::of($contact)
      
        ->editColumn('contact_name', function($model){
            return \Html::link('/controlpanel/contact/'.$model->id.'/edit',$model->contact_name);
        })
        ->editColumn('contact_view', function($model){
            return $model->contact_view == 0 ? '<span class="badge badge-info">'.'لم يقراء'. '</span>' :'<span class="badge badge-info">'.'تم '. '</span>';        })
      
         ->editColumn('contact_subject', function($model){
             $type = contact();
            return '<span class="badge badge-info">'. $type[$model->contact_subject] . '</span>' ;
        })
        
        ->editColumn('control', function($model){
        $all = '<a href="/controlpanel/contact/'.$model->id.'/edit" class="btn btn-info btn-circle"><i class="fa fa-edit"></i>';
       
        $all .= '<a href="/controlpanel/contact/'.$model->id.'/delete" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>';
   
        return $all;

        })
        ->make(true);
        
    }
}
