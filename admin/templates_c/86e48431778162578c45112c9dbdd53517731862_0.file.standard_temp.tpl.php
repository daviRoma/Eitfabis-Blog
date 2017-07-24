<?php
/* Smarty version 3.1.30, created on 2017-07-24 09:22:55
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/standard_temp.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5975a04f2d7073_14801390',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86e48431778162578c45112c9dbdd53517731862' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/standard_temp.tpl',
      1 => 1499950696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5975a04f2d7073_14801390 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Invoice Design <small>Sample user invoice design</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12 invoice-header">
                            <h1>
                                <i class="fa fa-globe"></i> Invoice.
                                <small class="pull-right">Date: 16/08/2016</small>
                            </h1>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Iron Admin, Inc.</strong>
                                <br>795 Freedom Ave, Suite 600
                                <br>New York, CA 94107
                                <br>Phone: 1 (804) 123-9876
                                <br>Email: ironadmin.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>John Doe</strong>
                                <br>795 Freedom Ave, Suite 600
                                <br>New York, CA 94107
                                <br>Phone: 1 (804) 123-9876
                                <br>Email: jon@ironadmin.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b>
                            <br>
                            <br>
                            <b>Order ID:</b> 4F3S8J
                            <br>
                            <b>Payment Due:</b> 2/22/2014
                            <br>
                            <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>

            <div class="x_content">
                <div class="row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['admins']->value, 'admin');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['admin']->value) {
?>
                    <div class="col-md-5 col-sm-5 col-xs-12 profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h4 class="brief"><i>Administrator</i></h4>
                                <div class="left col-xs-7">
                                    <h2><?php echo $_smarty_tpl->tpl_vars['admin']->value['username'];?>
</h2>
                                    <p><strong class="fa fa-map-marker"></strong> &nbsp <?php echo $_smarty_tpl->tpl_vars['admin']->value['country'];?>
 </p>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-briefcase"></i>&nbsp <?php echo $_smarty_tpl->tpl_vars['admin']->value['employment'];?>
</li>
                                        <li><i class="fa fa-envelope"></i>&nbsp <?php echo $_smarty_tpl->tpl_vars['admin']->value['email'];?>
</li>
                                    </ul>
                                </div>
                                <div class="right col-xs-5 text-center">
                                    <img src="../<?php echo $_smarty_tpl->tpl_vars['admin']->value['img_address'];?>
" alt="" class="img-circle img-responsive">
                                </div>
                            </div>
                            <div class="col-xs-12 bottom text-center">
                            </div>
                        </div>
                    </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
