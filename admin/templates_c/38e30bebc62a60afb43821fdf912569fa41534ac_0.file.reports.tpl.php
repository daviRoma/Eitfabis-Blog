<?php
/* Smarty version 3.1.30, created on 2017-07-20 22:30:23
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/reports.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597112dfa991d5_28302441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38e30bebc62a60afb43821fdf912569fa41534ac' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/reports.tpl',
      1 => 1497173720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597112dfa991d5_28302441 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- page content -->
<div class="row" id="inbox_container">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inbox<small>Message</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-rigth">
                        <button id="delete_archived" class="btn btn-sm btn-default delete-archived-button" type="button" onClick="delete_archived()"><i class="fa fa-trash"></i> </button>
                    </li>
                    <li class="pull-right">
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="row">
                    <!-- MAIL LIST -->
                    <div id="inbox-list" class="col-sm-3 mail_list_column report-preview-content">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reports']->value, 'report');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['report']->value) {
?>
                            <a id="view_message" href="#" onClick="show_report(event, <?php echo $_smarty_tpl->tpl_vars['report']->value['id'];?>
)" >
                                <div class="mail_list">
                                    <div id="report_archive" name="report_archive" class="left">
                                        <?php if ($_smarty_tpl->tpl_vars['report']->value['flag'] == 0) {?>
                                            <i class="fa fa-circle-o"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-check-circle"></i>
                                        <?php }?>
                                        <input type="hidden" id="report_id_prev" name="report_id_prev" value="<?php echo $_smarty_tpl->tpl_vars['report']->value['id'];?>
"/>
                                    </div>
                                    <div class="right">
                                        <h3 id="report_name_prev"><?php echo $_smarty_tpl->tpl_vars['report']->value['name'];?>
 <small id="report_date_prev"><?php echo $_smarty_tpl->tpl_vars['report']->value['date'];?>
</small></h3>
                                        <p id="report_message_prev"><?php echo $_smarty_tpl->tpl_vars['report']->value['message_preview'];?>
</p>
                                    </div>
                                </div>
                            </a>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </div>
                    <!-- /MAIL LIST -->

                    <!-- CONTENT MAIL -->
                    <div id="report_container" class="col-sm-9 mail_view">
                        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['report_content']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    </div>
                    <!-- /CONTENT MAIL -->
                </div>
                <hr class="inbox-footer-line">
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php }
}
