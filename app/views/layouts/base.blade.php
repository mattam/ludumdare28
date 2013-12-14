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
        <nav class="navbar navbar-default" role="navigation">
            <div class="">
              <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                @if (Sentry::check())
                    <li><a href="{{ URL::route('game') }}"><i></i> Game</a></li>
                    <li><a href="{{ URL::route('dices.index') }}"><i></i> Dices</a></li>
                    <li><a href="{{ URL::route('auth.logout') }}"><i></i> Logout</a></li>
                @else
                    <li><a href="{{ URL::route('auth.register') }}"><i></i> Register</a></li>
                    <li><a href="{{ URL::route('auth.login') }}"><i></i> Login</a></li>
                @endif
              </ul>
            </div>
        </nav>
        @show     

        <!-- Notifications -->
        @include('notifications')
        <!-- ./ notifications -->

        @yield('content')
    </div>
    <!-- /.container -->


    <!-- Load JS here for greater good =============================-->
    <script src="/bootstrap/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

