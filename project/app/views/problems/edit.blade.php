@extends('_layouts.default')

@section('main')


    {{ Notification::showAll() }}

    @if ($errors->any())
		<div class="alert alert-error">
		{{ implode('<br>', $errors->all()) }}
		</div>
    @endif

    {{ Form::model($problem, array('method' => 'put', 'route' => array('problems.update', $problem->id))) }}
	<h2>编辑问题</h2>

        <div class="form-group">
            <h3>题目 {{ $problem->id }}</h3>
        </div>

		<div class="form-group">
            {{ Form::label('title', '标题') }}
            <div>
                {{ Form::text('title',"", array('class' => 'form-control')) }}
            </div>
        </div>

		<div class="form-group">
            {{ Form::label('level', '级别') }}
            <div>
                {{ Form::text('level',"", array('class' => 'form-control')) }}
            </div>
        </div>

		<div class="form-group">
            {{ Form::label('tag', '标签') }}
            <div>
                {{ Form::text('tag',"", array('class' => 'form-control')) }}
            </div>
        </div>

		<div class="form-group">
            {{ Form::label('content', '内容') }}
            <div>
                {{ Form::textarea('content',"", array('class' => 'form-control')) }}
            </div>
        </div>

		<div class="form-group">
            {{ Form::label('input', '输入样例') }}
            <div>
                {{ Form::textarea('input',"", array('class' => 'form-control')) }}
            </div>
        </div>

		<div class="form-group">
            {{ Form::label('output', '输出样例') }}
            <div>
                {{ Form::textarea('output',"", array('class' => 'form-control')) }}
            </div>
        </div>

		<div>
            {{ Form::submit('更新', array('class' => 'btn btn-success btn-save btn-large')) }}
            <a href="{{ URL::route('problems.index') }}" class="btn btn-large btn-default">取消</a>
        </div>

    {{ Form::close() }}

@stop
