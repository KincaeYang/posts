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


//用户模块
Route::get('register','RegisterController@index');
Route::post('register','RegisterController@register');
Route::get('login','LoginController@index');
Route::post('login','LoginController@login');
Route::get('logout','LoginController@logout');

//文章
Route::prefix('posts')->group(function(){

    //文章列表
    Route::get('','PostController@index');
    //创建文章
    Route::get('create','PostController@create');
    Route::post('','PostController@store');
    //文章详情
    Route::get('{post}','PostController@show');

    //编辑文章
    Route::get('{post}/edit','PostController@edit');
    Route::put('{post}','PostController@update');
    //删除文章
    Route::get('{post}/delete','PostController@delete');
});

//评论
Route::prefix('comment')->group(function(){
    //创建评论
    Route::post('{post}','CommentController@store');
    //评论列表
    Route::get('{post}','CommentController@index');
});

//赞
Route::prefix('posts')->group(function(){
    //赞
    Route::get('zan/{post}','ZanController@store');
    //取消赞
    Route::get('unzan/{post}','ZanController@delete');
});

//上传
Route::prefix('upload')->group(function (){
    Route::post('image','UploadController@imageUpload');
});

//个人中心
Route::prefix('user')->group(function(){
    //个人设置
    Route::get('me/setting','UserController@setting');
    Route::post('me/setting','UserController@settingStore');
    //关注、取消关注
    Route::get('{user}','UserController@show');
    Route::post('{user}/unfan','UserController@unfan');
    Route::post('{user}/dofan','UserController@dofan');
});

