<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskerController extends Controller
{
    public function index()
    {
        $tasks = Task::where('created_by', Auth::id())->latest()->get();
        return view('tasker.index', compact('tasks'));
    }

    public function create()
    {
        $workers = User::where('role', 'worker')->get();
        return view('tasker.create', compact('workers'));
    }

    public function edit(Task $task)
    {
        $workers = User::where('role', 'worker')->get();
        $selected_workers = $task->assignee()->select('users.id')->pluck('users.id')->toArray();
        return view('tasker.edit', compact('task', 'workers', 'selected_workers'));
    }

    public function delete(Task $task)
    {
        $task->delete();
        return back()->with('status', 'berhasil hapus tugas!');
    }

    public function task_list(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('tasker.task_list.index', compact('task'));
    }

    public function edit_task_list(TaskDetail $task_detail)
    {
        return view('tasker.task_list.edit', compact('task_detail'));
    }

    public function delete_task_list(TaskDetail $task_detail)
    {
        $task_detail->delete();
        return back()->with('status', 'berhasil hapus list tugas!');
    }

    public function worker_progress_task(Task $task)
    {
        if ($task->assignee()->count() > 0) {
            $workers = $task->assignee()->select('users.id', 'users.name', 'users.email')->get();
        } else {
            $workers = User::where('role', 'worker')->select('id', 'name', 'email')->get();
        }
        return view('tasker.worker_progress_task.index', compact('task', 'workers'));
    }

    public function worker_progress_task_list(User $user, Task $task)
    {
        $task->with('taskDetail')->get();
        return view('tasker.worker_progress_task.task_list', compact('user', 'task'));
    }
}
