@extends('layouts.master')

@section('content')

<h2>{{ $taskList['list_name'] }}</h2>

<div class="row">
	<div class="col-md-12">
		<a class="btn btn-default" href="{{ route('task-lists.index') }}"><span class="glyphicon glyphicon-chevron-left"></span></a>
		&nbsp;
		<a class="btn btn-primary" href="{{ route('tasks.create', $taskList['id']) }} "><span class="glyphicon glyphicon-plus"></span> New Task</a>
		&nbsp;
		<a class="btn btn-success" id="show-hide-completed">
			<span class="glyphicon glyphicon-eye-open"></span>
			 <span class="toggle">Show Completed</span>
 			 <span class="toggle hidden">Hide Completed</span>
		 </a>
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
    		<tr class=" text-muted success hidden">
    			<td>
					<button type="submit" class="btn btn-success" disabled><span class="glyphicon glyphicon-ok"></span></button>

	    			<s><em>{{ $task['task_name'] }}</em></s>
    			</td>
		    	<td class="hidden-xs text-center"><em>{{ $task->updated_at->toFormattedDateString() }}</em></td> 
		    </tr>   			
    		@else
    		<tr>
    			<td>

    				{{ Form::open( ['route' => ['tasks.update', $task->id ], 'method' => 'put', 'class' => 'form-inline'] ) }}
    					{{ Form::hidden('completed', true) }}
		    			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span></button>
						{{ $task->task_name }}
					{{ Form::close() }}
    			</td>
		    	<td class="hidden-xs text-center">
					{{ Form::open( ['route' => ['tasks.destroy', $task->id ], 'method' => 'delete', 'class' => 'delete form-inline'] ) }}
						
						<!-- edit list name button -->
						<a href="{{ route ('tasks.edit', $task->id) }}" class="btn btn-primary">
							<span class="glyphicon glyphicon-pencil"></span>
						</a>

						<!-- delete button -->
		    			<button type="submit" class="btn btn-danger">
			    			<span class="glyphicon glyphicon-trash"></span>
		    			</button>
		    			
					{{ Form::close() }}
		    	</td>   
		    </tr> 			
    		@endif
    	@endforeach
	</tbody>
</table>


@endsection