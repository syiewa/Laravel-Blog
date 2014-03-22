<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Page</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        {{ HTML::style('/assets/css/styles.css') }}
        {{ HTML::style('/assets/css/bootstrap-tagsinput.css') }}
        {{ HTML::style('/assets/css/bootstrap-datetimepicker.css') }}
        {{ HTML::style('/assets/css/prettify.css') }}
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
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
        {{ HTML::script('https://code.jquery.com/jquery-1.11.0.min.js') }}
        {{ HTML::script('/assets/js/moment.min.js') }}
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        {{ HTML::script('/assets/js/bootstrap-tagsinput.min.js') }}
        {{ HTML::script('/assets/js/bootstrap-datetimepicker.js') }}
        {{ HTML::script('/assets/js/prettify.js') }}
        <script type="text/javascript">
            !function($) {
                $(function() {
                    window.prettyPrint && prettyPrint()
                })
            }(window.jQuery)
        </script>
        {{ HTML::script('/assets/js/tinymce/tinymce.min.js') }}
        <script>
            tinymce.init({
                selector: "textarea",
                theme: "modern",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor",
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                image_advtab: true,
                style_formats: [
                    {title: 'Bootstrap Image', items: [
                            {title: 'Image responsive', selector: 'img', classes: 'img-responsive'},
                            {title: 'Image Rounded', selector: 'img', classes: 'img-rounded'},
                            {title: 'Image circle', selector: 'img', classes: 'img-circle'},
                            {title: 'Image thumbnail', selector: 'img', classes: 'img-thumbnail'},
                        ]},
                    {title: 'Bootstrap Label', items: [
                            {title: 'Default', block: 'span', classes: 'label label-default'},
                            {title: 'Primary', block: 'span', classes: 'label label-primary'},
                            {title: 'Success', block: 'span', classes: 'label label-success'},
                            {title: 'Info', block: 'span', classes: 'label label-info'},
                            {title: 'Danger', block: 'span', classes: 'label label-danger'},
                        ]},
                    {title: 'Code Highlight', block: 'pre', classes: 'prettyprint linenums'},
                ]

            });
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
                $("table").on('click', '.reply', function(e) {
                    var url = $(this).attr('href');
                    var posts = $(this).attr('id');
                    var id =  posts.split("-");
                    console.log(id[0]);
                    $('html, body').animate({
                        scrollTop: $("#telo").offset().top
                    }, 2000);
                    var html = '';
                    html += '<h3> Reply Comment </h3>';
                    html += '<form action="' + url + '" method="POST">';
                    html += '<input type="hidden" value="' + id[1] + '" name="post_id">';
                    html += '<input type="hidden" value="' + id[0] + '" name="parent_id">';
                    html += '<div class="form-group">'
                    html += '<textarea class="form-control" name="komentar"></textarea></div>';
                    html += '<div class="form-group">'
                    html += '<input type="submit" value="Reply" class="btn btn-info"></div>';
                    html += '</form>';
                    $('#telo').html(html);
                    e.preventDefault();
                });
            });
        </script>
    </body>
</html>
