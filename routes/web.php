<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

//user accessible routes
Route::get('/', function(){
  return view('home');
})->name('home');

Route::get('search',[
  'uses' => 'EntityController@index',
])->name('search');

Route::get('suggest',function(){
  return view('suggestions');
})->name('suggest');
Route::post('suggest','SuggestionController@store')->name('suggestionsInput');

//json endpoints
Route::get('autocomplete','EntityController@autoComplete');
Route::get('tagcomplete','EntityController@tagComplete');
Route::get('category',"EntityController@category");
Route::get('suggestions','AdminController@suggestions');

//admin or auth routes
Route::post('entityinput','AdminController@entityStore');
Route::post('entityDelete','AdminController@show');
Route::post('delsuggestion','AdminController@delSuggestion');

Route::get('admin',function(){
  if(!auth::check())
  return redirect()->route('login');
  else
  return view('admin.master');
})->name('admin');
Auth::routes();

//always keep this route last,else routes may break :p
Route::get('/{category}/{id}','EntityController@show')->name('entity');