<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;//bring in model
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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




//show create form 
Route::get('/listings/create', [ListingController::class, 'create']);


// Store Listing Data
Route::POST('/listings', [ListingController::class, 'store']);

//Show edit form
Route::get('/listings/{listing}/edit', 
[ListingController::class, 'edit']);

//Edit, submit to update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);



// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show register create form 
Route::get('/register', [UserController::class, 'create']);

//Create new User 

Route::post('/users', [UserController::class, 'store']);







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