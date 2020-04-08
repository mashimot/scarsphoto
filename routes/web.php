<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('intro', 'IntroController@index');
Route::resource('contact', 'ContactController');
Route::resource('portfolio/galleries', 'GalleryController');
Route::resource('portfolio', 'PortfolioController');
Route::get('/', 'MainController@index');

Route::group([
    'namespace'     => 'Admin',
    'prefix'        => 'admin',
    'middleware'    => [
        'auth'
    ],
], function(){

    Route::resource('categories', 'CategoryController', [
        'as' => 'admin',
        'except' => ['index', 'edit']
    ]);
    Route::resource('medias', 'MediaController', [
        'as' => 'admin',
        'except' => ['index', 'edit']
    ]);
    Route::resource('medias_categories', 'MediaCategoryController', [
        'as' => 'admin',
        'except' => ['index', 'edit']
    ]);

    Route::get('{any}', function () {
        return view('admin.galleries.index');
    })->where('any', '.*');
});


/*Route::get('admin/{any}', function () {
    return view('layouts.app');
})->where('any', '.*');*/