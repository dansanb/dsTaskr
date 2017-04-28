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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($taskListId)
    {
        return (View::make('task.add-or-edit', ['taskListId' => $taskListId] ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'task_name' => 'required|min:2'
        ]);

        $task = new Task;
        $task->task_name = $request->input('task_name');
        $task->task_list_id = $request->input('task_list_id');
        $task->save();

        return Redirect::route('task-lists.show', $task->task_list_id)->with('message', 'A new task list has been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // get all tasks that belong to this list
        $taskList = TaskList::with('tasks')->find($id);

        return (View::make('task-list.show', ['taskList' => $taskList]));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taskList = TaskList::find($id);

        return (View::make('task-list.add-or-edit', ['taskList' => $taskList]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'task_name' => 'required|min:2'
        ]);

        $taskList = TaskList::findOrFail($id);
        $taskList->update( $request->all() );
        $taskList->save();

        return Redirect::route('task-lists.index')->with('message', 'Task list has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TaskList::find($id)->delete();

        return Redirect::route('task-lists.index')->with('message', 'Task list has been deleted.');
 
    }
}
