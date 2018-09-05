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
    $router->get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);
    $router->get('/du-an/{slug}', [
        'as' => 'project',
        'uses' => 'ProjectController@index'
    ]);
    $router->get('/tin-tuc/{slug}', [
        'as' => 'news',
        'uses' => 'NewController@index'
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

        // Manage project
        $router->get('/projects', [
            'as'   => 'projects',
            'uses' => 'ProjectController@index',
        ]);
        $router->match(['get', 'post'], 'projects/add', [
            'as'   => 'projects.add',
            'uses' => 'ProjectController@add',
        ]);
        $router->match(['get', 'post'], 'projects/edit/{projectId}', [
            'as'   => 'projects.edit',
            'uses' => 'ProjectController@edit',
        ]);
        $router->get('projects/delete/{projectId}', [
            'as'   => 'projects.delete',
            'uses' => 'ProjectController@delete',
        ]);

        // Manage project info
        $router->get('projects/info', [
            'as'   => 'projects.info',
            'uses' => 'ProjectInfoController@index',
        ]);
        $router->match(['get', 'post'], 'projects/info/add', [
            'as'   => 'projects.info.add',
            'uses' => 'ProjectInfoController@add',
        ]);
        $router->match(['get', 'post'], 'projects/info/edit/{projectInfoId}', [
            'as'   => 'projects.info.edit',
            'uses' => 'ProjectInfoController@edit',
        ]);

        // Manage news
        $router->get('news', [
            'as'   => 'news',
            'uses' => 'NewController@index',
        ]);
        $router->match(['get', 'post'], 'news/add', [
            'as'   => 'news.add',
            'uses' => 'NewController@add',
        ]);
        $router->match(['get', 'post'], 'news/edit/{newId}', [
            'as'   => 'news.edit',
            'uses' => 'NewController@edit',
        ]);
        $router->get('news/delete/{newId}', [
            'as'   => 'news.delete',
            'uses' => 'NewController@delete',
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/error', 'HomeController@error')->name('error');
