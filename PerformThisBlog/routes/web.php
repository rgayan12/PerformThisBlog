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

use App\Http\Controllers\BlogController;

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', 'BlogController@index');
//Route::get('profile', 'HomeController@profile')->name('profile')->middleware('verified');

Route::resource('article', 'BlogController')->middleware('verified');


Route::get('profile/create','BloggerProfileController@create')->name('profile.create')->middleware('verified');
Route::get('profile','BloggerProfileController@index')->name('profile.index')->middleware('verified');
Route::post('profile','BloggerProfileController@store')->name('profile.store')->middleware('verified');
Route::get('profile/{profile}','BloggerProfileController@show')->name('profile.show');
Route::put('profile/{profile}','BloggerProfileController@update')->name('profile.update')->middleware('verified');
Route::get('profile/{profile}/edit','BloggerProfileController@edit')->name('profile.edit')->middleware('verified');



Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');
 