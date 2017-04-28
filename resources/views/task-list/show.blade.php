@extends('layouts.master')

@section('content')

<h2>{{ $taskList['list_name'] }}</h2>

<div class="row">
	<div class="col-md-12">
		<a class="btn btn-primary" href="{{ route('tasks.create', $taskList['id']) }} ">New Task</a>
	</div>
</div>

<table class="table">
	<thead>
    	<tr>
      		<th class="col-md-10 col-sm-9">Task</th>
      		<th class="col-md-2 col-sm-3 hidden-xs">Completed</th>
		</tr>
  	</thead>
	<tbody>
		@foreach ($taskList['tasks'] as $task)
    	<tr>
    		<td>{{ $task['task_name'] }}</td>
		    <td class="hidden-xs">12/3/2017 12:33 am</td>
    	</tr>
    	@endforeach
	</tbody>
</table>


@endsection