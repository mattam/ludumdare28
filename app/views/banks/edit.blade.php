@extends('layouts.scaffold')

@section('main')

<h1>Edit Bank</h1>
{{ Form::model($bank, array('method' => 'PATCH', 'route' => array('banks.update', $bank->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('banks.show', 'Cancel', $bank->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
