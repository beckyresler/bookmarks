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

// Routes that require authentication - basically everything except the auth routes (below)
Route::middleware('auth')->group(function(){

	Route::get('/', function () {
	    return view('welcome');
	})->name('home');

	// Routes for management functionality
	Route::prefix('sitemanager')->group(function(){

		Route::get('logout', function(){
			Auth::logout();
			return redirect(route('login'))->with('success', 'You have logged out of the system.');
		})->name('logout');
	});

});

// Authentication Routes
Route::prefix('sitemanager')->group(function(){

	Route::get('/', ['uses' => 'Auth\LoginController@showLoginForm'])->name('login');
	Route::post('login', ['uses' => 'Auth\LoginController@login'])->name('login.process');

	Route::get('password/reset', ['uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'])->name('password.request');
	Route::post('password/email', ['uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'])->name('password.email');
	Route::get('password/reset/{token}', ['uses' => 'Auth\ResetPasswordController@showResetForm'])->name('password.reset');
	Route::post('password/reset', ['uses' => 'Auth\ResetPasswordController@reset'])->name('password.reset.process');

});
