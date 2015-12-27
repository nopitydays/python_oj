@extends('_layouts.default')

@section('main')

    <p style="background-color: seagreen">
    <p>

        {{Notification::showAll()}}
        {{--{{$user_info->username}}<br>
        {{$user_info->email}}<br>
        注册时间{{$user_info->created_at}}<br>
        最后登录时间{{$user_info->last_login}}<br>--}}
        <br/>
        <br/>
    <p class="btn btn-primary">提交成功，题目状态{{$pro_submit->status}}<br></p>
    <br>
    <br>
    </p>

    </p>



@stop