<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Page</title>
        <link href="http://bootswatch.com/yeti/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" type="text/css" rel="stylesheet">
        {{ HTML::style('/assets/css/front.css') }}
        {{ HTML::style('/assets/css/prettify.css') }}
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <body>
        @include('front.layouts.header')

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
        <div class='footer' style='background-color: white'>
            <p class='text-center'>Created By : Syiewa@ {{ date('Y') }}</p>
        </div>

        {{ HTML::script('https://code.jquery.com/jquery-1.11.0.min.js') }}
        {{ HTML::script('/assets/js/moment.min.js') }}
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        {{ HTML::script('/assets/js/prettify.js') }}
        <script type='text/javascript'>

            $(document).ready(function() {

                $('#sidebar').affix({
                    offset: {
                        top: 240
                    }
                });

            });

        </script>
    </body>
</html>
