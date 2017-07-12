<?php
/* Smarty version 3.1.30, created on 2017-07-13 00:24:39
  from "/Users/Davide/Desktop/Blog/admin/templates/subscribers.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5966a1a77c6020_72452317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d6df57ea62011783ed727e0f447b676d5a96065' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/admin/templates/subscribers.tpl',
      1 => 1496001202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5966a1a77c6020_72452317 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Subscribers List settings -->
<div class="row" id="subscribersList_container">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Subscribed to the newsletter <small>Blog visitors</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" id="table_container">
                <div class="table-responsive">
                    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['tables']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span style="padding-left:5px; padding-bottom:5px;"><u>NOTE</u>: The undo button allows you to turn back and restore the original rows.</span>
                </div>
                <div class="col-md-12">
                    <hr class="subscribers-footer-line">
                    <button id="undo" class="btn btn-sm btn-default" type="button" onClick="restore_row(event)"><i class="fa fa-undo"></i> Undo</button>
                    <button id="delete_selected" class="btn btn-sm btn-default" type="button" onClick="delete_selected(event)"><i class="fa fa-trash"></i> Delete</button>
                    <button id="add" class="btn btn-sm btn-success" type="button" onClick="addModal(event)"><i class="fa fa-plus"></i> Add</button>
                    <button id="save" class="btn btn-sm btn-success pull-right" type="button" onClick="save_changes(event)"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
