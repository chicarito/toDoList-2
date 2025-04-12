<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    public function index()
    {
        $tasks = Task::where('created_by', Auth::id())->get();
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
    public function delete(Task $task)
    {
        $task->delete();
        return back()->with('status', 'berhasil hapus tugas!');
    }

    public function task_list(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('worker.task_list.index', compact('task'));
    }

    public function edit_task_list(TaskDetail $task_detail)
    {
        return view('worker.task_list.edit', compact('task_detail'));
    }

    public function do_task(TaskDetail $task_detail)
    {
        $pivot = $task_detail->workers()->where('user_id', Auth::id())->first()?->pivot;
        return view('worker.task_list.do_task', compact('task_detail', 'pivot'));
    }
}
