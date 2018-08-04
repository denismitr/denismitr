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

Auth::routes();

Route::group(['prefix' => '/auth/login'], function() {
    Route::get('/', 'LoginController@show')->name('auth.login.show');
    Route::post('/', 'LoginController@login')->name('auth.login');
});

Route::post('/locale/russian/change', 'LocaleController@russian')
    ->name('locale.change.russian');

Route::post('/locale/english/change', 'LocaleController@english')
    ->name('locale.change.english');
