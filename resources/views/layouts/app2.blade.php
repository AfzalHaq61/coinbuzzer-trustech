<!doctype html>
<html class="fixed sidebar-light">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Dashboard | Beyond</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- vendor2 CSS -->
    <link rel="stylesheet" type="text/css"  href="{{ url('vendor2/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ url('vendor2/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ url('vendor2/font-awesome/css/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" href="{{ url('vendor2/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ url('vendor2/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />
    <link href="{{ url('vendor2/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">


    <!-- Specific Page vendor2 CSS -->
    <link rel="stylesheet" href="{{ url('vendor2/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ url('vendor2/jquery-ui/jquery-ui.theme.css') }}" />
    <link rel="stylesheet" href="{{ url('vendor2/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
    <link rel="stylesheet" href="{{ url('vendor2/morris/morris.css') }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ url('css2/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ url('css2/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ url('css2/custom.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css') }}">
    <!-- Head Libs -->
    <script src="{{ url('vendor2/modernizr/modernizr.js') }}"></script>
    <style>



        .languagepicker {
            background-color: #FFF;
            display: inline-block;
            padding: 0;
            height: 40px;
            overflow: hidden;
            transition: all .3s ease;
            margin: 0 50px 10px 0;
            vertical-align: top;
            float: left;
        }

        .languagepicker:hover {
            /* don't forget the 1px border */
            height: 81px;
        }

        .languagepicker a{
            color: #000;
            text-decoration: none;
        }

        .languagepicker li {
            display: block;
            padding: 0px 20px;
            line-height: 40px;
            border-top: 1px solid #EEE;
        }

        .languagepicker li:hover{
            background-color: #EEE;
        }

        .languagepicker a:first-child li {
            border: none;
            background: #FFF !important;
        }

        .languagepicker li img {
            margin-right: 5px;
        }

        .roundborders {
            border-radius: 5px;
        }

        .large:hover {
            /*
            don't forget the 1px border!
            The first language is 40px heigh,
            the others are 41px
            */
            height: 155px;
        }
    </style>
</head>
<body class="loading-overlay-showing" data-loading-overlay>
<div class="loading-overlay" id="loading">
    <div class="bounce-loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="#" class="logo">
            </a>
            <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->

        <div class="header-right">



            <span class="separator"></span>



            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="{{ url('img/!logged-user.jpg')}}" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name">{{ Auth::user()->name }}</span>
                        <span class="role">{{ Auth::user()->user_type }}</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled mb-2">
                        <li class="divider"></li>

                        <li>
                            <a role="menuitem" tabindex="-1"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">

                        <ul class="nav nav-main">


                                <li>
                                    <a class="nav-link" href="{{ URL::to('/dashboard') }}">
                                        <i class="fas fa-home" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>



                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                                    <span>Coins</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('view-coins') }}">
                                           View Coins
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-users" aria-hidden="true"></i>
                                    <span>Users</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('view-users') }}">
                                            View Users
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-book" aria-hidden="true"></i>
                                    <span>Update Requests</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('update-requests') }}">
                                           View Update Requeats
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-address-card" aria-hidden="true"></i>
                                    <span>Advertisements</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('place-an-ad') }}">
                                            Place an ad
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                    <span>Users Watchlist</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('users-watchlist') }}">
                                            View User Watchlists
                                        </a>
                                    </li>


                                </ul>
                            </li>


                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-cog" aria-hidden="true"></i>
                                    <span>Settings</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('setting/' . 1 . '/edit') }}">
                                            View Settings
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                    </nav>






                </div>

                <script>
                    // Maintain Scroll Position
                    if (typeof localStorage !== 'undefined') {
                        if (localStorage.getItem('sidebar-left-position') !== null) {
                            var initialPosition = localStorage.getItem('sidebar-left-position'),
                                sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                            sidebarLeft.scrollTop = initialPosition;
                        }
                    }
                </script>


            </div>

        </aside>
        <!-- end: sidebar -->
        @yield('content')


    </div>



</section>

<!-- vendor2 -->
<script src="{{ url('vendor2/jquery/jquery.js') }}"></script>
<script src="{{ url('vendor2/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
<script src="{{ url('vendor2/popper/umd/popper.min.js') }}"></script>
<script src="{{ url('vendor2/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ url('vendor2/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('vendor2/common/common.js') }}"></script>
<script src="{{ url('vendor2/nanoscroller/nanoscroller.js') }}"></script>
<script src="{{ url('vendor2/magnific-popup/jquery.magnific-popup.js') }}"></script>
<script src="{{ url('vendor2/jquery-placeholder/jquery-placeholder.js') }}"></script>

<!-- Specific Page vendor2 -->
<script src="{{ url('vendor2/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ url('vendor2/jqueryui-touch-punch/jqueryui-touch-punch.js') }}"></script>
<script src="{{ url('vendor2/jquery-appear/jquery-appear.js') }}"></script>
<script src="{{ url('vendor2/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ url('vendor2/jquery.easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ url('vendor2/flot/jquery.flot.js') }}"></script>
<script src="{{ url('vendor2/flot.tooltip/flot.tooltip.js') }}"></script>
<script src="{{ url('vendor2/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ url('vendor2/flot/jquery.flot.categories.js') }}"></script>
<script src="{{ url('vendor2/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ url('vendor2/jquery-sparkline/jquery-sparkline.js') }}"></script>
<script src="{{ url('vendor2/raphael/raphael.js') }}"></script>
<script src="{{ url('vendor2/morris/morris.js') }}"></script>
<script src="{{ url('vendor2/gauge/gauge.js') }}"></script>
<script src="{{ url('vendor2/snap.svg/snap.svg.js') }}"></script>
<script src="{{ url('vendor2/liquid-meter/liquid.meter.js') }}"></script>
<script src="{{ url('vendor2/jqvmap/jquery.vmap.js') }}"></script>
<script src="{{ url('vendor2/jqvmap/data/jquery.vmap.sampledata.js') }}"></script>
<script src="{{ url('vendor2/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ url('vendor2/jqvmap/maps/continents/jquery.vmap.africa.js') }}"></script>
<script src="{{ url('vendor2/jqvmap/maps/continents/jquery.vmap.asia.js') }}"></script>
<script src="{{ url('vendor2/jqvmap/maps/continents/jquery.vmap.australia.js') }}"></script>
<script src="{{ url('vendor2/jqvmap/maps/continents/jquery.vmap.europe.js') }}"></script>
<script src="{{ url('vendor2/jqvmap/maps/continents/jquery.vmap.north-america.js') }}"></script>
<script src="{{ url('vendor2/jqvmap/maps/continents/jquery.vmap.south-america.js') }}"></script>
<script src="{{ url('vendor2/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ url('vendor2/sweetalert2/sweet-alert.init.js') }}"></script>
<script src="{{ url('vendor2/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ url('vendor2/select2/js/select2.js') }}"></script>
<script src="{{ url('js2/examples/examples.modals.js') }}"></script>









<!-- Theme Base, Components and Settings -->
<script src="{{ url('js2/theme.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ url('js2/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ url('js2/theme.init.js') }}"></script>

<!-- Examples -->
<script src="{{ url('js2/examples/examples.dashboard.js') }}"></script>
@yield('scripts')

</body>
</html>
