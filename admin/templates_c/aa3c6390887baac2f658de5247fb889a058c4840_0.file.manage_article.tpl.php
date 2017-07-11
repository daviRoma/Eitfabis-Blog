<?php
/* Smarty version 3.1.30, created on 2017-06-29 18:51:31
  from "/Users/Davide/Desktop/Blog/admin/templates/manage_article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59553013cfa237_05890488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa3c6390887baac2f658de5247fb889a058c4840' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/admin/templates/manage_article.tpl',
      1 => 1498753681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59553013cfa237_05890488 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Article management -->
<div class="row">
    <div class="col-md-12">

        <div class="x_panel" >
            <div class="x_title">
                <h2>Manage dataTable<small>List of articles</small> </h2>
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
                        <u>NOTE 1</u>:
                        The undo button is disable in this section.
                    </span></br>
                    <span style="padding-left:5px; padding-bottom:5px;">
                        <u>NOTE 2</u>:
                        Deleting an article, will be deleted all linking with category and tags that cannot be restored with the undo operation.
                    </span>
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
