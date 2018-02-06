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

Route::get('entry',function(){
  return view('admin.entry');
})->name('entry');

Route::get('suggest',function(){
  return view('suggestions');
})->name('suggest');
Route::post('suggest','SuggestionController@store')->name('suggestionsInput');

Route::get('{id}','EntityController@show')->name('entity');