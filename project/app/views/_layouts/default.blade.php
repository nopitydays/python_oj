<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <title>Python网络教室</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="HandheldFriendly" content="true">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    @include('_partials.assets')

    @yield('func')
</head>
<body>

<nav class="pyoj-navbar navbar navbar-default navbar-static-top">
  <div class="container-fixed">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="{{ URL::route('home.index') }}">Python网络教室</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @include('_partials.navigation')
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="pyoj-content container-fluid">
  @yield('main')
</div>
<footer class="pyoj-footer container-fluid">
  <p>I'm footer</p>
</footer>
</body>
</html>
