<?php

use Faker\Core\Number;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'student'], function () {
    Route::get('/', [App\Http\Controllers\StudentController::class , 'list']);
    Route::get('/create', [App\Http\Controllers\StudentController::class , 'create']);
    Route::post('/store', [App\Http\Controllers\StudentController::class , 'store']);
    Route::get('/edit/{id}', [App\Http\Controllers\StudentController::class , 'edit']);
    Route::post('/update/{id}', [App\Http\Controllers\StudentController::class , 'update']);
    Route::get('/delete/{id}', [App\Http\Controllers\StudentController::class , 'delete']);



    // Route::post('/', function () {
    //     return 'Create track';
    // });

    // Route::get('{id}', function (string $id) {
    //     return "Details page of track #{$id}";
    // });

    // Route::get('{id}/edit', function (string $id) {
    //     return "This is the edit form of track #{$id}";
    // });

    // Route::get('{id}/{name?}', function (string $id, string $name = '') {
    //     return "Details page of track #{$id} named {$name}";
    // });

    // Route::put('{id}', function (string $id) {
    //     return "Edit page of track #{$id}";
    // });

    // Route::delete('{id}', function (string $id) {
    //     return "Delete page #{$id}";
    // });
});


Route::group(['prefix' => 'tracks'], function () {
    Route::get('/', function () {
        return 'List of tracks page';
    });

    Route::get('create', function () {
        return 'Create track';
    });

    Route::post('/', function () {
        return 'Create track';
    });

    Route::get('{id}', function (string $id) {
        return "Details page of track #{$id}";
    });

    Route::get('{id}/edit', function (string $id) {
        return "This is the edit form of track #{$id}";
    });

    Route::get('{id}/{name?}', function (string $id, string $name = '') {
        return "Details page of track #{$id} named {$name}";
    });

    Route::put('{id}', function (string $id) {
        return "Edit page of track #{$id}";
    });

    Route::delete('{id}', function (string $id) {
        return "Delete page #{$id}";
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
