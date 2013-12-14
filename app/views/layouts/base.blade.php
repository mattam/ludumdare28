<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Matthew Chan's Ludum Dare 28 entry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
        @section('navigation')

        @show     

        <!-- Notifications -->
        @include('notifications')
        <!-- ./ notifications -->

        @yield('content')
    </div>
    <!-- /.container -->


    <!-- Load JS here for greater good =============================-->
    <script src="/js/jquery-1.8.3.min.js"></script>
  </body>
</html>

