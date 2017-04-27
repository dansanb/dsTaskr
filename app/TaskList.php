<?php

namespace dsTaskr;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    public function tasks()
    {
        return $this->hasMany('dsTaskr\Task');
    }

    public function tasksPending()
    {
    	return $this->tasks()->where('completed', '=', 0);
    }
}
