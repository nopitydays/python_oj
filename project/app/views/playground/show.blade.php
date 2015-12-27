@extends('_layouts.default')

@section('main')

    <div class="container-fluid">
      <div class="row container-fluid">
        <div class="page-header"><h1>{{ $problem->id }} {{ $problem->title }}</h1></div>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h5>information</h5>
          </div>
          <div class="panel-body">
            <p>发布于 {{ $problem->created_at }}</p>
            <p>更新于 {{ $problem->updated_at }}</p>
            <hr>
            {{ $problem->content }}
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading">
            <h5>Sample Input</h5>
          </div>
          <div class="panel-body">
            {{ $problem->input }}
          </div>
        </div>

        <div class="panel panel-success">
          <div class="panel-heading">
            <h5>Sample Output</h5>
          </div>
          <div class="panel-body">
            {{ $problem->output }}
          </div>
        </div>
      </div>
      <a href="{{ URL::route('playground.submit', $problem->id) }}" class="btn btn-success btn-mini pull-right">答题</a>
    </div>



@stop
