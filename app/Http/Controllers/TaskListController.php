<?php

namespace dsTaskr\Http\Controllers;

use Illuminate\Http\Request;

use dsTaskr\TaskList;
use dasanToDo\Task;
use View;
use Form;
use Redirect;


class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get a list of all task lists
        $taskLists = TaskList::all();

        return View::make('task-list.index', ['taskLists' => $taskLists] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (View::make('task-list.add-or-edit'));
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
            'list_name' => 'required|min:2'
        ]);

        $taskList = new TaskList;
        $taskList->list_name = $request->input('list_name');
        $taskList->save();

        return Redirect::route('task-lists.index')->with('message', 'A new task list has been created!');

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
        //
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
        //
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
