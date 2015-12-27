@extends('_layouts.default')
@section('main')
    {{ Notification::showAll() }}
    @if ($errors->any())
        <div class="alert alert-error">
            {{ implode('<br>', $errors->all()) }}
        </div>
    @endif
    {{ Form::open(array('route' => 'users.store')) }}
    <div style="color: #337ab7">
    <h2>用户注册</h2>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        <div>
            {{ Form::text('email',"", array('class' => 'form-control')) }}
        </div>
    </div>
    
    <div class="form-group">
        {{ Form::label('username', '用户名') }}
        <div>
            {{ Form::text('username',"", array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('', '密码') }}
        <div>
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('', '确认密码') }}
        <div>
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
    </div>
    <div>
        {{ Form::submit('注册', array('class' => 'btn btn-success btn-save btn-large')) }}
        <a href="{{ URL::route('home.index') }}" class="btn btn-large">取消</a>
    </div>
    {{ Form::close() }}
    </div>
@stop
