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

Route::get('/', function () {

    return view('welcome', compact('name'));
});
//
//
// Route::post('Homepage',[
//   'uses' => 'entityController@index',
// ])->name('Home_Page');


Route::post('Homepage',function()
{
  return view('user_pages.homepage');
})->name('Home_Page');
