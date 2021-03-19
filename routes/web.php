<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
    return view('home');
    //return "Hello world";
//    return view("test");
});

Route::get('/welcome', function () {
    return view('welcome2');
});

Route::get('/about', function (){
    $article = App\Models\Articles::take(3)->latest()->get();
    //return $article;
    return view('about',[
        'articles'=>$article
    ]);
});

Route::get('test', function () {
    $name = request('name');
    return view("test",[
        "name"=>$name
    ]);
});


Route::get('/articles','App\Http\Controllers\ArticlesController@index')->name('articles.index');
Route::post('/articles/',"App\Http\Controllers\ArticlesController@store")->name('articles.store');
Route::get('/articles/create','App\Http\Controllers\ArticlesController@create')->name('articles.create');
Route::get('/articles/{article}','App\Http\Controllers\ArticlesController@show')->name('articles.show');

Route::get('/articles/{article}/edit','App\Http\Controllers\ArticlesController@edit')->name('articles.edit');
Route::put('/articles/{article}','App\Http\Controllers\ArticlesController@update')->name('articles.update');



Route::get('/phpinfo',function (){
    return phpinfo();
});

Route::get('/contact',function (){
    return view('contact');
});

Route::get('posts/{post}','App\Http\Controllers\PostsController@show');

