<?php
/* Smarty version 3.1.30, created on 2017-07-18 16:41:02
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/gallery.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596e1dfe8e6d20_44229231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c468584f6f47b3f048eaa97b4768421e0b8cab21' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/gallery.tpl',
      1 => 1498919421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596e1dfe8e6d20_44229231 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Tags management -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel" style="height:680px;">
            <div class="x_title">
                <h2>Manage dataTable<small>List of upload pictures</small> </h2>
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
                    <span style="padding-left:5px; padding-bottom:5px;">
                        <u>NOTE</u>:
                        Undo operation not allowed in this section.
                    </span></br>
                </div>
                <div class="col-md-12">
                    <hr class="subscribers-footer-line">
                    <button id="undo" class="btn btn-sm btn-default" type="button" onClick="restore_row(event)" disabled><i class="fa fa-undo"></i> Undo</button>
                    <button id="delete_selected" class="btn btn-sm btn-default" type="button" onClick="delete_selected(event)"><i class="fa fa-trash"></i> Delete</button>
                    <button id="add" class="btn btn-sm btn-success" type="button" onClick="addModal(event)" disabled><i class="fa fa-plus"></i> Add</button>
                    <button id="save" class="btn btn-sm btn-success pull-right" type="button" onClick="save_changes(event)"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
