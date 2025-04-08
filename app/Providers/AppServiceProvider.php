<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $user = Auth::user();
            $countTask = 0;

            if ($user && $user->role === 'worker') {
                $countTask = Task::where('assigned_to', $user->id)->whereHas('creator', function ($q) {
                    $q->where('role', 'tasker');
                })->whereHas('taskDetail', function ($q) {
                    $q->where('status', false);
                })->count();
            }
            $view->with('countTask', $countTask);
        });
    }
}
