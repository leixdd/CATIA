<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
// Route::get('/', function () {
//     return view('welcome');
// });



//cookies set and get

Route::get('/cg', 'StudController@stg');
Route::get('/cs', 'StudController@sts');

//Route::get('/b', 'ApplicantController@batching');
Route::resource('pgc', 'CMS_Course@pub_getCourses');
Route::resource('getCourses', 'CMS_Course@getCourses');
Route::resource('course', 'CMS_Course');
Route::resource('visit', 'visit_counter@tick');
Route::resource('post', 'post_admin');
Route::resource('settings', 'settings_v');
Route::resource('inbox', 'reply_logs1');
//Message
Route::resource('msg_nt' , 'msg_cnt');
Route::resource('msg_show' , 'msg_cnt@show');
Route::resource('sendbm','MailController');
//application Routes


Route::resource('application', 'ApplicantController');
Route::resource('trans', 'Transac');

Route::resource('search', 'ApplicantController@search');
Route::resource('search_cn', 'search_cn');

Route::resource('print','ApplicantController@printing');


Route::get('access/{link}','ApplicantController@AccessingLink');

Route::get('/gen_search/{q}',[
  'middleware' => 'auth',
  'uses' => 'ApplicantController@gen_search'
]);



Route::resource('toFullPaid', 'ApplicantController@update_full');

Route::resource('city', 'refBRCP@city');

Route::resource('students', 'StudController');

Route::get('portal', 'StudController@showlogin');
Route::post('portal', 'StudController@login');
Route::get('O_portal', 'StudController@logout');

Route::resource('brgy', 'refBRCP@brgy');

Route::resource('region', 'refBRCP@region');

Route::resource('province', 'refBRCP@prov');

//public view

Route::resource('join', 'pubRegis');

Route::resource('pdf', 'CatiaPrinting');
Route::resource('redirc', 'redir_cnt');

Route::resource('appaccx', 'ApplicantAccounts');
Route::auth();
Route::group(['middleware' => 'CATIA\Http\Middleware\AdminMiddleware'], function () {
    //
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('/register', 'Auth\AuthController@postRegister');
});



Route::get('/newAccount/{id}/edit', [

    'middleware' => 'auth',
    'uses' => 'ApplicantAccounts@edit'

]);


Route::resource('adminpanel', 'AdminPanelController');
Route::resource('newAdmin', 'AdminPanelController@x');

Route::resource('post_pub', 'post_public');
Route::get('/', ['uses' => 'post_public@get_in'])->name('/');

Route::resource('conp', 'con_print');
Route::resource('cert', 'cert_print');

Route::get('/history', function () {
    return view('history');
});

Route::get('/misvi', function () {
    return view('misvi');
});

Route::get('/commi', function () {
    return view('commi');
});

Route::get('/news', ['uses' => 'post_public@index'])->name('/news');

Route::get('/newsfile1', function () {
    return view('newsfile1');
});

Route::get('/newsfile2', function () {
    return view('newsfile2');
});

Route::get('/newsfile3', function () {
    return view('newsfile3');
});

Route::get('/registrationpro', function () {
    return view('registrationpro');
});

Route::get('/training', function () {
    return view('/training');
});

Route::get('/facility', function () {
    return view('facility');
});

Route::get('/gallery', function () {
    return view('gallery');
});



Route::get('/home', 'HomeController@index');
