<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        @yield('css')
        @yield('postCss')
    </head>
    <body>
        <div id="app">

            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand">
                        @yield('header')
                    </a>
                </div>
            </nav>
            @yield('content')
            @yield('scripts')
        </div>
    </body>
</html>
