<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>24CinL | Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/css/24CinL-blog.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="templates/css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a id="page_url" class="navbar-brand" href="{$reload_position}">{$position}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="category-tag.php?section=category">Category & Tag</a>
                    </li>
                    <li>
                        <a href="search.php">Search</a>
                    </li>
                    <li>
                        <a href="gallery.php">Gallery</a>
                    </li>
                    <li>
                        <a href="about_us.php">About us</a>
                    </li>
                    <li>
                        <a href="contact_us.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('{$background}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {if !stristr($page,'post.tpl')}
                        <div class="site-heading">
                            <h1>{$page_title}</h1>
                            <hr class="small">
                            <span class="subheading">{$page_subtitle}</span>
                        </div>
                    {else}
                        <div class="post-heading text-center">
                            <h1>{$title}</h1>
                            <h2 class="subheading">{$subtitle}</h2>
                            <span class="meta">Posted by <a href="about_us.php">{$author}</a> on {$date}</span>
                        </div>

                    {/if}
                </div>
            </div>
        </div>
    </header>


    <div class="container" id="page_content">

        {include file = "$page"}

    </div>


    <!-- Footer -->
    <hr style="margin-top: 3%;">

    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-mailchimp">
                    <div class="container text-center">
                        <h2>Want more from 24CinL?</h2>
                        <h5>Subscribe to our mailing list to receive an update when new items arrive!</h5>
                        <div class="col-md-6 col-md-offset-3">
                            <form id="subscribe_validate" name="subscribe" action="controllers/subscribe_service.php" method="POST">
                                <div class="input-group input-group-lg">
                                    <input id="email" type="email" name="email" class="form-control" placeholder="Email address...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="subscribe" class="btn btn-primary">Subscribe!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                </br>

                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; 24CinL Teamwork 2014</p>
                    </br>
                    {if isset($error)}
                        <p class="copyright text-muted" style="color:#e60000">{$error}</p>
                    {/if}
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="templates/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="templates/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="templates/js/jqBootstrapValidation.js"></script>
    <script src="templates/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="templates/js/clean-blog.min.js"></script>

    <!-- 24CinL ajax functions -->
    <script src="templates/jquery/24CinL-ajax.js"></script>
    <!-- 24CinL javascript -->
    <script src="templates/js/24CinL-blog.js"></script>

</body>

</html>
