@extends('layouts.scaffold')

@section('main')

<h1>Create Dice</h1>

{{ Form::open(array('route' => 'dices.store')) }}
	<ul>
        <li>
            {{ Form::label('rolled', 'Rolled:') }}
            {{ Form::input('number', 'rolled') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


