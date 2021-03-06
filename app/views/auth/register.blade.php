@extends('layouts.base')
 
@section('content')

<h4>Register New Account</h4>
<div class="well">
    <form class="form-horizontal" action="{{ URL::to('auth/register') }}" method="post">
        {{ Form::token() }}
        
        <div class="control-group {{ ($errors->has('email')) ? 'error' : '' }}" for="email">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input name="email" id="email" value="{{ Request::old('email') }}" type="text" class="input-xlarge" placeholder="E-mail">
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
            </div>
        </div>  

        <div class="control-group {{ $errors->has('password') ? 'error' : '' }}" for="password">
            <label class="control-label" for="password">New Password</label>
            <div class="controls">
                <input name="password" value="" type="password" class="input-xlarge" placeholder="New Password">
                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
            </div>
        </div>

        <div class="control-group {{ $errors->has('password_confirmation') ? 'error' : '' }}" for="password_confirmation">
            <label class="control-label" for="password_confirmation">Confirm New Password</label>
            <div class="controls">
                <input name="password_confirmation" value="" type="password" class="input-xlarge" placeholder="New Password Again">
                {{ ($errors->has('password_confirmation') ? $errors->first('password_confirmation') : '') }}
            </div>
        </div>

        <div class="form-actions">
            <input class="btn-primary btn" type="submit" value="Register"> 
            <input class="btn " type="reset" value="Reset">
        </div>  
    </form>
</div>

@stop