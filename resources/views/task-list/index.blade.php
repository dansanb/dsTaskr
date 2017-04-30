@extends('layouts.master')

@section('content')

<h2>My Task Lists</h2>

<div class="row">
	<div class="col-md-12">
		<a class="btn btn-primary" href="{{ route('task-lists.create') }} "><span class="glyphicon glyphicon-plus"></span> New List</a>
	</div>
</div>

<table class="table">
	<thead>
    	<tr>
      		<th class="col-md-8 col-xs-6">Name</th>
      		<th class="col-md-2 col-xs-2 text-center">Pending Tasks</th>
      		<th class="col-md-2 col-xs-4 text-center"></th>
    	</tr>
  	</thead>
	<tbody>
    	@foreach ($taskLists as $taskList)
    	<tr>
		    <td><a href="/task-lists/{{ $taskList['id'] }}">{{ $taskList['list_name'] }}</a></td>
      		<td class="text-center">{{ $taskList->tasksPending()->count() }}</td>
      		<td class="text-center">
				{{ Form::open( ['route' => ['task-lists.destroy', $taskList['id'] ], 'method' => 'delete', 'class' => 'delete form-inline'] ) }}
					<a href="{{ route ('task-lists.edit', array('id' => $taskList['id'])) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
	    			<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
				{{ Form::close() }}
      		</td>
    	</tr>
    	@endforeach
	</tbody>
</table>

@endsection