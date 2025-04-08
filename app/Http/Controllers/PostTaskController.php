<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use Illuminate\Http\Request;

class PostTaskController extends Controller
{
    public function store(Request $request)
    {
        $task = Task::create($request->validate([
            'title' => 'required',
            'desc' => 'nullable',
            'assigned_to' => 'required',
            'created_by' => 'required',
        ]));
        if ($request->filled('title_list')) {
            $task->taskDetail()->createMany(
                collect($request->title_list)->map(fn($title_list, $key) => [
                    'title_list' => $title_list,
                    'desc_list' => $request->desc_list[$key] ?? null,
                ])->toArray()
            );
        }
        return redirect('/tasker')->with('status', 'berhasil menambahkan tugas baru!');
    }
    public function update(Request $request, Task $task)
    {
        $upd = $request->validate([
            'title' => 'required',
            'desc' => 'nullable',
            'assigned_to' => 'required',
        ]);
        $task->update($upd);
        return redirect('/tasker')->with('status', 'berhasil update tugas');
    }
    public function delete(Task $task)
    {
        $task->delete();
        return back()->with('status', 'berhasil hapus tugas!');
    }
    public function store_task_list(Request $request, Task $task)
    {
        $task_list = $request->validate([
            'title_list' => 'required',
            'desc_list' => 'nullable',
            'task_id' => 'required',
        ]);
        TaskDetail::create($task_list);
        return redirect('/tasker/task-list/' . $task->id)->with('status', 'berhasil tambah list tugas');
    }
    public function update_task_list(Request $request, TaskDetail $task_detail)
    {
        $task_list = $request->validate([
            'title_list' => 'required',
            'desc_list' => 'nullable',
        ]);
        $task_detail->update($task_list);
        return redirect('/tasker/task-list/' . $task_detail->task->id)->with('status', 'berhasil update list tugas');
    }
    public function delete_task_list(TaskDetail $task_detail)
    {
        $task_detail->delete();
        return back()->with('status', 'berhasil update list tugas');
    }
}
