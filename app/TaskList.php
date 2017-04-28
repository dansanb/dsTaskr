<?php

namespace dsTaskr;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
	protected $fillable = ['list_name'];

    public function tasks()
    {
        return $this->hasMany('dsTaskr\Task');
    }

    public function tasksPending()
    {
    	return $this->tasks()->where('completed', '=', 0);
    }
}
