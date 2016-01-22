<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="@yield('description')">
        <link rel="icon" href="{{ asset('favicon.ico') }}">

        <title>@yield('title', trans('master.site_name'))</title>

        @section('css')
            <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
            <link href="{{ asset('css/offcanvas.css') }}" rel="stylesheet">
            <link href="{{ asset('css/add.css') }}" rel="stylesheet">
        @show

        <!--[if lt IE 9]><script src="{{ asset('js/ie8-responsive-file-warning.js') }}"></script><![endif]-->
        <script src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">{{trans('master.site_name')}}</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    @yield('navbar')
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->

        <div class="container">

            <div class="row row-offcanvas row-offcanvas-right">

                <div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">{{trans('master.sidebar_right')}}</button>
                    </p>
                    
                    @yield('breadcrumbs')
                    <h1>@yield('h1')</h1>
                    @yield('content')
                    @yield('encors')
                </div><!--/.col-xs-12.col-sm-9-->

                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                    @yield('sidebar')
                </div><!--/.sidebar-offcanvas-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; {{trans('master.site_name')}} 2014 - {{date('Y')}}</p>
                <p style="float:right">
                 <script src="{{ asset('js/li.js') }}"></script>
              </p>
            </footer>

        </div><!--/.container-->
        
        @section('js')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
            <script src="{{ asset('js/offcanvas.js') }}"></script>
            <script src="{{ asset('js/analytics.js') }}"></script>
            <script src="{{ asset('js/activeLink.js') }}"></script>
        @show
    </body>
</html>