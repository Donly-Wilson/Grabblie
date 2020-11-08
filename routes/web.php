<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InspirationController;

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

//* PAGES *//
Route::get('/', [PageController::class, 'index']);
Route::get('/search', [PageController::class, 'index']);
Route::post('/results', [PageController::class, 'results']);
Route::get('/search/{keyword}', [PageController::class, 'search']);
// Route login and register are set automatically by Laravel


//* ACCOUNTS *//
Route::get('/account', [AccountController::class, 'index']); //->middleware('auth');


//* ACCOUNTS_PROJECTS *//
Route::get('/account/projects', [ProjectController::class, 'index']);
Route::get('/account/projects/create', [ProjectController::class, 'create']);
Route::post('/account/projects', [ProjectController::class, 'store']);
Route::get('/account/projects/{id}', [ProjectController::class, 'show']);
Route::get('/account/projects/{id}/edit', [ProjectController::class, 'edit']);
Route::put('/account/projects/{id}', [ProjectController::class, 'update']);
Route::get('/account/projects/{id}/delete', [ProjectController::class, 'destroy']);

//* Inspirations *//
Route::get(
    '/projects/inspiration/{image_info}/add',
    [InspirationController::class, 'addimage']
)->middleware('auth');

// Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard'); No Longer need jetstram dashboard
