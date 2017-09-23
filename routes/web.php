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

Route::group([], function () {

    Route::match(['get','post'],'/',['uses'=>'IndexController@execute','as'=>'home']);
    Route::get('/page/{alias}',['uses'=>'PageController@execute','as'=>'page']);

});

//admin/service
Route::group(['prefix'=>'admin','middleware'=>'auth'], function() {

    //admin
    Route::get('/',function () {

        if(view()->exists('admin.index')) {
            $data = ['title' => 'Admin\'s control page'];
            return view('admin.index',$data);
        }

    });

    //admin/pages
    Route::group(['prefix'=>'pages'], function() {
        //admin/pages
        Route::get('/',['uses'=>'PagesController@execute','as'=>'pages']);
        //admin/pages/add
        Route::get('/add',['uses'=>'PagesAddController@execute','as'=>'pagesAdd']);
        Route::post('/add',['uses'=>'PagesAddController@store']);
        //admin/pages/edit
        Route::get('/edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);
        Route::post('/edit/{page}',['uses'=>'PagesEditController@store']);
        Route::delete('/edit/{page}',['uses'=>'PagesEditController@del']);
    });

    Route::group(['prefix'=>'portfolios'], function() {
        //admin/portfolio
        Route::get('/',['uses'=>'PortfolioController@execute','as'=>'portfolio']);
        //admin/portfolio/add
        Route::get('/add',['uses'=>'PortfolioAddController@execute']);
        Route::post('/add',['uses'=>'PortfolioAddController@store','as'=>'portfolioAdd']);
        //admin/portfolio/edit
        Route::get('/edit/{portfolio}',['uses'=>'PortfolioEditController@execute','as'=>'portfolioEdit']);
        Route::post('/edit/{portfolio}',['uses'=>'PortfolioEditController@store']);
        Route::delete('/edit/{portfolio}',['uses'=>'PortfolioEditController@del']);
    });

    Route::group(['prefix'=>'services'], function() {
        //admin/services
        Route::get('/',['uses'=>'ServiceController@execute','as'=>'services']);
        //admin/services/add
        Route::get('/add',['uses'=>'ServiceAddController@execute','as'=>'servicesAdd']);
        Route::post('/add',['uses'=>'ServiceAddController@store']);
        //admin/services/edit
        Route::get('/edit/{service}',['uses'=>'ServiceEditController@execute','as'=>'servicesEdit']);
        Route::post('/edit/{service}',['uses'=>'ServiceEditController@store']);
        Route::delete('/edit/{service}',['uses'=>'ServiceEditController@del']);
    });

});

//auth route
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

