<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostTaskController;
use App\Http\Controllers\PostTaskWorkerController;
use App\Http\Controllers\task_from_tasker\QuestController;
use App\Http\Controllers\TaskerController;
use App\Http\Controllers\WorkerController;
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
    Route::controller(TaskerController::class)->group(function () {
        Route::get('/tasker', 'index');
        Route::get('/tasker/create', 'create');
        Route::get('/tasker/edit/{task}', 'edit');
        Route::get('/tasker/show/{task}', 'show');
        Route::get('/tasker/task-list/{task}', 'task_list');
        Route::get('/tasker/task-list/{task}/change-view', 'change_view');
        Route::get('/tasker/task-list/{task}/create', 'create_task_list');
        Route::get('/tasker/task-list/{task_detail}/edit', 'edit_task_list');
        Route::get('/tasker/task-list/{task_detail}/show', 'show_task_list');
    });
    Route::controller(PostTaskController::class)->group(function () {
        Route::post('/tasker/store', 'store');
        Route::get('/tasker/delete/{task}', 'delete');
        Route::post('/tasker/update/{task}', 'update');
        Route::post('/tasker/task-list/{task}/store', 'store_task_list');
        Route::post('/tasker/task-list/{task_detail}/update', 'update_task_list');
        Route::get('/tasker/task-list/{task_detail}/delete', 'delete_task_list');
    });
});


Route::middleware(['auth', RoleMiddleware::class . ':worker'])->group(function () {
    Route::controller(WorkerController::class)->group(function () {
        Route::get('/worker', 'index');
        Route::get('/worker/create', 'create');
        Route::get('/worker/edit/{task}', 'edit');
        Route::get('/worker/task-list/{task}', 'task_list');
        Route::get('/worker/task-list/{task}/change-view', 'change_view');
        Route::get('/worker/task-list/{task}/create', 'create_task_list');
        Route::get('/worker/task-list/{task_detail}/edit', 'edit_task_list');
        Route::get('/worker/task-list/{task_detail}/update', 'update_task_list');
    });

    Route::controller(PostTaskWorkerController::class)->group(function () {
        Route::post('/worker/store', 'store');
        Route::post('/worker/update/{task}', 'update');
        Route::get('/worker/delete/{task}', 'delete');
        Route::post('/worker/task-list/{task}/store', 'store_task_list');
        Route::post('/worker/task-list/{task_detail}/post-edit', 'edit_task_list');
        Route::get('/worker/task-list/{task_detail}/delete', 'delete_task_list');
        Route::post('/worker/task-list/{task_detail}/post-update', 'update_task_list');
    });

    Route::controller(QuestController::class)->group(function () {
        Route::get('/quest', 'index');
        Route::get('/quest/task-list/{task}', 'task_list');
        Route::get('/quest/task-list/{task}/change-view', 'change_view');
        Route::get('/quest/task-list/{task_detail}/update', 'update');
        Route::post('/quest/task-list/{task_detail}/post/update', 'post_update');
    });
});
