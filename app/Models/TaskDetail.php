<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    protected $guarded = [''];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function workers()
    {
        return $this->belongsToMany(User::class, 'task_detail_user')->withPivot('image', 'status')->withTimestamps();
    }
}
