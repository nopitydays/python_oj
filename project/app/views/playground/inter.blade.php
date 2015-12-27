@extends('_layouts.default')

@section('func')

    <link href="{{ URL::asset('css/pyedit/codestyle.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/pyedit/codemirror.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/pyedit/solarized.css') }}" rel="stylesheet" />

    <script src="{{ URL::asset('js/pyedit/jquery-1.7.2.min.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/codemirrorepl.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/repl.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/python.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/editor.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/skulpt.min.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/skulpt-stdlib.js') }}"></script>

@stop

@section('main')

<ul class="nav nav-pills">
  <li role="presentation"><a href="{{ URL::route('playground.index') }}">编辑模式</a></li>
  <li role="presentation"><a href="{{ URL::route('playground.inter') }}">交互模式</a></li>
</ul>
<a href="{{ URL::route('playground.prolist') }}" class="btn btn-info">问题列表</a>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 interactive">
      <textarea id="interactive" cols="85" rows="1"></textarea>
    </div>
  </div>
</div>

@stop
