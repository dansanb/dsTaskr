@extends('layouts.master')

@section('content')

<h2>{{ $taskList['list_name'] }}</h2>

<div>
	{{ link_to_route('task-lists.edit', 'Edit List Name', array('id' => $taskList['id'] ) ) }}

	{{ Form::open( ['route' => ['task-lists.destroy', $taskList['id'] ], 'method' => 'delete', 'class' => 'delete'] ) }}
    	<button type="submit" >Delete List</button>
	{{ Form::close() }}

</div>

<ul class="tasks">
	@foreach ($taskList['tasks'] as $task)
		<li>{{ $task['task_name'] }}</li>
	@endforeach
</ul>

@endsection