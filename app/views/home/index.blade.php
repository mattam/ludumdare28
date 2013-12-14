@extends('layouts.base')

@section('navigation')
    @parent
@stop

@section('content')
<h3>Home</h3>

 {{ Form::open(array('route' => 'dice.roll')) }}
    @if ($errors->has('roll_dice'))
        <div class="alert alert-error">{{ $errors->first('roll_dice', ':message') }}</div>
    @endif
    <div class="form-actions">
        {{ Form::submit('Roll Dice', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}

@stop