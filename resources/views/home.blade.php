@extends('layouts.master')

@section('content')

<div class="jumbotron">

	@if(Auth::guest())
		<h1>Welcome to dsTaskr</h1>
		<p>A multi-list, Todo web app that is easy to use. Sign in or create a new account to get started.</p>
		<p>
			<a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">Login</a>&nbsp;
			<a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Register</a>
		</p>
	@else
		<h1>Welcome back, {{ Auth::user()->name }}.</h1>
		<p>We know you are busy, so get started making your task lists:</p>
		<p>
			<a class="btn btn-success btn-lg" href="{{ route('task-lists.create') }}" role="button">Create New List</a>
			<a class="btn btn-primary btn-lg" href="{{ route('task-lists.index') }}" role="button">My Task Lists</a>			
		</p>
	@endif
</div>

@endsection