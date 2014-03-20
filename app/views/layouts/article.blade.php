<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Page</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        {{ HTML::style('/assets/css/styles.css') }}
        {{ HTML::style('/assets/css/bootstrap-tagsinput.css') }}
        {{ HTML::style('/assets/css/bootstrap-datetimepicker.css') }}
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        {{ HTML::script('https://code.jquery.com/jquery-1.11.0.min.js') }}
        {{ HTML::script('/assets/js/moment.min.js') }}
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        {{ HTML::script('/assets/js/bootstrap-tagsinput.min.js') }}
        {{ HTML::script('/assets/js/bootstrap-datetimepicker.js') }}
        {{ '<script>
            $(function() {
                $("#datetimepicker1").datetimepicker({
                    format: "DD-MM-YYYY HH:mm:ss",
                    pick12HourFormat: false,
                    useSeconds: true,
                });
            });
            $(document).ready(function() {
                /* swap open/close side menu icons */
                $("[data-toggle=collapse]").click(function() {
                    // toggle icon
                    $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
                });

            });

        </script>' }}
    <body>
        @include('layouts.header')
        <div class="container" id="main">
            <div class='row'>
                <div class="col-md-3" id="sidebar">
                    @include('layouts.sidebar')
                </div>
                <div class="col-md-9">
                    @if (Session::has('message'))
                    <div class="flash alert">
                        <p>{{ Session::get('message') }}</p>
                    </div>
                    @endif
                    @yield('main')
                </div>
            </div>
        </div>
    </body>
</html>