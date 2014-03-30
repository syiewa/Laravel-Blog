<html>
    <head>
        <meta charset="utf-8">
        <title>Arnosa.net</title>
        <link href="http://bootswatch.com/cosmo/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" type="text/css" rel="stylesheet">
        {{ HTML::style('/assets/css/front.css') }}
        {{ HTML::style('/assets/prettify/prettify.css') }}
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <style type="text/css">
            pre.prettyprint {
                border: 1px solid #ccc;
                margin-bottom: 0;
                padding: 9.5px;
            }
        </style>
    <body>
        @include('front.layouts.header')
        <div class="navbar navbar-static">
            <div class="container">	
            </div>
        </div><!-- /.navbar -->
        <!-- Begin Body -->
        <div class="container">
            <div class="row">
                <div class="col col-sm-3">
                    @include('front.layouts.sidebar')
                </div>  
                <div class="col col-sm-9">
                    @yield('main')
                </div> 
            </div>
        </div>
        <div id="footer">
            <div class="container">
                @include('front.layouts.footer')
            </div>
        </div>
    </div>

    {{ HTML::script('https://code.jquery.com/jquery-1.11.0.min.js') }}
    {{ HTML::script('/assets/js/moment.min.js') }}
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    {{ HTML::script('/assets/prettify/prettify.js') }}
    <script>
        !function($) {
            $(function() {
                window.prettyPrint && prettyPrint()
            })
        }(window.jQuery)
    </script>
</body>
</html>
