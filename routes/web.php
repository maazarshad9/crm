<?php

use Illuminate\Http\Request;



<<<<<<< HEAD
Route::get("/invoice/{customer}/{booking}/{confirmation}/{allocation}/{agent}" , "InvoiceController@index")->name("invoice");
=======
Route::get("/invoice" , "InvoiceController@index")->name("invoice");
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
Auth::routes();
Route::get('dashboard/profile/{id}', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('dashboard/profile/{id}','ProfileController@this')->name("updater");
Route::get('/', 'HomeController@index')->name('home');
Route::group(['prefix' => 'dashboard', 'middleware' => ['role:super-admin', 'auth']], function () {

	Route::get('users/{id}', function() {
	    //
	});

	Route::resource('user', 'UserController');
	// Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	// Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	// Agents
	Route::resource('agents', 'Agent\\AgentsController');
	Route::resource('projects', 'Project\\ProjectsController');
	Route::resource('projects/{project}/agent', 'Project\\ProjectAgentsController', [
    	'as' => 'project'
	]);

	Route::post('projects/{project}/{agent}/commission', 'Project\\AgentCommissionController@storeCommission')->name('project.commission');
	// Leads
	
	Route::resource('customers', 'Customer\\CustomerController');
	Route::resource('properties', 'Property\\PropertiesController');
	Route::resource('sales', 'Sale\\SalesController');
	Route::resource('installments', 'Sale\\InstallmentController');
	Route::get('installments/payment/{id}', 'Sale\\InstallmentController@makePayment')->name('installment_payment.get');
	Route::post('installments/payment/{id}', 'Sale\\InstallmentController@storePayment')->name('installment_payment.store');

	Route::get('lead/customer/{lead}', ['as' => 'lead.customer', 'uses' => 'Lead\\LeadsController@changeToCustomer']);
	
});
	// Set Meeting
	Route::get('dashboard/lead/addmeeting/{lead}', ['as' => 'lead.addmeeting', 'uses' => 'Lead\\LeadsController@addmeeting']);
	Route::put('dashboard/lead/storemeeting/{lead}', ['as' => 'lead.storemeeting', 'uses' => 'Lead\\LeadsController@storemeeting']);
	
<<<<<<< HEAD
=======
	Route::get('dashboard/expire','Lead\\LeadsController@expire')->name('leads.expire');
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
	// Set Call
	Route::get('dashboard/lead/setcall/{lead}', ['as' => 'lead.setcall', 'uses' => 'Lead\\LeadsController@setcall']);
	Route::put('dashboard/lead/storecalling/{lead}', ['as' => 'lead.storecalling', 'uses' => 'Lead\\LeadsController@storecalling']);

<<<<<<< HEAD
	Route::get('dashboard/agents/{id}', 'Agent\\AgentsController@show');
=======
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
Route::group(['prefix' => 'dashboard', 'middleware' => ['role:super-admin|agent', 'auth']], function () {
	Route::resource('leads', 'Lead\\LeadsController');
	Route::resource('meetings', 'Meeting\\MeetingsController');
	Route::resource('callings', 'Calling\\CallingsController');
<<<<<<< HEAD
});

Route::get('/import', 'ImportController@getImport')->name('import');
Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
Route::post('/import_process', 'ImportController@processImport')->name('import_process');

=======
	Route::get('agents/{id}', 'Agent\\AgentsController@show');
});
Route::post('leads/search', 'Lead\\LeadsController@search')->name('leads.search');

Route::get('agents/{id}', 'Agent\\AgentsController@show')->name('details');
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
