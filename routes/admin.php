<?php 
 
	Route::prefix('admin')->group(function(){
		Route::get('/login','App\Http\Controllers\Admin\AuthController@showLoginForm')->name('admin.login');
		Route::post('/login', 'App\Http\Controllers\Admin\AuthController@login')->name('admin.login_auth');
		Route::get('logout','App\Http\Controllers\Admin\AuthController@logout')->name('admin.logout');
		
		Route::middleware('auth:admin')->group(function (){
			Route::prefix('administrators')->group(function(){
    			Route::get('/','App\Http\Controllers\Admin\AdministratorsController@index')->name('administrators.index');
    			Route::post('/search', 'App\Http\Controllers\Admin\AdministratorsController@search')->name('administrators.search');
    			Route::get('/create', 'App\Http\Controllers\Admin\AdministratorsController@create')->name('administrators.create');
    			Route::get('/{administratorId}', 'App\Http\Controllers\Admin\AdministratorsController@edit')->name('administrators.edit');
    			Route::post('/update', 'App\Http\Controllers\Admin\AdministratorsController@update')->name('administrators.update');
    			Route::post('/delete', 'App\Http\Controllers\Admin\AdministratorsController@delete')->name('administrators.delete');
    		});
	    	Route::prefix('companys')->group( function(){
	    		Route::get('/','App\Http\Controllers\Admin\CompanysController@index')->name('companys.index');
	    		Route::post('/search', 'App\Http\Controllers\Admin\CompanysController@search')->name('companys.search');
	    		Route::get('/create', 'App\Http\Controllers\Admin\CompanysController@create')->name('companys.create');
	    		Route::post('/update', 'App\Http\Controllers\Admin\CompanysController@update')->name('companys.update');
	    	});

	    	Route::prefix('loginusers')->group(function(){
	    		Route::get('/','App\Http\Controllers\Admin\LoginusersController@index')->name('loginusers.index');
	    	});
		});
	})
?>