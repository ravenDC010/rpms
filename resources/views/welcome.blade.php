<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body style="height:100vh;">
        <div class="container" style="padding-top: 45vh;">
            <div class="row">
            @if (Route::has('login'))
                @auth
                <div class="col-4 offset-2">
                    <a class="btn btn-primary" style="text-decoration: none;" href="{{ url('/profile') }}">Profile</a>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary" style="text-decoration: none;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                    </form>
                </div>
                @else
                <div class="col-4 offset-2">
                    <a class="btn btn-primary" style="text-decoration: none;" href="{{ route('login') }}">Login</a>
                </div>
                <div class="col-4">
                    @if (Route::has('register'))
                        <a class="btn btn-primary" style="text-decoration: none;" href="{{ route('register') }}">Register</a>
                    @endif
                </div>
                @endauth
            @endif

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
