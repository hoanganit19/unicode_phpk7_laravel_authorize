<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Post;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    //Posts
    Route::prefix('posts')->name('posts.')->group(function(){
        Route::get('/', [PostController::class, 'index'])->name('index');

        Route::get('/add', [PostController::class, 'add'])->name('add');

        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');

        Route::get('/delete/{post}', [PostController::class, 'delete'])->name('delete');
    });

    Route::prefix('groups')->name('groups.')->group(function(){
        Route::get('/', [GroupController::class, 'index'])->name('index');

        Route::get('/add', [GroupController::class, 'add'])->name('add');

        Route::get('/edit/{group}', [GroupController::class, 'edit'])->name('edit');

        Route::get('/delete/{group}', [GroupController::class, 'delete'])->name('delete');

        Route::get('/permission/{group}', [GroupController::class, 'permission'])->name('permission');

        Route::post('/permission/{group}', [GroupController::class, 'postPermission']);
    });

    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('/add', [UserController::class, 'add'])->name('add');

        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');

        Route::get('/delete/{user}', [UserController::class, 'delete'])->name('delete');
    });
});
