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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cloneModelDemo', "Controller@cloneModelDemo");
Route::get('/incrementValueDemo', "Controller@incrementValueDemo");
Route::get('/isDirtyDemo', "Controller@isDirtyDemo");
Route::get('/getOriginalDemo', "Controller@getOriginalDemo");
Route::get('/getChangesDemo', "Controller@getChangesDemo");
Route::get('/accessorsDemo', "Controller@accessorsDemo");
Route::get('/mutatorsDemo', "Controller@mutatorsDemo");
Route::get('/eagerLoadingDemo', "Controller@eagerLoadingDemo");
Route::get('/modelKeysDemo', "Controller@modelKeysDemo");
Route::get('/newQueryDemo', "Controller@newQueryDemo");
Route::get('/replicaDemo', "Controller@replicaDemo");