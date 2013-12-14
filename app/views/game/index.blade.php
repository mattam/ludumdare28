@extends('layouts.base')

@section('navigation')
    @parent
@stop

@section('content')
<h3>Game</h3>
<h4>You have {{count($dices)}} Dices</h4>
<h4>Your total score is {{$total}}</h4>
@foreach ($dices as $dice)
	<img src="/images/{{$dice->rolled}}.png" width="100"/>
@endforeach

{{ Form::open(array('route' => 'addDice')) }}
			{{ Form::submit('Add Dice', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

{{ Form::open(array('route' => 'rollAll')) }}
			{{ Form::submit('Roll All Dice', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@stop