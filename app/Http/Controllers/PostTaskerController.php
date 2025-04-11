<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use Illuminate\Http\Request;

class PostTaskerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'created_by' => 'required',
            'assignee' => 'nullable',
            'assignee.*' => 'exists:users,id',
        ]);
        $task = Task::create([
            'title' => $request->title,
            'created_by' => $request->created_by,
        ]);

        if (!empty($request->assignee)) {
            $task->assignee()->attach($request->assignee);
        }
        return redirect('/tasker')->with('status', 'berhasil tambah tugas');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'assignee' => 'nullable',
            'assignee.*' => 'exists:users,id',
        ]);
        $task->update([
            'title' => $request->title,
        ]);
        $task->assignee()->sync($request->assignee ?? []);
        return redirect('/tasker')->with('status', 'berhasil ubah tugas!');
    }

    public function store_task_list(Request $request)
    {
        TaskDetail::create($request->validate([
            'task_id' => 'required',
            'title_list' => 'required',
        ]));
        return back()->with('status', 'berhasil tambah list tugas!');
    }

    public function update_task_list(Request $request, TaskDetail $task_detail)
    {
        $task_detail->update($request->validate([
            'title_list' => 'required',
        ]));
        return redirect('/tasker/task-list/' . $task_detail->task->id)->with('status', 'berhasil ubah list tugas!');
    }
}
