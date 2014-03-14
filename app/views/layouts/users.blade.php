<html>
    <head>
        <title>a
        </title>
        {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
        {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>