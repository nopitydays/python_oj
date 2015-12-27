@extends('_layouts.default')

@section('func')

    <link href="{{ URL::asset('css/pyedit/codestyle.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/pyedit/codemirror.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/pyedit/solarized.css') }}" rel="stylesheet" id="editstyle" />

    <script src="{{ URL::asset('js/pyedit/jquery-1.7.2.min.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/codemirrorepl.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/repl.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/python.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/editor.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/skulpt.min.js') }}"></script>
    <script src="{{ URL::asset('js/pyedit/skulpt-stdlib.js') }}"></script>

    <script type="text/javascript">
        function stylesolarized() {
            //alert("solarized");
            $("#editstyle").attr('href','{{ URL::asset('css/pyedit/solarized.css') }}');
        }
        function styleeclipse() {
            //alert("eclipse");
            $("#editstyle").attr('href','{{ URL::asset('css/pyedit/eclipse.css') }}');
        }

        function clear_output() {
            var a = window.event.keyCode;
            if (event.altKey && a == 82) {
                $("#mycanvas").hide();
                document.getElementById('edoutput').innerHTML = '';
            }
        }
        document.onkeydown = clear_output;
    </script>

@stop

@section('main')
    <ul class="nav nav-pills">
      <li role="presentation"><a href="{{ URL::route('playground.index') }}">编辑模式</a></li>
      <li role="presentation"><a href="{{ URL::route('playground.inter') }}">交互模式</a></li>
    </ul>
    <div class="container-fluid">
        <div class="row container-fluid">
            <button id="skulpt_run" class="btn btn-primary">运行(Shift+Enter)</button>
            <button id="clearoutput" class="btn btn-default">清空(Alt+R)</button>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-md dropdown-toggle" data-toggle="dropdown">选择样式 <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:stylesolarized()">Solarized</a></li>
                    <li><a href="javascript:styleeclipse()">Eclipse</a></li>
                </ul>
            </div>
            <a href="{{ URL::route('playground.prolist') }}" class="btn btn-info">问题列表</a>
        </div>
        <div id="editor-row" class="row container-fluid">
            <div id="editor-row-left">
                <textarea id="code" cols="85" rows="25">
#
# Welcome to use Python online programming
#

def main():

main()
                </textarea>
            </div>
            <div id="editor-row-right">
                <pre id="edoutput" class="edoutput" style="border-radius: 0"></pre>
                <div id="mycanvas" class="ac-canvas" style="display: none;"></div>
            </div>
        </div>

    </div>

    <div class="interactive" style="display:none;">
        <h4><a class="title">命令行模式:</a></h4>
        <textarea id="interactive" cols="85" rows="1"></textarea>
    </div>

@stop
