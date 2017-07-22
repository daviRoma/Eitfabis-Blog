<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>24CinL | Admin</title>

    <!-- Bootstrap -->
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="templates/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="templates/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="templates/plugins/iCheck/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="templates/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="templates/plugins/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="templates/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="templates/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="templates/plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="templates/plugins/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="templates/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="templates/plugins/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="templates/plugins/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="templates/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="templates/plugins/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="templates/plugins/starrr/dist/starrr.css" rel="stylesheet">
    <!-- dropzone -->
    <link href="templates/plugins/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="templates/plugins/build/css/custom.min.css" rel="stylesheet">
    <!-- 24CinL custom style -->
    <link href="templates/css/24CinL-admin.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <!-- Sidebar left -->
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><i class="fa fa-cube"></i> <span>&nbsp;24CinL </span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- Menu profile quick info -->
                    <div class="profile clearfix">
                        {if !stristr($page,'standard_temp.tpl')}
                        <div class="profile_pic">
                            <img id="user_picture" src="{$userPicture}" alt="" class="img-circle profile_img">
                        </div>
                        {/if}
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{$username}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    </br>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="index.php"> <i class="fa fa-home"></i> Home </a>
                                </li>
                                <li id="article_li">
                                    <a><i class="fa fa-edit"></i> Articles <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li id="liA1"><a href="articles.php?section=manage">Manage</a></li>
                                        <li id="liA2"><a href="articles.php?section=draft">Draft</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="categories.php"><i class="fa fa-th"></i> Categories</a>
                                </li>
                                <li>
                                    <a href="tags.php"><i class="fa fa-tags"></i> Tags</a>
                                </li>
                                <li>
                                    <a href="files_manager.php"><i class="fa fa-files-o"></i> Files Manager </a>
                                </li>
                                <li>
                                    <a href="reports.php"><i class="fa fa-paper-plane-o"></i>Reports</a>
                                </li>
                                <li>
                                    <a href="newsletter.php"> <i class="fa fa-envelope"></i> Newsletter </a>
                                </li>
                            </ul>
                        </div>

                        <div class="menu_section">
                            <h3>Advanced</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="subscribers.php"> <i class="fa fa-users"></i> Subscribers </a>
                                </li>
                                <li>
                                    <a href="allUsers.php"> <i class="fa fa-user"></i> Users </a>
                                </li>
                                <li>
                                    <a href="blog.php"> <i class="fa fa-desktop"></i> Blog </a>
                                </li>
                                <li>
                                    <a href="uploads.php"> <i class="fa fa-cloud-upload"></i> Uploads </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- Menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="controllers/logout_service.php">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Settings" href="profile.php">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Facebook" href="https://www.facebook.com" target="_blank">
                            <span class="fa fa-facebook" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Twitter" href="https://twitter.com" target="_blank">
                            <span class="fa fa-twitter" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- Navbar top  -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav navbar-nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a id="position" href="#">{$position}</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">
                <div id="page_content" class="">
                    <div class="page-title">
                        <div class="title_left title-set">
                            <h3>{$header_page}</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    {include file = "$page"}

                </div>
            </div>

            <!-- footer content -->
            <footer>
                <div class="pull-right"> 24CinL - Admin panel</div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>

    <!-- jQuery -->
    <script src="templates/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="templates/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="templates/plugins/fastclick/fastclick.js"></script>
    <!-- NProgress -->
    <script src="templates/plugins/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="templates/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Chart.js -->
    <script src="templates/plugins/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="templates/plugins/gauge.js/dist/gauge.min.js"></script>
    <!-- iCheck -->
    <script src="templates/plugins/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="templates/plugins/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="templates/plugins/Flot/jquery.flot.js"></script>
    <script src="templates/plugins/Flot/jquery.flot.pie.js"></script>
    <script src="templates/plugins/Flot/jquery.flot.time.js"></script>
    <script src="templates/plugins/Flot/jquery.flot.stack.js"></script>
    <script src="templates/plugins/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="templates/plugins/Flot/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="templates/plugins/Flot/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="templates/plugins/Flot/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="templates/plugins/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="templates/plugins/jqvmap/dist/jquery.vmap.js"></script>
    <script src="templates/plugins/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="templates/plugins/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="templates/plugins/moment/min/moment.min.js"></script>
    <script src="templates/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="templates/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="templates/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="templates/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="templates/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="templates/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="templates/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="templates/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="templates/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="templates/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="templates/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="templates/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="templates/plugins/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="templates/plugins/jszip/dist/jszip.min.js"></script>
    <script src="templates/plugins/pdfmake/build/pdfmake.min.js"></script>
    <script src="templates/plugins/pdfmake/build/vfs_fonts.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="templates/plugins/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="templates/plugins/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="templates/plugins/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="templates/plugins/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="templates/plugins/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="templates/plugins/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="templates/plugins/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="templates/plugins/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="templates/plugins/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="templates/plugins/starrr/dist/starrr.js"></script>
    <!-- Dropzone.js -->
    <script src="templates/plugins/dropzone/dist/dropzone.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="templates/plugins/build/js/custom.min.js"></script>
    <!-- Team custom script -->
    <script src="templates/js/24CinL-admin.js"></script>
    <script src="templates/jquery/ajax/24CinL-adminDataTables.js"></script>
    <script src="templates/jquery/ajax/24CinL-adminUploads.js"></script>
    <script src="templates/jquery/ajax/24CinL-adminReportAjax.js"></script>
    <script src="templates/jquery/ajax/24CinL-adminNewsletter.js"></script>
    <script src="templates/jquery/ajax/24CinL-adminArticle.js"></script>

</body>
</html>
