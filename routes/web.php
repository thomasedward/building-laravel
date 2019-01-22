<?php
     use App\Bu;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*
Admain route
*/

Route::group(['middleware' => ['web','admin']], function () {
    #users
    Route::get('/controlpanel/users/{id}/delete', 'UsersController@destroy');
    Route::get('/controlpanel/users/data', [ 'as' => 'controlpanel.users.data' ,'uses' => 'UsersController@myData' ]);
    Route::get('/controlpanel', 'AdminController@index');
    Route::resource('/controlpanel/users', 'UsersController');
    Route::post('/controlpanel/user/changpassword', 'UsersController@changePassword');
    Route::get('/controlpanel/changestatus/{id}/{status}', 'BuController@changeStatus');

    #sitesetting
    Route::resource('/controlpanel/sitesetting', 'SiteSettingController');
    #building
    Route::get('/controlpanel/building/data', [ 'as' => 'controlpanel.building.data' ,'uses' => 'BuController@myData' ]);
    Route::resource('/controlpanel/building', 'BuController',['except' => ['index','show']]);
    Route::get('/controlpanel/building/{uid?}', 'BuController@index');
    //Route::get('/controlpanel/building/{status?}', 'BuController@index');
    Route::get('/controlpanel/building/{id}/delete', 'BuController@destroy');

    #contact Us 
    Route::get('/controlpanel/contact/{id}/delete', 'ContactController@destroy');
    Route::get('/controlpanel/contact/data', [ 'as' => 'controlpanel.contact.data' ,'uses' => 'ContactController@myData' ]);
    Route::resource('/controlpanel/contact', 'ContactController');
    
});



/*
user route
*/
Route::group(['middleware' =>'web'], function() {
    Route::auth();
    Route::get('/', function () {
        Auth::routes();
   
        $bu = Bu::where('bu_status', 1)->orderBy('id', 'DESC')->paginate(8);
        return view('welcome',compact('bu'));
    
    });
 Auth::routes();
    

Route::get('/home', 'HomeController@index')->name('home');
// building page 
Route::get('/showbu', 'BuController@showBuAllEnable');
Route::get('/forrent', 'BuController@showBuRentEnable');
Route::get('/forbuy', 'BuController@showBuBuyEnable');
Route::get('/type/{type}', 'BuController@showByType');
Route::get('/search', 'BuController@search');
// show details of bilding 
Route::get('/singlebuilding/{id}', 'BuController@showBuilding');
// welcome page to show details of building by ajax
Route::get('/ajax/bu/information', 'BuController@ajaxinfo');
// contact us 
Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'ContactController@store');

// user add build 
Route::get('/user/create/building', 'BuController@userAddView');
Route::post('/user/create/building', 'BuController@userStore');
Route::get('/user/buildingshow', 'BuController@buildingshow')->middleware('auth'); // for peotected
Route::get('/user/buildingshowunable', 'BuController@buildingshowunable')->middleware('auth');
Route::get('/user/singlebuildinguser/{id}', 'BuController@singlebuildinguser')->middleware('auth');
Route::patch('/user/update/singlebuildinguser', 'BuController@updateuserbu')->middleware('auth');

// edit user data
Route::get('/user/usersetting', 'UsersController@usersetting')->middleware('auth');
Route::post('/user/usersetting', [ 'as' => 'user.usersetting' ,'uses' => 'UsersController@usersettingupdate' ])->middleware('auth');
Route::post('/user/usersetting/changepassword', 'UsersController@updatepassworduser')->middleware('auth');

});