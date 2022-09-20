<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->

<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Metro Admin Template - Metro UI Style Bootstrap Admin Template</title>
    <meta name="description" content="Metro Admin Template.">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{ asset('adminAssets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAssets/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link id="base-style" href="{{ asset('adminAssets/css/style.css') }}" rel="stylesheet">
    <link id="base-style-responsive" href="{{ asset('adminAssets/css/style-responsive.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->

    <!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->




</head>

<body>
    <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="index.html"><span><img src="images/brand logo.PNG" alt="brand image"></span></a>

                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">
                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i>

                                {{ Session::get('name')}}

                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">
                                    <span>Account Settings</span>
                                </li>
                                <!-- <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li> -->
                                <li><a href="{{ url('/logout') }}"><i class="halflings-icon off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->

            </div>
        </div>
    </div>
    <!-- start: Header -->

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="{{ URL::to('/dashboard') }}"><i class="icon-bar-chart"></i><span class="hidden-tablet">
                                    Dashboard</span></a></li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Category</a>
                            <ul>
                                <li><a class="submenu" href="{{ URL::to('/addcategory') }}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Category</span></a></li>
                                <li><a class="submenu" href="{{ URL::to('/allcategory') }}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Category</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Products</span></a>
                            <ul>
                                <li><a class="submenu" href="{{ URL::to('/addproduct') }}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Products</span></a></li>
                                <li><a class="submenu" href="{{ URL::to('/allproduct') }}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Products</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Slider</span></a>
                            <ul>
                                <li><a class="submenu" href="addSlider.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Slider</span></a></li>
                                <li><a class="submenu" href="allSlider.html"><i class="icon-file-alt"></i><span class="hidden-tablet">All Slider</span></a></li>
                            </ul>
                        </li>
                        <li><a href="manageOrder.html"><i class="icon-folder-open"></i><span class="hidden-tablet">
                                    Manage Order</span></a></li>


                    </ul>
                </div>
            </div>
            <div id="content" class="span10">

                @yield('adminContent')

                @yield('addCategory')

                @yield('allCategory')

                @yield('updateCategory')

                @yield('addProducts')

                @yield('allProducts')

                @yield('updateProduct')

            </div>
        </div>
    </div>


    <footer>

        <p>
            <span style="text-align:left;float:left ">&copy; 2019 all rights reserved <a href=" " alt="Bootstrap Themes ">minibazarbd.com</a></span>
            <span class="hidden-phone " style="text-align:right;float:right ">Powered by: <a href="http://admintemplates.co/ " alt="Bootstrap Admin Templates ">Mishel</a></span>
        </p>

    </footer>

    <!-- start: JavaScript-->

    <script src="{{ asset('adminAssets/js/jquery-1.9.1.min.js') }} "></script>
    <script src="{{ asset('adminAssets/js/jquery-migrate-1.0.0.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery-ui-1.10.0.custom.min.js ') }}"></script>

    <script src="{{ asset('adminAssets/js/jquery.ui.touch-punch.js') }} "></script>

    <script src="{{ asset('adminAssets/js/modernizr.js') }} "></script>

    <script src="{{ asset('adminAssets/js/bootstrap.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.cookie.js') }} "></script>

    <script src="{{ asset('adminAssets/js/fullcalendar.min.js') }}"></script>

    <script src="{{ asset('adminAssets/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('adminAssets/js/excanvas.js') }} "></script>
    <script src="{{ asset('adminAssets/js/jquery.flot.js') }} "></script>
    <script src="{{ asset('adminAssets/js/jquery.flot.pie.js') }} "></script>
    <script src="{{ asset('adminAssets/js/jquery.flot.stack.js') }} "></script>
    <script src="{{ asset('adminAssets/js/jquery.flot.resize.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.chosen.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.uniform.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.cleditor.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.noty.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.elfinder.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.raty.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.iphone.toggle.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.uploadify-3.1.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.gritter.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.imagesloaded.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.masonry.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.knob.modified.js') }} "></script>

    <script src="{{ asset('adminAssets/js/jquery.sparkline.min.js') }} "></script>

    <script src="{{ asset('adminAssets/js/counter.js') }} "></script>

    <script src="{{ asset('adminAssets/js/retina.js') }} "></script>

    <script src="{{ asset('adminAssets/js/custom.js') }} "></script>
    <!-- end: JavaScript-->

</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:47 GMT -->

</html>