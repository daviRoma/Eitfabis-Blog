<?php
/* Smarty version 3.1.30, created on 2017-07-10 16:23:24
  from "/Users/Davide/Desktop/Blog/admin/templates/error_page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59638ddcbdb581_42335659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aaff7f2a0b44494655f10341c2925c6938556fdf' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/admin/templates/error_page.tpl',
      1 => 1499696113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59638ddcbdb581_42335659 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
                    <?php if (isset($_smarty_tpl->tpl_vars['number_403']->value)) {?>
                        <div class="text-center text-center">
                            <h1 class="error-number">403</h1>
                            <h2>Access denied</h2>
                            <p>Full authentication is required to access this resource.</p>
                            <p><?php echo $_smarty_tpl->tpl_vars['number_403']->value;?>
</p>
                            <div class="mid_center">
                                <h3 class="fa fa-ban" style="font-size:60px;"></h3>
                            </div>
                        </div>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['number_404']->value)) {?>
                        <div class="text-center text-center">
                            <h1 class="error-number">404</h1>
                            <h2>Sorry but we couldn't find this page</h2>
                            <p>This page you are looking for does not exist.</p>
                            <p><?php echo $_smarty_tpl->tpl_vars['number_404']->value;?>
</p>
                            <div class="mid_center">
                                <h3 class="fa fa-exclamation-triangle" style="font-size:60px;"></h3>
                            </div>
                        </div>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['number_500']->value)) {?>
                        <div class="text-center">
                            <h1 class="error-number">500</h1>
                            <h2>Internal Server Error</h2>
                            <p>We track these errors automatically, but if the problem persists feel free to contact us. In the meantime, try refreshing.</p>
                            <p><?php echo $_smarty_tpl->tpl_vars['number_500']->value;?>
</p>
                            <div class="mid_center">
                                <h3 class="fa fa-wrench" style="font-size:60px;"></h3>
                            </div>
                        </div>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['number_400']->value)) {?>
                        <div class="text-center">
                            <h1 class="error-number">400</h1>
                            <h2>Invalid request</h2>
                            <p><?php echo $_smarty_tpl->tpl_vars['number_400']->value;?>
</p>
                            <div class="mid_center">
                                <h3 class="fa fa-warning" style="font-size:60px;"></h3>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="templates/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- Bootstrap -->
    <?php echo '<script'; ?>
 src="templates/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- FastClick -->
    <?php echo '<script'; ?>
 src="templates/plugins/fastclick/lib/fastclick.js"><?php echo '</script'; ?>
>
    <!-- NProgress -->
    <?php echo '<script'; ?>
 src="templates/plugins/nprogress/nprogress.js"><?php echo '</script'; ?>
>
    <!-- Custom Theme Scripts -->
    <?php echo '<script'; ?>
 src="templates/plugins/build/js/custom.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
