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
            <li class="visible-lg-block"><a href="#">Large</a></li>
            <li class="visible-md-block"><a href="#">Medium</a></li>
            <li class="visible-sm-block"><a href="#">Small</a></li>
            @if ($currentUser)
              <li>{{ link_to_route('movies', 'Browse Movies') }}</li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $currentUser->email }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>{{ link_to_route('profile.edit', 'Edit Profile') }}</li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li>{{ link_to_route('logout_path', 'Log Out') }}</li>
                </ul>
              </li>
            @else
              <li>{{ link_to_route('login_path', 'Log In') }}</li>
              <li>{{ link_to_route('register_path', 'Register') }}</li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>