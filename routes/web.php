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

$router->group([
    'namespace'  => 'Front',
    'as'         => 'front.',
    'middleware' => 'web',
], function ($router) {
    // Do not login
    $router->get('/home', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);
});


// ADMIN ROUTER
Route::group([
    'namespace'    => 'Admin',
    'prefix'       => 'cpanel',
    'as'           => 'admin.',
    'middleware'   => 'web'
], function ($router) {
    // Authentication Routes...
    $router->get('login', 'AuthController@showLoginForm')->name('login');
    $router->post('login', 'AuthController@login');
    $router->get('logout', 'AuthController@logout')->name('logout');

    $router->group([
        'middleware' => ['auth.admin'],
    ], function ($router) {
        $router->get('/', [
            'as'   => 'dashboard',
            'uses' => 'DashBoardController@index',
        ]);
        $router->get('/projects', [
            'as'   => 'projects',
            'uses' => 'ProjectController@index',
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
