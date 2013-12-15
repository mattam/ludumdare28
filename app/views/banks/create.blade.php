@extends('layouts.scaffold')

@section('main')

<h1>Create Bank</h1>

{{ Form::open(array('route' => 'banks.store')) }}
	<ul>
        <li>
            {{ Form::label('dice_id', 'Dice_id:') }}
            {{ Form::input('number', 'dice_id') }}
        </li>

        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
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


