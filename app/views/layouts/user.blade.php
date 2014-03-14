<html>
    <head>
        <meta charset="utf-8">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        {{ HTML::style('/assets/css/bootstrap-tagsinput.css') }}
        {{ HTML::style('/assets/css/bootstrap-datetimepicker.css') }}
        {{ HTML::script('https://code.jquery.com/jquery-1.11.0.min.js') }}
        {{ HTML::script('/assets/js/moment.min.js') }}
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        {{ HTML::script('/assets/js/bootstrap-tagsinput.min.js') }}
        {{ HTML::script('/assets/js/bootstrap-datetimepicker.js') }}
        <script type="text/javascript">
            $(function() {
                $('#datetimepicker1').datetimepicker({
                    format: 'DD-MM-YYYY HH:mm:ss',
                    pick12HourFormat: false,
                    useSeconds: true,
                });
            });
        </script>
        <style>
            table form { margin-bottom: 0; }
            form ul { margin-left: 0; list-style: none; }
            .error { color: red; font-style: italic; }
            body { padding-top: 20px; }
        </style>
    </head>
    <body>
        <div class="container">
            @if (Session::has('message'))
            <div class="flash alert">
                <p>{{ Session::get('message') }}</p>
            </div>
            @endif
            @yield('main')
        </div>
    </body>
</html>