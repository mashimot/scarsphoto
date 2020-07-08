<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace'     => 'API'
], function(){
    /*Route::get('home', 'HomeController@index');
    Route::get('about', 'AboutController@index')->name('about.index');
    Route::get('intro', 'IntroController@index');
    Route::resource('blog', 'BlogController');*/
    Route::apiResource('contact', 'ContactController');
    Route::get('portfolio/galleries/create', 'GalleryController@create');
    Route::apiResource('portfolio/galleries', 'GalleryController');
    Route::apiResource('portfolio', 'PortfolioController');
    //Route::get('/', 'MainController@index');
});