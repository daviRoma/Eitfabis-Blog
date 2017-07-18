<?php
/* Smarty version 3.1.30, created on 2017-07-18 18:05:10
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/draft_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596e31b6bc1c76_64420842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a83d567eacbbbb3a6a1b4ade9244652a8bbfed57' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/draft_list.tpl',
      1 => 1498687408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596e31b6bc1c76_64420842 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Draft List -->
<div id="draft_list" class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Select draft<small>Choose the draft you want to complete</small> </h2>
                <h2 id="error_field" class="pull-right"><small class="error-field"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <?php if (isset($_smarty_tpl->tpl_vars['nocontent']->value)) {?>
                        <div class="col-md-4">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4><?php echo $_smarty_tpl->tpl_vars['nocontent']->value;?>
 &nbsp <i class="fa fa-check"></i></h4>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['drafts']->value, 'draft');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['draft']->value) {
?>
                            <div id="draft_box" name="draftBox">
                                <!-- id -->
                                <div class="col-md-4">
                                    <div class="panel-body">
                                        <div class="x_title">
                                            <h4>Id</h4>
                                        </div>
                                        <input id="get_draft_id" class="set-article-title" value="<?php echo $_smarty_tpl->tpl_vars['draft']->value['id'];?>
" maxlength="24" readonly/>
                                    </div>
                                </div>
                                <!-- date -->
                                <div class="col-md-4">
                                    <div class="panel-body">
                                        <div class="x_title">
                                            <h4>Date</h4>
                                        </div>
                                        <input id="get_draft_date" class="set-article-subtitle" value="<?php echo $_smarty_tpl->tpl_vars['draft']->value['date'];?>
" maxlength="48" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="" style="margin-top:23%;">
                                        <button id="choose_draft" name="chooseDraft" class="btn btn-sm btn-success pull-right" onClick="choose_draft(<?php echo $_smarty_tpl->tpl_vars['draft']->value['id'];?>
)"><i class="fa fa-sign-in"></i> Go</button>
                                        <button id="delete_draft" name="deleteDraft" class="btn btn-sm btn-default pull-right" onclick="delete_draft(<?php echo $_smarty_tpl->tpl_vars['draft']->value['id'];?>
)"><i class="fa fa-trash"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
