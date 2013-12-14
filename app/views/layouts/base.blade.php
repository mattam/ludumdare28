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
            <div class="navbar navbar-default">
              <div class="navbar-header">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-collapse-01"></button>
                <a href="/" class="navbar-brand">Home</a>
              </div>  
                  
              <div class="navbar-collapse collapse navbar-collapse-01">
                <ul class="nav navbar-nav">
                    @if (Sentry::check())
                        <li><a href="{{ URL::route('auth.logout') }}"><i></i> Logout</a></li>
                    @else
                        <li><a href="{{ URL::route('auth.login') }}"><i></i> Login</a></li>
                    @endif
                </ul>
              </div>
            </div>
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

