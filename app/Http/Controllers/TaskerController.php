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
        $tasks = Task::with('taskDetail')->where('created_by', Auth::id())->latest()->get();
        return view('tasker.index', compact('tasks'));
    }
    public function create()
    {
        $user = User::where('role', 'worker')->get();
        return view('tasker.create', compact('user'));
    }
    public function edit(Task $task)
    {
        $user = User::where('role', 'worker')->get();
        return view('tasker.edit', compact('user', 'task'));
    }
    public function show(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('tasker.show', compact('task'));
    }
    public function task_list(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('tasker.task_list.index', compact('task'));
    }
    public function change_view(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('tasker.task_list.change_view', compact('task'));
    }
    public function create_task_list(Task $task)
    {
        return view('tasker.task_list.create', compact('task'));
    }
    public function edit_task_list(TaskDetail $task_detail)
    {
        return view('tasker.task_list.edit', compact('task_detail'));
    }
    public function show_task_list(TaskDetail $task_detail)
    {
        return view('tasker.task_list.show', compact('task_detail'));
    }
}