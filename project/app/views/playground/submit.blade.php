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
        function clearoutput() {
            document.getElementById('edoutput').innerHTML = '';
        }

        function stylesolarized() {
            //alert("solarized");
            $("#editstyle").attr('href','{{ URL::asset('css/pyedit/solarized.css') }}');
        }
        function styleeclipse() {
            //alert("eclipse");
            $("#editstyle").attr('href','{{ URL::asset('css/pyedit/eclipse.css') }}');
        }

        function hotkey() {
            var a = window.event.keyCode;
            if (event.altKey && a == 82) {
                document.getElementById('edoutput').innerHTML = '';
            }
        }
        document.onkeydown = hotkey;

        function pro_info() {
            $("#onepage").toggleClass('active');
        }

        function pro_return() {
            $("#onepage").removeClass('active');
        }

    </script>

@stop

@section('main')

    <div class="title">
        <h1>{{ $problem->id }} {{ $problem->title }}</h1>
        <span><a href="javascript:pro_info()" role="buttom" class="btn btn-info">题目详情</a></span>
    </div>
    <div id="onepage" class="onepage container-fluid">
            <h2>Problem</h2>
            <p>{{ $problem->content }}</p>
            <h2>Sample Input</h2>
            <p>{{ $problem->input }}</p>
            <h2>Sample Output</h2>
            <p>{{ $problem->output }}</p>
            <hr>
            <p>
              <a href="javascript:pro_return()" role="buttom" class="btn btn-default">收起</a>
            </p>
    </div>
    <br>
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
            <a href="{{ URL::route('playground.prolist') }}" class="btn btn-success">返回问题列表</a>
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
                <pre id="edoutput" class="edoutput"></pre>
                <!--    <div id="mycanvas" class="ac-canvas"></div> -->
            </div>
        </div>

    </div>

    <div class="interactive" style="display:none;">
        <h4><a class="title">命令行模式:</a></h4>
        <textarea id="interactive" cols="85" rows="1"></textarea>
    </div>


    <br>
@stop
