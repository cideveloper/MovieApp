    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Movies Central</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            @if ($currentUser)
              <li>{{ link_to_route('movies', 'Browse Movies') }}</li>
              <li><a href="#">{{ $currentUser->email }}</a></li>
              <li>{{ link_to_route('logout_path', 'Log Out') }}</li>
            @else
              <li>{{ link_to_route('login_path', 'Log In') }}</li>
              <li>{{ link_to_route('register_path', 'Register') }}</li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>