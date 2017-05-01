@extends('layouts.master')

@section('content')

<h2>My Task Lists</h2>

<div class="row">
	<div class="col-md-12">
		<a class="btn btn-primary" href="{{ route('task-lists.create') }} "><span class="glyphicon glyphicon-plus"></span> New List</a>
	</div>
</div>


<div class="row row-margin">

	@foreach ($taskLists as $taskList)
	<div class="col-lg-4 col-sm-6 col-xs-12">
	    <div class="thumbnail task-thumbnail">
			<div class="caption">
		        <h4>{{ $taskList->list_name}}</h4>
		        <div class="sit-bottom">
		        	
					{{ Form::open( ['route' => ['task-lists.destroy', $taskList['id'] ], 'method' => 'delete', 'class' => 'delete form-inline'] ) }}
						
						<!-- view tasks button -->
						<a href="{{ route('task-lists.show', $taskList->id) }}" class="btn btn-primary inline">
		  					Pending <span class="badge">{{ $taskList->tasksPending()->count() }}</span>
						</a>

						<!-- edit list name button -->
						<a href="{{ route ('task-lists.edit', array('id' => $taskList['id'])) }}" class="btn btn-primary">
							<span class="glyphicon glyphicon-pencil"></span>
						</a>

						<!-- delete button -->
		    			<button type="submit" class="btn btn-danger">
			    			<span class="glyphicon glyphicon-trash"></span>
		    			</button>
		    			
					{{ Form::close() }}

		         </div>
			</div>
		</div>
	</div>
	@endforeach
</div>


@endsection