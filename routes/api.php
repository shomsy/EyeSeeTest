<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], static function () {
    Route::post('login', 'API\JWTAuthController@login');
    Route::post('register', 'API\JWTAuthController@register');
    Route::group(['middleware' => 'jwt.auth'], static function () {
        Route::get('logout', 'API\JWTAuthController@logout');
        Route::get('user', 'API\JWTAuthController@getAuthUser');
        ////Route::resource('thread', 'ThreadController');
        //Route::resource('comments', 'CommentsController',['except' => [
        //    'store'
        //]]);
        //Route::post('comments/{thread}', 'CommentsController@store');
        //Route::post('comments/reply/{comment}', 'CommentsController@reply');
        //Route::post('comments/approveComment/{comment}', 'CommentsController@approveComment');
        //Route::post('comments/upvote/{comment}', 'CommentsController@upvote');
    });
});