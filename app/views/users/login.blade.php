<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Page</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        {{ HTML::style('/assets/css/styles.css') }}
        {{ HTML::style('/assets/css/bootstrap-tagsinput.css') }}
        {{ HTML::style('/assets/css/bootstrap-datetimepicker.css') }}
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
        <div class="container" id="main">
            <div class='row'>
                <div class="col-md-12">
                    <div class="omb_login">
                        <h3 class="omb_authTitle">Login </h3>
                        <div class="row omb_row-sm-offset-3">
                            <div class="col-xs-12 col-sm-6">	
                                @if (Session::has('message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                                {{ Form::open( array('url'=>'login','class'=>'omb_loginForm')) }}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="email" placeholder="email address">
                                </div>
                                <span class="help-block"><?php echo $errors->first('email'); ?></span>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input  type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <span class="help-block"><?php echo $errors->first('password'); ?></span>

                                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                            </div>
                        </div>
                        <div class="row omb_row-sm-offset-3">
                            <div class="col-xs-12 col-sm-3">
                                <label class="checkbox">
                                    <input type="checkbox" value="1" name="remember">Remember Me
                                </label>
                            </div>
                            {{ Form::close() }}
                            <div class="col-xs-12 col-sm-3">
                                <p class="omb_forgotPwd">
                                    <a href="#">Forgot password?</a>
                                </p>
                            </div>
                        </div>	    	
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>