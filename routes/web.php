<?php

use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\DocumentController;
use App\Http\Controllers\Backend\OfficialDispatchController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Middleware\IsAdmin;


Route::redirect('/', 'backend/dashboard')->name('home');
Route::get('login', [HomeController::class, 'login'])->name('login');
Route::get('register', [HomeController::class, 'register'])->name('register');

Route::view('/user/profile', 'profile.show')->name('profile.show')->middleware(['auth', 'verified']);

Route::prefix('backend')
	->middleware(['auth', 'verified'])
	->group(function() {
		Route::get('/dashboard', [BackendHomeController::class, 'index'])->name('dashboard');

		Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
		Route::post('post/update-status', [PostController::class, 'updateStatus'])->name('posts.updateStatus');
		Route::resource('posts', PostController::class);
		Route::resource('documents', DocumentController::class);
		Route::resource('official_dispatch', OfficialDispatchController::class);

		Route::resource('tags', TagController::class);
		Route::resource('categories', CategoryController::class);
		Route::resource('pages', PageController::class);

		Route::resource('users', UserController::class);
		Route::resource('roles', RoleController::class);

        Route::get('/notifications/search', [NotificationController::class, 'search'])->name('notifications.search');
        Route::resource('notifications', NotificationController::class);

		Route::resource('departments', DepartmentController::class);

		Route::mediaLibrary();
	});

Route::get('glide/{path}', ImageController::class)->where('path', '.+');