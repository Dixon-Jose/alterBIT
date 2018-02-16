<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function(){
  return view('home');
})->name('home');

Route::get('search',[
  'uses' => 'EntityController@index',
])->name('search');

Route::get('autocomplete','EntityController@autoComplete')->name('autocomplete');

Route::get('admin',function(){
  if(!auth::check())
  return redirect()->route('login');
  else
  return view('admin.master');
})->name('admin');

Route::get('suggest',function(){
  return view('suggestions');
})->name('suggest');
Route::post('suggest','SuggestionController@store')->name('suggestionsInput');

Route::post('entityInsert','AdminController@store')->name('entityInsert');
Route::post('entityDelete','AdminController@show')->name('entityDelete');

Auth::routes();

Route::get('/entity/{id}','EntityController@show')->name('entity');

Route::get('register',function(){
  return view('auth.register');
})->name('register');

Route::get('update',function(){
  return view('admin.update');
})->name('update');
