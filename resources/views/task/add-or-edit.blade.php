@extends('layouts.master')

@section('content')

@if ( isset($task) )
    <h2>Update Task</h2>
    {{ Form::model( $task, ['route' => ['tasks.update', $task->id], 'class' => 'form', 'method' => 'PUT'] ) }}
@else
    <h2>New Task</h2>
    {{ Form::open( ['route' => 'tasks.store', 'class' => 'form'] ) }}
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
    There were some problems adding the new task.<br />
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif


<div class="form-group">
    {{ Form::label('Task') }}
    {{ Form::text('task_name', null, ['class'=>'form-control'] ) }}
    {{ Form::hidden('task_list_id', $taskListId, ['class'=>'form-control'] ) }}
</div>

<div class="form-group">
    <a href="{{ route ('task-lists.show', $taskListId) }}" class="btn btn-default">Cancel</a>
    {{ Form::submit('Save', ['class'=>'btn btn-primary'] ) }}
</div>
{{ Form::close() }}
</div>

@endsection