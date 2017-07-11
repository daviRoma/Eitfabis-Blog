<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>24CinL | Error</title>

    <!-- Bootstrap -->
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="templates/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="templates/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="templates/plugins/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="col-md-12">
                <div class="col-middle">
                    {if isset($number_403)}
                        <div class="text-center text-center">
                            <h1 class="error-number">403</h1>
                            <h2>Access denied</h2>
                            <p>Full authentication is required to access this resource.</p>
                            <p>{$number_403}</p>
                            <div class="mid_center">
                                <h3 class="fa fa-ban" style="font-size:60px;"></h3>
                            </div>
                        </div>
                    {/if}
                    {if isset($number_404)}
                        <div class="text-center text-center">
                            <h1 class="error-number">404</h1>
                            <h2>Sorry but we couldn't find this page</h2>
                            <p>This page you are looking for does not exist.</p>
                            <p>{$number_404}</p>
                            <div class="mid_center">
                                <h3 class="fa fa-exclamation-triangle" style="font-size:60px;"></h3>
                            </div>
                        </div>
                    {/if}
                    {if isset($number_500)}
                        <div class="text-center">
                            <h1 class="error-number">500</h1>
                            <h2>Internal Server Error</h2>
                            <p>We track these errors automatically, but if the problem persists feel free to contact us. In the meantime, try refreshing.</p>
                            <p>{$number_500}</p>
                            <div class="mid_center">
                                <h3 class="fa fa-wrench" style="font-size:60px;"></h3>
                            </div>
                        </div>
                    {/if}
                    {if isset($number_400)}
                        <div class="text-center">
                            <h1 class="error-number">400</h1>
                            <h2>Invalid request</h2>
                            <p>{$number_400}</p>
                            <div class="mid_center">
                                <h3 class="fa fa-warning" style="font-size:60px;"></h3>
                            </div>
                        </div>
                    {/if}
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="templates/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="templates/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="templates/plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="templates/plugins/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="templates/plugins/build/js/custom.min.js"></script>
</body>
</html>
