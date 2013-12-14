@extends('layouts.scaffold')

@section('main')

<h1>Edit Dice</h1>
{{ Form::model($dice, array('method' => 'PATCH', 'route' => array('dices.update', $dice->id))) }}
	<ul>
        <li>
            {{ Form::label('rolled', 'Rolled:') }}
            {{ Form::input('number', 'rolled') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('dices.show', 'Cancel', $dice->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
