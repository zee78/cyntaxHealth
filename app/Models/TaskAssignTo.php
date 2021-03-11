<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAssignTo extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}
