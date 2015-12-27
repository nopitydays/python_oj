@extends('_layouts.default')

@section('main')
    <div style="color: #005580">
    <div id="login" class="login container-fluid">
        {{ Form::open() }}
        @if ($errors->has('login'))
            <div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
        @endif
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            <div>
                {{ Form::text('email',"", array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('password', '密码') }}
            <div>
                {{ Form::password('password', array('class' => 'form-control')) }}
            </div>
        </div>
        <div>
            {{ Form::submit('登录', array('class' => 'btn btn-info btn-login')) }}
        </div>
        {{ Form::close() }}
    </div>
    </div>
@stop
