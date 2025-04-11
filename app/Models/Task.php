<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [''];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee()
    {
        return $this->belongsToMany(User::class, 'task_user')->withTimestamps();
    }

    public function taskDetail()
    {
        return $this->hasMany(TaskDetail::class);
    }
}
