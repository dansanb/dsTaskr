@extends('layouts.master')

@section('content')

<h2>{{ $taskList['list_name'] }}</h2>

<div class="row">
	<div class="col-md-12">
		<a class="btn btn-default" href="{{ route('task-lists.index') }}"><span class="glyphicon glyphicon-chevron-left"></span></a>
		&nbsp;
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
    			<td><s><em>{{ $task['task_name'] }}</em></s></td>
		    	<td class="hidden-xs text-center"><em>{{ $task->updated_at->toFormattedDateString() }}</em></td>    			
    		@else
    		<tr>
    			<td>

    				{{ Form::open( ['route' => ['tasks.update', $task->id ], 'method' => 'put', 'class' => 'form-inline'] ) }}
		    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
						{{ $task['task_name'] }}
					{{ Form::close() }}
    			</td>
		    	<td class="hidden-xs text-center">-</td>    			
    		@endif
    		</tr>
    	@endforeach
	</tbody>
</table>


@endsection