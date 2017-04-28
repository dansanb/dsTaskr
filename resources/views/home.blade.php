@extends('layouts.master')

@section('content')

<div class="jumbotron">
	<h1>Welcome to dsTaskr</h1>
	<p>A multi-list, Todo web app that is easy to use. Create a task list to get started:</p>
	<p><a class="btn btn-primary btn-lg" href="{{ route('task-lists.index') }}" role="button">My Task Lists</a></p>
</div>

@endsection