<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function taskAssignTos()
    {
        return $this->hasMany('App\Models\TaskAssignTo');
    }
}

// one task can be assign to many users
// one user can have many tasks