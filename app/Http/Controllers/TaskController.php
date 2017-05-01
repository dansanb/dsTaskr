<?php

namespace dsTaskr\Http\Controllers;

use Illuminate\Http\Request;

use dsTaskr\TaskList;
use dsTaskr\Task;
use View;
use Form;
use Redirect;


class TaskController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        // require user authentication to use this controller.
        $this->middleware('auth');
    }

    /**
     * Create a task in a list
     *
     * @return View
     */
    public function create($taskListId)
    {
        return (View::make('task.add-or-edit', ['taskListId' => $taskListId] ));
    }

    /**
     * Store a task
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the task requirements
        $this->validate($request, [
            'task_name' => 'required|min:2'
        ]);

        // make sure task list id is valid - fail otherwise
        $taskList = TaskList::findOrFail( $request->input('task_list_id') );

        // create and save new task
        $task = new Task;
        $task->task_name = $request->input('task_name');
        $task->task_list_id = $request->input('task_list_id');
        $task->completed = false;
        $task->save();

        // return to task list with message
        return Redirect::route('task-lists.show', $task->task_list_id)->with('message', 'A new task list has been created');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return (View::make('task.add-or-edit', ['task' => $task, 'taskListId' => $task->task_list_id] ));
    }

    /**
     * Updates task.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id of task to be completed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // make sure task id valid, fail otherwise
        $task = Task::findOrFail($id);

        // set to completed if provided
        $task->completed = $request->has('completed') ? $request->input('completed') : $task->completed;

        // set task name if provided
        $task->task_name = $request->has('task_name') ? $request->input('task_name') : $task->task_name;

        $task->save();

        // return to task list 
        return Redirect::route('task-lists.show', $task->task_list_id)->with('message', 'The task has been marked as completed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $taskListId = $task->task_list_id;
        $task->delete();

        return Redirect::route('task-lists.show', $taskListId)->with('message', 'Task has been deleted.');
 
    }

}
