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
  'uses' => 'entityController@index',
])->name('search');

Route::get('autocomplete','entityController@autoComplete')->name('autocomplete');

Route::post('suggestAlt','suggestionController@store')->name('suggestionsInput');

Route::get('entry',function(){
  return view('admin.entry');
})->name('entry');

Route::get('insert',function(){
  return view('user-insert');
})->name('insert');

Route::get('{id}','entityController@show')->name('entity');