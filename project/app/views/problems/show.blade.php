@extends('_layouts.default')

@section('main')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title">问题详情</h2>
        </div>
        <div class="panel-body">
            <div style="color: #00232c">
                <div class="title">
                    <h3>题目{{ $problem->id }} {{ $problem->title }}</h3>
                </div>

                <div class="info">
                 发布于 {{ $problem->created_at }} 最后更新 {{ $problem->updated_at }}
                </div>

                <div class="body">
                    <h5>描述</h5>
                    {{ $problem->content }}
                </div>

                <div class="input">
                    <h5>输入样例</h5>
                    {{ $problem->input }}
                </div>

                <div class="output">
                    <h5>输出样例</h5>
                    {{ $problem->output }}
                </div>

                <div class="panel-footer">
                    <a href="{{ URL::route('submit.show',$problem->id)}}" class="btn btn-success btn-mini pull-right">submit</a>
                    </br>
                </div>
            </div>
        </div>
    </div>
@stop
