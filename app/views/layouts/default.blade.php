<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <base href="/" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Movies App</title>
  <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="container-fluid">

    @include('layouts.partials.nav')

    <div class="row">
      <div class="col-md-3 col-lg-2">
        <div class="sidebar">
          @section('sidebar')
            <div class="page-header">
              <h1>Welcome</h1>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim fuga, iure illo provident. Facere sunt harum sapiente ipsum veritatis recusandae dolorem inventore, magni consequatur labore expedita non officia velit placeat.</p>
          @show
        </div>
      </div>
      <div class="col-md-9 col-lg-10">
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
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script>
    $('#flash-overlay-modal').modal();
  </script>
</body>
</html>