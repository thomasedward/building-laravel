<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SiteSetting;
class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( SiteSetting $site)
    {
        $site = $site->all();
        return view('admin.sitesetting.index',compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        //  dd(array_except( $request->toArray(), ['_token' , 'submit'] ));
        foreach(array_except( $request->toArray(), ['_token' , 'submit'] )  as $key => $reqs) 
        {
            //dd($key);
          
           $siteupdate = SiteSetting::where('nameSetting',$key)->get()[0];
           
           if($siteupdate->type != 2)
           {
           $siteupdate->fill(['value' => $reqs])->save();
           }
           else
           {
                $filename = uploadImage( $reqs ,'/website/slider',base_path().'/public/website/slider/'.$siteupdate->value);
            
             
                $siteupdate->fill(['value' => $filename])->save();

           }
          
        }
        return redirect()->back()->withFlashMessage('تم التعديل المطلوب ');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
