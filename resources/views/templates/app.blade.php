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
        <link rel="stylesheet" href="{{ asset('plugins/magnific-popup/css/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ asset('plugins/jquery-datatables-editable/datatables.css') }}" />
        <link href="{{ asset('plugins/custombox/css/custombox.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />

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
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">

                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>

                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('images/users/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('profile_user') }}"><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('logout_user') }}"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
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
                            <li class="text-muted menu-title">Navigation</li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('home') }}">Dashboard 1</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-paint-bucket"></i> <span> Campanhas</span> <span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('home') }}">Campanhas</a></li>
                                    <li><a href="{{ route('urlS') }}">URLs</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i> <span> Campanhas</span> <span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('pixel_conversion') }}">Pixels de conversão</a></li>
                                    <li><a href="ui-buttons.html">Dados da conta</a></li>
                                </ul>
                            </li>
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
                    @yield('footer')

                </div>

                @yield('modals')

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
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

        <!-- Modal-Effect -->
        <script src="{{ asset('plugins/custombox/js/custombox.min.js') }}"></script>
        <script src="{{ asset('plugins/custombox/js/legacy.min.js') }}"></script>

        <!-- Examples -->
        <script src="{{ asset('plugins/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-datatables-editable/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
        <script src="{{ asset('plugins/tiny-editable/mindmup-editabletable.js') }}"></script>
        <script src="{{ asset('plugins/tiny-editable/numeric-input-example.js') }}"></script>
        <script src="{{ asset('pages/datatables.editable.init.js') }}"></script>

        <!-- Application Ajax-->
        <script src="{{ asset('js/ajax.js') }}"></script>

        <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>
    </body>
</html>