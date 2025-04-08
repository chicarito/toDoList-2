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
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function taskDetail()
    {
        return $this->hasMany(TaskDetail::class);
    }

    public function getProgressAttribute()
    {
        return [
            'total' => $this->taskDetail->count(),
            'completed' => $this->taskDetail->where('status', true)->count(),
        ];
    }
}
