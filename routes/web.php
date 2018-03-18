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
Route::post('suggest','SuggestionController@show')->name('suggestionsInput');

//json endpoints
Route::get('autocomplete','EntityController@autoComplete')->name('autocomplete');
Route::get('category',"EntityController@category")->name('category');
Route::get('suggestions',function(){
  return App\Suggestion::simplePaginate();
});

//admin or auth routes
Route::post('entityInsert','AdminController@store')->name('entityInsert');
Route::post('entityDelete','AdminController@show')->name('entityDelete');

Route::get('admin',function(){
  if(!auth::check())
  return redirect()->route('login');
  else
  return view('admin.master');
})->name('admin');
Auth::routes();
Route::get('register',function(){
  return view('auth.register');
})->name('register');

//always keep this route last,else routes may break :p
Route::get('/{category}/{id}','EntityController@show')->name('entity');