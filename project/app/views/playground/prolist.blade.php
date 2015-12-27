@extends('_layouts.default')

@section('main')
    @if($flag)
        {{ Notification::showAll() }}
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Problem ID</th>
            <th>Title</th>
            <th>Level</th>
            <th>Tag</th>
            <th>Ac/Submit</th>
            <th>题目最后修改时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($problems as $problem)
            <tr>
                <td>{{ $problem->id }}</td>
                <td><a href="{{ URL::route('playground.show', $problem->id) }}" >{{ $problem->title }}</a></td>
                <td>{{ $problem->level }}</td>
                <td>{{ $problem->tag }}</td>
                <?php $pro = Pro_totel::find($problem->id); ?>
                <td>{{ $pro->ac_num }}/{{ $pro->totel_num }}</td>
                <td>{{ $problem->updated_at }}</td>
                <td><a href="{{ URL::route('playground.submit',$problem->id) }}" class="btn btn-success btn-mini pull-left">答题</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
