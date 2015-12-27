@if (Sentry::check())
    <?php
    if (Sentry::getUser()->username!=null)
        $username=Sentry::getUser()->username;
    ?>
    <ul class="nav navbar-nav">
      <li class="{{ Request::is('playground*') ? 'active' : null }}"><a href="{{ URL::route('playground.index') }}"><i class="fa fa-puzzle-piece"></i> Playground</a></li>
      <li class="{{ Request::is('problems*') ? 'active' : null }}"><a href="{{ URL::route('problems.index') }}"><i class="fa fa-globe"></i> 习题</a></li>
      <li class="{{ Request::is('book_problems*') ? 'active' : null }}"><a href="{{ URL::route('problems.index') }}"><i class="fa fa-bookmark"></i> 课本习题</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown {{ Request::is('users*') ? 'active' : null }}">
        <a href="dropdown-toggle {{ isset($username)?(URL::route('users.index')):(URL::route('login')) }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{{isset($username)?$username:'Login in'}}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="{{ URL::route('users.edit') }}"><i class="fa fa-edit"></i> 编辑信息</a></li>
              <li><a href="{{ URL::route('statistic') }}"><i class="fa fa-bar-chart"></i> 个人统计</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out"></i> 登出</a></li>
          </ul>
      </li>
    </ul>
@endif

@if (!Sentry::check())
    <ul class="nav navbar-nav">
        <li class="{{Request::is('playground*') ? 'active' : null}}"><a href="{{ URL::route('playground.index') }}"><i class="fa fa-puzzle-piece"></i> Playground</a></li>
        <li class="{{Request::is('problems*') ? 'active' : null}}"><a href="{{ URL::route('admin.problems.index') }}"><i class="fa fa-globe"></i> 习题</a></li>
        <li class="{{Request::is('book_problems*') ? 'active' : null }}"><a href="{{ URL::route('admin.problems.index') }}"><i class="fa fa-bookmark"></i> 课本习题</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="{{null}}"><a href="{{URL::route('sign_up') }}"><i class="fa fa-user-plus"></i> 注册</a>
      <li class="{{null}}"><a href="{{URL::route('login') }}"><i class="fa fa-sign-in"></i> 登录</a>
    </ul>
@endif
