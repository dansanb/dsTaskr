@extends('layouts.master')

@section('content')

@if ( isset($taskList) )
    <h2>Update Task List</h2>
    {{ Form::model( $taskList, ['route' => ['task-lists.update', $taskList->id], 'class' => 'form', 'method' => 'PUT'] ) }}
@else
    <h2>New Task List</h2>
    {{ Form::open( ['route' => 'task-lists.store', 'class' => 'form'] ) }}
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
    There were some problems adding the new list.<br />
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif


<div class="form-group">
    {{ Form::label('List Name') }}
    {{ Form::text('list_name', null, ['class'=>'form-control'] ) }}
</div>

<div class="form-group">
    <a href="{{ route ('task-lists.index') }}" class="btn btn-default">Cancel</a>
    {{ Form::submit('Save', ['class'=>'btn btn-primary'] ) }}
</div>
{{ Form::close() }}
</div>

@endsection