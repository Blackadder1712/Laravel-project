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

/*Route::get('/posts', function()//building api
{
  return response()->json(  //return data in an multi-dimensional array called posts
    [
        'posts' =>
        [
            [
            'title' => 'Post One'
            ]
        ]
    ]
  );
});*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
