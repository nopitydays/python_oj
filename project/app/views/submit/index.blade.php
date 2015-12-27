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

    <script type="text/javascript">
        function clearoutput() {
            document.getElementById('edoutput').innerHTML = '';
        }

    </script>

@stop


@section('main')
	<div class="container"  style="display:block;">
        <textarea id="code" cols="85" rows="25">
#
# Welcome to use Python online programming
#

def main():



main()
        </textarea>
        <div>
            <pre id="edoutput" class="edoutput"></pre>
        </div>
        <div id="mycanvas" class="ac-canvas">
        </div>
        <div style="color: #002b36">
            <button id="skulpt_run">运行</button>
            <button id="clearoutput">清空</button>
        </div>
    </div>

    <div class="interactive" style="display:none;">
        <h4><a class="title">命令行模式:</a></h4>
        <textarea id="interactive" cols="85" rows="1"></textarea>
    </div>

    <br>
    <div>

        <a href="{{ URL::route('problems.index') }}" class="btn btn-primary">返回问题列表</a>
    </div>


    <br>
    <br>
@stop
