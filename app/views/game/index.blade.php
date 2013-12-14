@extends('layouts.base')

@section('navigation')
    @parent
@stop

@section('content')
<h3>Game</h3>
@foreach ($dices as $dice)
	<img src="/images/{{$dice->rolled}}.png" width="100"/>
@endforeach

@stop