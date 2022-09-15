<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\UserController;
use App\Models\{Post, User, Group};
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

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    //Posts
    Route::prefix('posts')->name('posts.')->middleware('can:posts.view')->group(function(){
        Route::get('/', [PostController::class, 'index'])->name('index');

        Route::get('/add', [PostController::class, 'add'])->name('add')->can('create', Post::class);

        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit')->can('update', 'post');

        Route::get('/delete/{post}', [PostController::class, 'delete'])->name('delete')->can('delete', 'post');
    });

    Route::prefix('groups')->name('groups.')->middleware('can:groups.view')->group(function(){
        Route::get('/', [GroupController::class, 'index'])->name('index');

        Route::get('/add', [GroupController::class, 'add'])->name('add')->can('create', Group::class);

        Route::get('/edit/{group}', [GroupController::class, 'edit'])->name('edit')->can('updateAny', Group::class);

        Route::get('/delete/{group}', [GroupController::class, 'delete'])->name('delete')->can('updateAny', Group::class);;

        Route::get('/permission/{group}', [GroupController::class, 'permission'])->name('permission')->can('permissionAny', Group::class);

        Route::post('/permission/{group}', [GroupController::class, 'postPermission']);
    });

    Route::prefix('users')->name('users.')->middleware('can:users.view')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('/add', [UserController::class, 'add'])->name('add')->can('create', User::class);

        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit')->can('updateAny', User::class);

        Route::get('/delete/{user}', [UserController::class, 'delete'])->name('delete')->can('deleteAny', User::class);
    });
});
