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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index');
Route::get('profile', 'HomeController@profile')->name('profile')->middleware('verified');
Route::get('compose', 'HomeController@compose')->name('compose')->middleware('verified');
Route::post('article/store', 'HomeController@storeArticle')->name('storeArticle');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');

Route::post('formSubmit','HomeController@formSubmit');
