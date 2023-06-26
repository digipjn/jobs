<?php

use App\Http\Controllers\Web\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
    return redirect(route('jobs.index'));
});

Route::prefix('jobs')->as('jobs.')->group(function () {
    Route::name('index')->get('/', [JobController::class, 'index']);
    Route::name('create')->get('/create', [JobController::class, 'create']);
    Route::name('show')->get('/{id}', [JobController::class, 'show']);
});

