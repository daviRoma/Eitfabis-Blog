<?php
/* Smarty version 3.1.30, created on 2017-07-27 21:29:25
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/manage_article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597a3f1502f3f1_74792430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97255eac238396e5a73cd79cafbbeb708078b416' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/manage_article.tpl',
      1 => 1501183762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597a3f1502f3f1_74792430 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <button id="delete_selected" class="btn btn-sm btn-default" type="button" onClick="delete_selected(event)"><i class="fa fa-trash"></i> Delete</button>
                    <button id="view_comments" class="btn btn-sm btn-primary" type="button" onClick="" disabled><i class="fa fa-comments-o"></i> View Comments</button>
                    <button id="save" class="btn btn-sm btn-success pull-right" type="button" onClick="save_changes(event)"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
