<?php

use App\Http\Controllers\PageController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/{slug}", [PageController::class,'show1']);

Route::middleware(['auth','isAuth'])->group(function(){
    Route::get('pages/trashed',[PageController::class,'trashed'])->name('pages.trashed');
    Route::get('pages/all',[PageController::class,'all'])->name('pages.all');
    Route::get('pages/public',[PageController::class,'public'])->name('pages.public');
    Route::get('pages/draf',[PageController::class,'draf'])->name('pages.draf');
    Route::post('pages/trashed/{id}',[PageController::class,'trashedDelete'])->name('pages.trashed.destroy');
});




Route::prefix('admin')->middleware(['auth','isAuth'])->group(function(){
    Route::resource('pages', PageController::class);
});


