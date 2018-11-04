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
Route::get('/contact', 'FrontPagesController@contact')->name('front.contact');
Route::get('/projects', 'FrontPagesController@projects')->name('front.projects');
Route::get('/tech', 'FrontPagesController@tech')->name('front.tech');

Route::group(['prefix' => 'blog'], function() {
    Route::get('/', 'BlogController@index')->name('front.blog');
    Route::get('/topics/{topic}', 'BlogController@topic')->name('front.blog.topic');
    Route::get('/{post}', 'BlogController@post')->name('front.blog.post');
});

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

     Route::put('/business', 'BusinessDetailsController@update')->name('admin.business.update');

     Route::get('/security', 'SecurityController@edit')->name('admin.security.edit');
     Route::put('/security', 'SecurityController@update')->name('admin.security.update');

     Route::group(['prefix' => 'topics'], function() {
         Route::get('/', 'TopicsController@index')->name('admin.topics.index');
         Route::post('/', 'TopicsController@store')->name('admin.topics.store');
         Route::get('/{topic}', 'TopicsController@edit')->name('admin.topics.edit');
         Route::put('/{topic}', 'TopicsController@update')->name('admin.topics.update');
         Route::get('/{topic}/confirm', 'TopicsController@confirm')->name('admin.topics.confirm');
         Route::delete('/{topic}', 'TopicsController@destroy')->name('admin.topics.delete');
     });

    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', 'ProjectsController@index')->name('admin.projects.index');
        Route::get('/create', 'ProjectsController@create')->name('admin.projects.create');
        Route::post('/', 'ProjectsController@store')->name('admin.projects.store');
        Route::get('/{project}', 'ProjectsController@edit')->name('admin.projects.edit');
        Route::put('/{project}', 'ProjectsController@update')->name('admin.projects.update');
        Route::get('/{project}/confirm', 'ProjectsController@confirm')->name('admin.projects.confirm');
        Route::delete('/{project}', 'ProjectsController@destroy')->name('admin.projects.delete');
    });

    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', 'PostsController@index')->name('admin.posts.index');
        Route::get('/create', 'PostsController@create')->name('admin.posts.create');
        Route::post('/', 'PostsController@store')->name('admin.posts.store');
        Route::get('/{post}', 'PostsController@edit')->name('admin.posts.edit');
        Route::put('/{post}', 'PostsController@update')->name('admin.posts.update');
        Route::get('/{post}/confirm', 'PostsController@confirm')->name('admin.posts.confirm');
        Route::delete('/{post}', 'PostsController@destroy')->name('admin.posts.delete');
    });
});

Route::post('/locale/russian/change', 'LocaleController@russian')
    ->name('locale.change.russian');

Route::post('/locale/english/change', 'LocaleController@english')
    ->name('locale.change.english');
