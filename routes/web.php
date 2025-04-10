<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/post-login', 'post_login');
    Route::get('/logout', 'logout');
});


Route::controller(AdminController::class)->middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', 'index');
    Route::get('/admin/edit/{user}', 'edit');
    Route::post('/admin/store', 'store');
    Route::post('/admin/update/{user}', 'update');
    Route::get('/admin/delete/{user}', 'delete');
});

Route::middleware(['auth', RoleMiddleware::class . ':tasker'])->group(function () {
    Route::view('/tasker', 'tasker.index');
    Route::view('/tasker/create', 'tasker.create');
    Route::view('/tasker/edit', 'tasker.edit');
    Route::view('/tasker/task-list', 'tasker.task_list.index');
    Route::view('/tasker/task-list/edit', 'tasker.task_list.edit');
    Route::view('/tasker/worker-progress-task', 'tasker.worker_progress_task.index');
    Route::view('/tasker/worker-progress-task/task-list', 'tasker.worker_progress_task.task_list');
    Route::view('/tasker/worker-progress-task/task-list/show', 'tasker.worker_progress_task.show');
});


Route::middleware(['auth', RoleMiddleware::class . ':worker'])->group(function () {
    
});
