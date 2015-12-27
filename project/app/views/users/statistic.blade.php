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
    <p class="btn btn-primary">解决的问题数{{$user_pro_totel->ac_num}}<br></p>
    <br>
    <br>
    <br>
    <br>
    <p class="btn btn-primary">尝试的问题数{{$user_pro_totel->totel_num}}<br></p>
    </p>

    </p>



@stop