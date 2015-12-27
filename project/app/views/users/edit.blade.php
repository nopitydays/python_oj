@extends('_layouts.default')

@section('main')


  {{ Notification::showAll() }}

  @if ($errors->any())
  <div class="alert alert-error">
      {{ implode('<br>', $errors->all()) }}
  </div>
  @endif
  {{--{{Form::open(['url'=>'post', 'method'=>'post', 'files'=>true])}}--}}
  {{ Form::model($user, array('method' => 'put', 'route' => array('users.update', $user->email))) }}
  <h2>编辑信息</h2>

  
  <div class="form-group">
      {{ Form::label('username', '用户名') }}
      <div>
          {{ Form::text('username',"", array('class' => 'form-control')) }}
      </div>
  </div>
  <div class="form-group">
      {{ Form::label('', '密码（必填）') }}
      <div>
          {{ Form::password('password', array('class' => 'form-control')) }} *
      </div>
  </div>
  <div class="form-group">
      {{ Form::label('', '新密码') }}
      <div>
          {{ Form::password('newpassword', array('class' => 'form-control')) }}
      </div>
  </div>
  <div class="form-group">
      {{ Form::label('', '新密码确认') }}
      <div>
          {{ Form::password('newpassword_confirmation', array('class' => 'form-control')) }}
      </div>
  </div>
  <div class="form-group">
      {{ Form::submit('更新', array('class' => 'btn btn-success btn-save btn-large')) }}
      <a href="{{ URL::route('users.index') }}" class="btn btn-large btn-default">取消</a>
  </div>

  {{ Form::close() }}

@stop
