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

// Front front
Route::get('/', 'FrontPagesController@home')->name('front.home');
Route::get('/blog', 'FrontPagesController@blog')->name('front.blog');
Route::get('/contact', 'FrontPagesController@contact')->name('front.contact');
Route::get('/projects', 'FrontPagesController@projects')->name('front.projects');
Route::get('/tech', 'FrontPagesController@tech')->name('front.tech');

// Authentication Routes...
Route::group(['middleware' => 'guest'], function() {
    Route::get('login', 'Auth\LoginController@show')->name('login.show');
    Route::post('login', 'Auth\LoginController@login')->name('login');
});

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin']
], function() {
     Route::get('/', 'DashboardController@index')->name('admin.dashboard');
});

Route::post('/locale/russian/change', 'LocaleController@russian')
    ->name('locale.change.russian');

Route::post('/locale/english/change', 'LocaleController@english')
    ->name('locale.change.english');
