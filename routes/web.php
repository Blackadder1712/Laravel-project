<?php
use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;//bring in model

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

// all listings 

Route::get('/', [ListingController::class, 'index']);

//single listing 

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);



/*practice
{
    /*Route::get('/hello', function () {
        return response('<h1>Hello World</h1>', 200) //html that shows on screen and error code
        ->header('Content-Type', 'text/plain') //set type of content(html) and text type, will show tags 
        ->header('foo', 'bar'); //any header values you want 
    });

    //wild card for id /future values

    Route::get('/posts/{id}', function($id)
    {
        ddd($id);//helper method, gives us code, breakpoint , shows request, for debugging 
        return response('Post' . $id);
    })->where('id', '[0-9]+');//add constraint like only numbers

    Route::get('/search', function(Request $request)//request variable , 
    {
    dd($request->name . '' . $request->city); //shows us what is in request can add what you want 
    });
}*/