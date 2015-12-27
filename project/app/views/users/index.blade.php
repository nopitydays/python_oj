@extends('_layouts.default')

@section('main')
<p>    {{Notification::showAll()}}
    <?php
    $img="/photos/".$user->email.".jpg";
    echo '<img src="'.$img.'"/>';
?><br>
    {{$user->username}}<br>
    {{$user->email}}<br>
    注册时间{{$user->created_at}}<br>
    最后登录时间{{$user->last_login}}<br>

</p>
   {{-- <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>tags</th>
            <th>stars</th>
            <th>AC%</th>
            <th>AC</th>
            <th>Total</th>
            <th>最后修改时间</th>
            <th><i class="icon-cog"></i></th>
        </tr>
        </thead>
        <tbody>
        @foreach($problems as $problem)
            <tr>
                <td>{{$problem->id}}</td>
                <td><a href="{{ URL::route('problems.show',$problem->id) }}">{{ $problem->title }}</a></td>
                <td>{{$problem->tag}}</td>
                <td>{{$problem->star}}</td>
                <td>{{$problem->ac_rate}}</td>
                <td>{{$problem->ac_number}}</td>
                <td>{{$problem->submit_number}}</td>
                <td>{{ $problem->updated_at }}</td>
            </tr>
        @endforeach()
        </tbody>
    </table>--}}


@stop
