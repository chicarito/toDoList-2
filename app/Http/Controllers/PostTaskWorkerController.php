<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostTaskWorkerController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::id();
        $task = Task::create([
            'created_by' => $user,
            'title' => $request->title,
        ]);
        $task->assignee()->attach($user);
        return redirect('/worker')->with('status', 'berhasil tambah tugas!');
    }
    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->title
        ]);
        return redirect('/worker')->with('status', 'berhasil edit tugas!');
    }
    public function store_task_list(Request $request)
    {
        TaskDetail::create([
            'task_id' => $request->task_id,
            'title_list' => $request->title_list,
        ]);
        return back()->with('status', 'berhasil tambah list tugas!');
    }
    public function update_task_list(Request $request, TaskDetail $task_detail)
    {
        $task_detail->update([
            'title_list' => $request->title_list,
        ]);
        return redirect('/worker/task-list/' . $task_detail->task->id)->with('status', 'berhasil rubah list tugas!');
    }
    public function do_task_list(Request $request, TaskDetail $task_detail)
    {
        $data = [
            'status' => $request->status,
        ];
        $data['image'] = $request->file('image')->store('images', 'public');
        $task_detail->workers()->syncWithoutDetaching([
            Auth::id() => $data
        ]);
        return redirect('/worker/task-list/' . $task_detail->task->id)->with('status', 'berhasil mengerjakan tugas!');
    }
}
