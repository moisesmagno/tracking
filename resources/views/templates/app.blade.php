<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{ asset('images/favicon_1.ico') }}">

        <title>Tracking - Celebryts</title>

        <!-- Plugin Css-->
        <link href="{{ asset('plugins/custombox/css/custombox.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />


        <!--Data table -->
        <link href="Https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="Https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="styleshee t" type="text/css" />
        <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />


        <!-- CSS Custon -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{ asset('js/modernizr.min.js') }}"></script>
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Tracking</span></a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                        <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                        <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                <input type="text" placeholder="Buscar..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">

                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>

                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('images/users/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('profile_user') }}"><i class="ti-user m-r-10 text-custom"></i> Perfil</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('logout_user') }}"><i class="ti-power-off m-r-10 text-danger"></i> Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="text-muted menu-title">Navegação</li>
                            {{--<li class="has_sub">--}}
                                {{--<a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> <span class="menu-arrow"></span></a>--}}

                                {{--<ul class="list-unstyled">--}}
                                    {{--<li><a href="{{ route('home') }}">Home</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            <li class="has_sub">
                                <a href="{{ route('home') }}" class="waves-effect"><i class="ti-paint-bucket"></i> <span> Marcas</span> <span class="menu-arrow"></span> </a>
                                {{--javascript:void(0);--}}
                                {{--<ul class="list-unstyled">--}}
                                    {{--<li><a href="{{ route('home') }}">Home</a></li>--}}
                                    {{--<li><a href="">URLs</a></li>--}}
                                {{--</ul>--}}
                            </li>



                            <li class="has_sub">
                                <a href="{{ route('pixel_conversion') }}" class="waves-effect"><i class="ti-settings"></i> <span> Pixels de conversão</span> <span class="menu-arrow"></span> </a>
                            </li>


                            {{--<li class="has_sub">--}}
                                {{--<a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i> <span> Campanhas</span> <span class="menu-arrow"></span> </a>--}}
                                {{--<ul class="list-unstyled">--}}
                                    {{--<li><a href="{{ route('pixel_conversion') }}">Pixels de conversão</a></li>--}}
                                    {{--<li><a href="#">Dados da conta</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">

                <!-- Start content -->
                <div class="content">

                    <!-- Application content -->
                    @yield('content')

                    <!-- Application footer -->
                    <footer class="footer text-right">
                        © 2016. All rights reserved.
                    </footer>

                </div>

                @yield('modals')

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        {{--/* -----------------------------------------------------}}
            {{--Aqui vão os JS padrões--}}
        {{-------------------------------------------------------*/--}}

        {{--/* -----------------------------------------------------}}
            {{--Aqui vão os JS próprios de cada página--}}
        {{-------------------------------------------------------*/--}}

        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <script src="Https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>




        <script src="{{ asset('js/data-table-custom.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/detect.js') }}"></script>
        <script src="{{ asset('js/fastclick.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('js/jquery.core.js') }}"></script>
        <script src="{{ asset('js/jquery.app.js') }}"></script>
        <script src="{{ asset('js/numberFormat154.js') }}"></script>

        <!-- Modal-Effect -->
        <script src="{{ asset('plugins/custombox/js/custombox.min.js') }}"></script>
        <script src="{{ asset('plugins/custombox/js/legacy.min.js') }}"></script>


        <!-- Application Ajax-->
        <script src="{{ asset('js/ajax.js') }}"></script>

        <!-- Main -->
        <script src="{{ asset('js/main-js-puro.js') }}"></script>
        <script src="{{ asset('js/main-jquery.js') }}"></script>

        <!-- Validations -->
        <script src="{{ asset('js/validations.js') }}"></script>

        <!-- Masks -->
        <script src="{{ asset('js/jquery-mask.js') }}"></script>
        <script src="{{ asset('js/jquery-mask-custom.js') }}"></script>
    </body>
</html>