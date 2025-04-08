<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    public function index()
    {
        $tasks = Task::with('taskDetail')->where('created_by', Auth::id())->get();
        return view('worker.index', compact('tasks'));
    }
    public function create()
    {
        return view('worker.create');
    }
    public function edit(Task $task)
    {
        return view('worker.edit', compact('task'));
    }
    public function task_list(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('worker.task_list.index', compact('task'));
    }
    public function change_view(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('worker.task_list.change_view', compact('task'));
    }
    public function create_task_list(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('worker.task_list.create', compact('task'));
    }
    public function edit_task_list(TaskDetail $task_detail)
    {
        return view('worker.task_list.edit', compact('task_detail'));
    }
    public function update_task_list(TaskDetail $task_detail)
    {
        return view('worker.task_list.update', compact('task_detail'));
    }
}
