<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;

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


Route::post('samplee',"StudentController@samplee");
// Route::get('create',"StudentController@create");
Route::post('store',"StudentController@store");
// Route::post('registeruser',"StudentController@registeruser");
// Route::get('logout',"StudentController@logout");


// Route::prefix('users')->group(function () {
//     Route::get('/', 'UserController@index')->name('users');
//     Route::post('/', 'UserController@store')->name('users.store');
//     Route::get('/{id}', 'UserController@show')->name('users.store');
//     Route::put('/{id}', 'UserController@update')->name('users.store');
//     Route::delete('/{id}', 'UserController@delete')->name('users.delete');
// });

// Route::prefix('tasks')->group(function () {
//     Route::get('/', 'TaskController@index')->name('tasks');
//     Route::post('/', 'TaskController@store')->name('tasks.store');
//     Route::get('/{id}', 'TaskController@show')->name('tasks.show');
//     Route::put('/{id}', 'TaskController@update')->name('tasks.update');
//     Route::delete('/{id}', 'TaskController@index')->name('tasks.delete');
// });