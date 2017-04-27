@extends('layouts.master')

@section('content')
<h2>New Task Lists</h2>


{!! Form::open(array('route' => 'task-lists.store', 'class' => 'form')) !!}

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
    {!! Form::label('List Name') !!}
    {!! Form::text('list_name', null, 
      array(
        'class'=>'form-control', 
        'placeholder'=>'List Name'
      )) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create List', 
      array('class'=>'btn btn-primary'
    )) !!}
</div>
{!! Form::close() !!}
</div>

@endsection