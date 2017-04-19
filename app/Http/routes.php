<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middlewareGroups' => ['web']], function () {

    Route::get('/', array('as' => 'get.blog.home', 'uses' => 'BlogController@index'));
    Route::get('category/{id?}', array('as' => 'get.blog.category', 'uses' => 'BlogController@category'));
    Route::get('article/{id?}', array('as' => 'get.blog.article', 'uses' => 'BlogController@article'));

    Route::group(['prefix' => 'manage'], function () {
        Route::get('/', array('as' => 'get.manage.home', 'uses' => 'ManageController@index'));

        Route::get('/category/{id?}', array('as' => 'get.manage.category', 'uses' => 'ManageController@showCategory'));
        Route::post('/category', array('as' => 'post.manage.category', 'uses' => 'ManageController@storeCategory'));
        Route::put('/category/{id}', array('as' => 'put.manage.category', 'uses' => 'ManageController@updateCategory'));
        Route::delete('/category/{id}', array('as' => 'delete.manage.category', 'uses' => 'ManageController@deleteCategory'));

        Route::get('/article/{id?}', array('as' => 'get.manage.article', 'uses' => 'ManageController@showArticle'));
        Route::post('/article', array('as' => 'post.manage.article', 'uses' => 'ManageController@storeArticle'));
        Route::put('/article/{id}', array('as' => 'put.manage.article', 'uses' => 'ManageController@updateArticle'));
        Route::delete('/article/{id}', array('as' => 'delete.manage.article', 'uses' => 'ManageController@deleteArticle'));

    });

    Route::group(['prefix' => 'xhr', 'middleware' => ['ajax']], function () {

    });



});