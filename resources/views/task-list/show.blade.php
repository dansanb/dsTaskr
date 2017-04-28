@extends('layouts.master')

@section('content')

<h2>{{ $taskList['list_name'] }}</h2>

<table class="table">
	<thead>
    	<tr>
      		<th class="col-md-2"></th>
      		<th>Task</th>
		</tr>
  	</thead>
	<tbody>
		@foreach ($taskList['tasks'] as $task)
    	<tr>
		    <td>
    	        <button type="button" class="btn btn-success btn-sm">
					<span class="glyphicon glyphicon-ok"></span> Check Off 
		        </button>
		    </td>
		    <td>{{ $task['task_name'] }}</td>
    	</tr>
    	@endforeach
	</tbody>
</table>


@endsection