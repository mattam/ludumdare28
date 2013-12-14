@extends('layouts.base')

@section('navigation')
    @parent
@stop

@section('content')
<h3>Game</h3>
@foreach ($dices as $dice)
	{{$dice->rolled}}
@endforeach

@stop