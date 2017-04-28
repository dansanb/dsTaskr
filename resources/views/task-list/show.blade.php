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
      		<th class="col-md-2 col-sm-3 hidden-xs text-center">Completed</th>
		</tr>
  	</thead>
	<tbody>
		@foreach ($taskList['tasks'] as $task)
			@if ($task->completed)
    		<tr class=" text-muted success">
    			<td><em>{{ $task['task_name'] }}</em></td>
		    	<td class="hidden-xs text-center"><em>{{ $task->updated_at->toFormattedDateString() }}</em></td>    			
    		@else
    		<tr>
    			<td><a href="">{{ $task['task_name'] }}</td>
		    	<td class="hidden-xs text-center">-</td>    			
    		@endif
    		</tr>
    	@endforeach
	</tbody>
</table>


@endsection