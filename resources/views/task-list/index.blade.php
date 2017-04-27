@extends('layouts.master')

@section('content')

<h2>My Task Lists</h2>

<a class="btn btn-primary" href="/task-lists/create">New List</a>

<table class="table">
	<thead>
    	<tr>
      		<th>Name</th>
      		<th>Pending Tasks</th>
    	</tr>
  	</thead>
	<tbody>
    	@foreach ($taskLists as $taskList)
    	<tr>
		    <td><a href="/task-lists/{{ $taskList['id'] }}">{{ $taskList['list_name'] }}</a></td>
      		<td>{{ $taskList->tasksPending()->get()->count() }}</td>
    	</tr>
    	@endforeach
	</tbody>
</table>

@endsection