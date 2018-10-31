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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/classify/index','ClassifyController@index');
Route::any('/classify/add','ClassifyController@add');
Route::any('/classify/edit/{id}','ClassifyController@edit')->name("classify.edit");
Route::get('/classify/del/{id}','ClassifyController@del')->name("classify.del");


Route::get('/article/index','ArticleController@index');
Route::any('/article/add','ArticleController@add');
Route::any('/article/edit/{id}','ArticleController@edit')->name("article.edit");
Route::get('/article/del/{id}','ArticleController@del')->name("article.del");


Route::get('/goods/index','GoodsController@index');
Route::any('/goods/add','GoodsController@add');
Route::any('/goods/edit/{id}','GoodsController@edit')->name("goods.edit");
Route::get('/goods/del/{id}','GoodsController@del')->name("goods.del");


Route::get('/commodity/index','CommodityController@index');
Route::any('/commodity/add','CommodityController@add');
Route::any('/commodity/check/{id}','CommodityController@check')->name("commodity.check");
Route::any('/commodity/edit/{id}','CommodityController@edit')->name("commodity.edit");
Route::get('/commodity/del/{id}','CommodityController@del')->name("commodity.del");


Route::get('/user/index','UserController@index')->name("user.index");
Route::any('/user/zc','UserController@zc');
Route::any('/user/edit/{id}','UserController@edit')->name("user.edit");
Route::get('/user/del/{id}','UserController@del')->name("user.del");
Route::any('/user/login/{id}','UserController@login')->name("user.login");