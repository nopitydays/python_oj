@extends('_layouts.default')

@section('main')
	@if($flag)
	{{ Notification::showAll() }}

  <a href="{{ URL::route('problems.create') }}" class="btn btn-primary">添加问题</a>
	@endif
	<table class="table table-striped">
        <thead>
          <tr>
            <th>题目ID</th>
            <th>标题</th>
						<th>级别</th>
						<th>标签</th>
						<th>完成/提交</th>
            <th>题目最后修改时间</th>
						@if($flag)
						<th>操作</th>
						@endif
          </tr>
        </thead>
        <tbody>
          @foreach($problems as $problem)
          <tr>
            <td>{{ $problem->id }}</td>
            <td><a href="{{ URL::route('problems.show', $problem->id) }}" >{{ $problem->title }}</a></td>
						<td>{{ $problem->level }}</td>
						<td>{{ $problem->tag }}</td>
						<?php $pro = Pro_totel::where('pro_id','=',$problem->id)->firstOrFail(); ?>
						<td>{{ $pro->ac_num }}/{{ $pro->totel_num }}</td>
            <td>{{ $problem->updated_at }}</td>
						@if($flag)
						<td>
	            <a href="{{ URL::route('problems.edit', $problem->id) }}" class="btn btn-success btn-mini pull-left">编辑</a>
	              {{ Form::open(array('route' => array('problems.destroy', $problem->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
	                    <button type="submit" href="{{ URL::route('problems.destroy', $problem->id) }}" class="btn btn-danger btn-mini">删除</button>
	              {{ Form::close() }}
	          </td>
						@endif
          </tr>
          @endforeach
        </tbody>
    </table>
@stop
