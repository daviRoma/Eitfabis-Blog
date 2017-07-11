<?php
/* Smarty version 3.1.30, created on 2017-06-27 00:48:15
  from "/Users/Davide/Desktop/Blog/admin/templates/manageArticle.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59518f2fc065e3_97703802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ab33b730d64ea0ae417fa790dd03ab0228ae966' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/admin/templates/manageArticle.tpl',
      1 => 1498516791,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59518f2fc065e3_97703802 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Article management -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add new tags<small>Set label and brief description</small></h2>
                <h2 id="error_field" class="pull-right"><small id="aa" class="error-field"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="select-menu-flat">
                    <select id="tags_number">
                        <option value="1">1 tags</option>
                        <option value="2">2 tags</option>
                        <option value="3">3 tags</option>
                        <option value="4">4 tags</option>
                        <option value="5">5 tags</option>
                    </select>
                </div>

                <form id="addTag-form" enctype="multipart/form-data" action="controllers/tag_service.php" method="POST">
                    <div class="row">
                        <div id="tag_box" name="tagBox">
                            <input type="hidden" name="tagsNumber" value="1"/>
                            <!-- Label_1 -->
                            <div id="tag_label_1" class="col-md-6">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Label</h4>
                                    </div>
                                    <input id="set_tag_label" class="set-article-title" name="setTagLabel_1" maxlength="24" required="Mandatory field"></input>
                                </div>
                            </div>
                            <!-- Brief Description_1 -->
                            <div id="tag_description_1" class="col-md-6">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Brief-Description</h4>
                                    </div>
                                    <input id="set_tag_description" class="set-article-subtitle" name="setTagDescription_1" maxlength="255" required="Mandatory field"></input>
                                </div>
                            </div>
                        </div>

                        <!-- Add button -->
                        <div class="col-md-12">
                            <hr class="x-content-footer-line">
                            <div class="panel-body">
                                <button id="add-new-tag" name="addNewTags" class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="x_panel" style="height:680px;">
            <div class="x_title">
                <h2>Manage dataTable<small>List of tags</small> </h2>
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
                        The undo button allows you to turn back and restore the original rows.
                    </span></br>
                    <span style="padding-left:5px; padding-bottom:5px;">
                        <u>NOTE 2</u>:
                        Deleting a tag, will be deleted all linking with category and articles that cannot be restored with the undo operation.
                    </span>
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
