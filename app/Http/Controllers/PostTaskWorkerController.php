<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\User;
use App\Notifications\NewTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class PostTaskWorkerController extends Controller
{
    public function store(Request $request)
    {
        $task = Task::create($request->validate([
            'title' => 'required',
            'desc' => 'nullable',
            'created_by' => 'required',
            'assigned_to' => 'required',
        ]));
        if ($request->filled('title_list')) {
            $task->taskDetail()->createMany(
                collect($request->title_list)->map(fn($title_list, $key) => [
                    'title_list' => $title_list,
                    'desc_list' => $request->desc_list[$key] ?? null,
                ])->toArray()
            );
        }
        return redirect('/worker')->with('status', 'berhasil menambahkan tugas baru!');
    }
    public function update(Request $request, Task $task)
    {
        $upd = $request->validate([
            'title' => 'required',
            'desc' => 'nullable',
        ]);
        $task->update($upd);
        return redirect('/worker')->with('status', 'berhasil update tugas!');
    }
    public function delete(Task $task)
    {
        $task->delete();
        return back()->with('status', 'berhasil hapus tugas!');
    }

    public function store_task_list(Request $request, Task $task)
    {
        TaskDetail::create($request->validate([
            'task_id' => "required",
            'title_list' => "required",
            'desc_list' => "nullable",
        ]));
        return redirect('/worker/task-list/' . $task->id)->with('status', 'berhasil menambahkan list tugas!');
    }
    public function edit_task_list(Request $request, TaskDetail $task_detail)
    {
        $upd = $request->validate([
            'title_list' => 'required',
            'desc_list' => 'nullable',
        ]);
        $task_detail->update($upd);
        return redirect('/worker/task-list/' . $task_detail->task->id)->with('status', 'berhasil mengubah list tugas!');
    }
    public function delete_task_list(TaskDetail $task_detail)
    {
        $task_detail->delete();
        return back()->with('status', 'berhasil hapus list tugas!');
    }
    public function update_task_list(Request $request, TaskDetail $task_detail)
    {
        $task_detail->update([
            'status' => $request->status,
            'image' => $request->hasFile('image')
                ? $request->file('image')
                ->store('images', 'public')
                : $task_detail->image,
        ]);
        return redirect('/worker/task-list/' . $task_detail->task->id)->with('status', 'berhasil mengubah list tugas!');
    }
}
