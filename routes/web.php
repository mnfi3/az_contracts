<?php




Route::get('/', function () {
  return redirect(route('login'));
});


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'AdminController@panel')->name('home');

Route::post('/change-password', 'AdminController@changePassword')->name('change-password');
Route::post('/add-user', 'AdminController@addUser')->name('add-user');


Route::get('contracts', 'ContractController@contracts')->name('contracts');
Route::post('add-contract', 'ContractController@addContract')->name('add-contract');
Route::get('contract/{id}', 'ContractController@contract')->name('contract');
Route::post('edit-contract', 'ContractController@edit')->name('edit-contract');


Route::post('remove-document', 'DocumentController@remove')->name('remove-document');





Route::get('report',function(){
  return view('report');
})->name('report');

Route::get('proposals',function(){
  return view('proposals');
})->name('proposals');

Route::get('proposal',function(){
  return view('proposal');
})->name('proposal');

Route::get('memorandums',function (){
  return view('memorandums');
})->name('memorandums');

Route::get('memorandum',function (){
  return view('memorandum');
})->name('memorandum');


