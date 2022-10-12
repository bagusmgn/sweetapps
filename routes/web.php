<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TaskController,
    FieldController,
    FieldsController,
    PagesController,
    SpeciesController,
    BiodiversitasController,
    PageController
};
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

Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
Route::post('/tasks/insert', [TaskController::class, 'store'])->name('task.store');

Route::get('/fields', [FieldController::class, 'index'])->name('fields.index');
Route::get('/lahans', [FieldsController::class, 'index'])->name('lahans.index');
Route::get('/getBio', [FieldsController::class,'getUsers']);

Route::get('/pages', [PagesController::class, 'index']);
Route::get('/getUsers', [PagesController::class,'getUsers']);
Route::post('/addUser', [PagesController::class, 'addUser']);
Route::post('/updateUser', [PagesController::class, 'updateUser']);
Route::get('/deleteUser/{id}', [PagesController::class, 'deleteUser']);

Route::get('/species', [SpeciesController::class, 'index']);
Route::get('/biodiversitas', [BiodiversitasController::class, 'index']);

Route::get('/pag', [PageController::class, 'index']);
Route::get('/pag/readFiles', [PageController::class, 'readFiles'])->name('readFiles');
Route::post('/pag/uploadFile', [PageController::class, 'uploadFile'])->name('uploadFile');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('task', TaskController::class);
    Route::resource('fields', FieldController::class);
    Route::resource('lahans', FieldsController::class);
    Route::resource('pages', PagesController::class);
    Route::resource('species', SpeciesController::class);
    Route::resource('biodiversitas', BiodiversitasController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

