<!DOCTYPE html>
<html lang="en" ng-app="ytsApp" ng-controller="AppCtrl">
<head>
  <meta charset="utf-8">
  <base href="/" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Movies App</title>
  <link ng-href="{{ theme }}" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.0/animate.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- AngularJS -->
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.19/angular.min.js"></script>
  <!-- Firebase -->
  <script src="//cdn.firebase.com/js/client/1.0.21/firebase.js"></script>
  <!-- AngularFire -->
  <script src="//cdn.firebase.com/libs/angularfire/0.8.2/angularfire.min.js"></script>
  <script src="//cdn.firebase.com/js/simple-login/1.6.3/firebase-simple-login.js"></script>
  <!-- Underscore -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>
</head>
<body>
  <div class="container-fluid">

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
            <li><a href="#/movies">Browse Movies</a></li>
            <li><a href="#/random">Random</a></li>
            <li ng-hide="auth.user"><a href="#/login">Log In</a></li>
            <li ng-hide="auth.user"><a href="#/register">Register</a></li>
            <li ng-show="auth.user"><a href="#" ng-bind="auth.user.email"></a></li>
            <li ng-show="auth.user"><a href="#/logout">Log Out</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
      <div class="col-md-3 col-lg-2">
        <div class="sidebar">
          <div class="page-header">
            <h1>Welcome</h1>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim fuga, iure illo provident. Facere sunt harum sapiente ipsum veritatis recusandae dolorem inventore, magni consequatur labore expedita non officia velit placeat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, sapiente vitae iusto, totam nesciunt eum ducimus fugit maiores et cumque omnis error rem autem officiis culpa quae mollitia! Placeat, consectetur.</p>
          <div class="page-header">
            <h3>Theme</h3>
          </div>
          <select name="theme" id="theme" class="form-control" ng-model="theme">
            <?php foreach ($themes as $theme): ?>
              <option value="<?= $theme->src ?>"><?= $theme->name ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="col-md-9 col-lg-10">
        <div id="flash" class="alert alert-{{ flash.status }}" ng-show="flash">
          {{ flash.message }}
        </div>
        <div id="master-view" ng-view></div>
      </div>
    </div>

    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
      <div class="container">
        ...
      </div>
    </nav>

  </div>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular-route.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular-animate.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/services/services.js"></script>
  <script src="assets/js/controllers/controllers.js"></script>
  <script src="assets/js/directives/directives.js"></script>
</body>
</html>