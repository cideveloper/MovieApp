<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <base href="/" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Movies App</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  @section('extra_css_files')
  @stop
  <link rel="stylesheet" href="assets/css/styles.min.css">
</head>
<body>

  @yield('template')

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  @section('extra_js_files')
  @stop
  <script>
    $('#flash-overlay-modal').modal();
  </script>
</body>
</html>