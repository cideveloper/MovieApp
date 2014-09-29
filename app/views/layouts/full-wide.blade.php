<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <base href="/" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Movies App</title>
  <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/simplex/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="container-fluid">

    @include('layouts.partials.nav')

    <div class="row">
      <div class="col-xs-12">
        <div id="master-view">
          @include('flash::message')

          @yield('content')
        </div>
      </div>
    </div>

    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
      <div class="container">
        ...
      </div>
    </nav>

  </div>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script>
    $('#flash-overlay-modal').modal();
  </script>
</body>
</html>