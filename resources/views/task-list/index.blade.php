@extends('layouts.master')

@section('content')
<h2>Task Lists:</h2>

<a href="/task-lists/create">New List</a>

<ul class="task-lists">
	@foreach ($taskLists as $taskList)
		<li><a href="/task-lists/{{ $taskList['id'] }}">{{ $taskList['list_name'] }}</a></li>
	@endforeach
</ul>

@endsection