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

    return view('home', compact('name'));
});


Route::get('search',[
  'uses' => 'entityController@index',
])->name('search');

Route::get('entity', function(){
  return view('entity');
});


// Route::post('Homepage',function()
// {
//   return view('user_pages.homepage');
// })->name('Home_Page');
