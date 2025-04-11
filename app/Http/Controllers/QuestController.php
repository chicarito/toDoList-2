<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{
    public function index()
    {
        $worker = Auth::user();
        $assigned = $worker->assignedTask()->with('creator')->get();
        $global_task = Task::doesntHave('assignee')->with('creator')->get();
        $tasks = $assigned->merge($global_task);
        return view('worker.quest.index', compact('tasks'));
    }

    public function task_list(Task $task)
    {
        $task_list = $task->taskDetail()->with(['workers' => fn($q) => $q->where('user_id', Auth::id())])->get();
        return view('worker.quest.task_list', compact('task', 'task_list'));
    }

    public function do_task(TaskDetail $task_detail)
    {
        $pivot = $task_detail->workers()->where('user_id', Auth::id())->first()?->pivot;
        return view('worker.quest.do_task', compact('pivot', 'task_detail'));
    }

    public function post_do_task(Request $request, TaskDetail $task_detail)
    {
        $data = [
            'status' => $request->status
        ];
        $data['image'] = $request->file('image')->store('images', 'public');
        $task_detail->workers()->syncWithoutDetaching([
            Auth::id() => $data
        ]);
        return redirect('/quest/task-list/' . $task_detail->task->id)->with('status', 'berhasil mengerjakan tugas!');
    }
}
