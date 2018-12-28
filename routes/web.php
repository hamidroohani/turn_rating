<?php

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

Route::get('/','ItemsController@show');
Route::get('/test',function (){
    return view('admin-pages.index');
//    return \App\Time::where('day',"<",\Morilog\Jalali\Jalalian::now())->get();
//    return \Morilog\Jalali\Jalalian::now();
//    echo microtime();
//    $file = "app";
//    if(is_dir($file))
//    {
//        echo ("$file is a directory");
//    }
//    else
//    {
//        echo ("$file is not a directory");
//    }
});

Route::get('/search','ItemsController@search');
Route::get('/search_turn','TurnController@found');
Route::get('/search/first_ajax','ItemsController@first_ajax');
Route::get('/search/second_ajax','ItemsController@second_ajax');
Route::get('/list/{id}','HomeController@show');

Route::get('/admin-panel','AdminController@show');
Route::get('/admin-panel/doctor','DoctorsController@show')->name('doctor');
Route::get('/admin-panel/doctor/insert','DoctorsController@store');
Route::get('/admin-panel/doctor/delete/{doctor}','DoctorsController@delete');
Route::get('/admin-panel/doctor/info/{doctor}','DoctorsController@info');
Route::get('/admin-panel/doctor/insert/info','DoctorsController@insert_info');
Route::get('/admin-panel/specialty','SpecialtiesController@show')->name('specialty');
Route::get('/admin-panel/specialty/insert','SpecialtiesController@store');
Route::post('/admin-panel/specialty/update/{specialty}','SpecialtiesController@edit');
Route::get('/admin-panel/clinic','ClinicsController@show')->name('clinic');
Route::get('/admin-panel/clinic/insert','ClinicsController@store');
Route::post('/admin-panel/clinic/update/{clinic}','ClinicsController@edit');
Route::get('/admin-panel/time','TimesController@show')->name('time');
Route::post('/admin-panel/time/insert','TimesController@store');
Route::get('/admin-panel/time/search','TimesController@fortest');
Route::get('/admin-panel/first_ajax','TimesController@first_ajax');
Route::get('/admin-panel/second_ajax','TimesController@second_ajax');
Route::get('/admin-panel/clientele','TimesController@index')->name('clientele');
Route::get('/admin-panel/search','TimesController@search');
Route::get('/admin-panel/clientele/{id}','TimesController@show_clientele');
Route::get('/admin-panel/client/delete/{turn}','TurnController@delete');

Route::get('/turn/{time}','TurnController@form');
Route::post('/turn/create_turn','TurnController@store');


