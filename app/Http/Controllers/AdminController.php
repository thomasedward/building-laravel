<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Bu;
use App\Contact;


class AdminController extends Controller
{
    //
    public function index()
    {
        $mapping = Bu::select('bu_latitude','bu_langtude','bu_name')->get();
        $chart  = Bu::select(DB::raw('COUNT(*) as counting , bu_month'))->groupBy('bu_month')->orderBy('bu_month','asc')->get();
         //  dd($price);
        return view('admin.home.index' , compact('mapping' ,'chart' ));
    }
}
