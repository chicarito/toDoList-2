<?php

namespace App\Http\Controllers\task_from_tasker;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{
    public function index()
    {
        $tasks = Task::with('taskDetail')->where('assigned_to', Auth::id())->whereHas('creator', function ($q) {
            $q->where('role', 'tasker');
        })->get();
        return view('worker.quest.index', compact('tasks'));
    }
    public function task_list(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('worker.quest.task_list', compact('task'));
    }
    public function change_view(Task $task)
    {
        $task->with('taskDetail')->get();
        return view('worker.quest.change_view', compact('task'));
    }
    public function update(TaskDetail $task_detail)
    {
        return view('worker.quest.update', compact('task_detail'));
    }
    public function post_update(Request $request, TaskDetail $task_detail)
    {
        $task_detail->update([
            'status' => $request->status,
            'image' => $request->hasFile('image')
                ? $request->file('image')
                ->store('images', 'public')
                : $task_detail->image,
        ]);
        return redirect('/quest/task-list/' . $task_detail->task->id)->with('status', 'berhasil mengubah list tugas!');
    }
}
