<?php



//Route::get('/import', 'AdminController@import');
//Route::get('/import2', 'AdminController@import2');




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
Route::get('report', 'AdminController@report')->name('report');
Route::post('report-result', 'AdminController@reportResult')->name('report-result');



Route::post('remove-document', 'DocumentController@remove')->name('remove-document');
Route::post('remove-photo', 'PhotoController@remove')->name('remove-photo');


Route::get('contracts', 'ContractController@contracts')->name('contracts');
Route::post('add-contract', 'ContractController@addContract')->name('add-contract');
Route::get('contract/{id}', 'ContractController@contract')->name('contract');
Route::post('edit-contract', 'ContractController@edit')->name('edit-contract');
Route::post('remove-contract', 'ContractController@remove')->name('remove-contract');



Route::get('memorandums', 'MemorandumController@memorandums')->name('memorandums');
Route::get('memorandum/{id}', 'MemorandumController@memorandum')->name('memorandum');
Route::post('add-memorandum', 'MemorandumController@add')->name('add-memorandum');
Route::post('edit-memorandum', 'MemorandumController@edit')->name('edit-memorandum');
Route::post('remove-memorandum', 'MemorandumController@remove')->name('remove-memorandum');



Route::get('proposals', 'ProposalController@proposals')->name('proposals');
Route::get('proposal/{id}', 'ProposalController@proposal')->name('proposal');
Route::post('add-proposal', 'ProposalController@add')->name('add-proposal');
Route::post('edit-proposal', 'ProposalController@edit')->name('edit-proposal');
Route::post('remove-proposal', 'ProposalController@remove')->name('remove-proposal');



Route::get('visits', 'VisitController@visits')->name('visits');
Route::get('visit/{id}', 'VisitController@visit')->name('visit');
Route::post('add-visit', 'VisitController@add')->name('add-visit');
Route::post('edit-visit', 'VisitController@edit')->name('edit-visit');
Route::post('remove-visit', 'VisitController@remove')->name('remove-visit');

Route::get('/admin-backup', 'BackupController@index')->name('admin-backup');








