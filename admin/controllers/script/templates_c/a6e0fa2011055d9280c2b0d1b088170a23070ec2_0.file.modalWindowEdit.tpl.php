<?php
/* Smarty version 3.1.30, created on 2017-08-08 15:04:36
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/modalWindowEdit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5989b6e4d934d6_88757262',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6e0fa2011055d9280c2b0d1b088170a23070ec2' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/modalWindowEdit.tpl',
      1 => 1502197395,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5989b6e4d934d6_88757262 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Modal window for edit tables row -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <table class="table table-striped jambo_table" name="modalTable">
                <thead>
                    <tr id="table_head" class="headings">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table_head']->value, 'head');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['head']->value) {
?>
                            <th class="column-title" name="column_name"><?php echo $_smarty_tpl->tpl_vars['head']->value;?>
</th>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </tr>
                </thead>
                <tbody name="modalTable-body">
                    <tr class="even pointer" id="data_row" name="data_row" role="row">
                        <td class="a-center " name="table_td-checkbox">
                            <div class="icheckbox_flat-green" name="data_check" onClick="selected_checkbox(this)" style="position:relative;" >
                                <input id="row_check" type="checkbox" class="table-checkbox" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" name="table_records">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0; background-position: initial initial; background-repeat: initial initial;"></ins>
                                <input id="row_index" type="hidden" value="" name="row_index">
                            </div>
                        </td>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$__foreach_value_1_saved = $_smarty_tpl->tpl_vars['value'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['value']->key == 'category' || $_smarty_tpl->tpl_vars['value']->key == 'group') {?>
                                <td id="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
" class=" " name="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
">
                                    <div class="select-menu-modal">
                                        <select id="select_value" name="set_select_value">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['value']->value, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                        </select>
                                        <i id="select_chevron_down" class="fa fa-chevron-down"></i>
                                    </div>
                                </td>
                            <?php } else { ?>
                                <td id="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
" class=" " name="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->key == 'id') {?> style="width:7%; margin-right:5px;"<?php }?>>
                                    <input id="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
" class="table_td-input" name="table_input-field" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->key == 'id' || $_smarty_tpl->tpl_vars['value']->key == 'author') {?> readonly="readonly" <?php }?>/>
                                </td>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <td class="table-operation" name="table_td-operation">
                            <a name="delete_button" <?php if (!isset($_smarty_tpl->tpl_vars['operation_1']->value)) {?> class="op-not-enable" <?php }?> href="#" onclick="select_operation(event, <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)">
                                <i id="delete" class="fa fa-trash" title="Delete"></i>
                            </a>
                            <a name="edit_button" <?php if (!isset($_smarty_tpl->tpl_vars['operation_2']->value)) {?> class="op-not-enable" <?php }?> href="#" onclick="select_operation(event, <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)" >
                                <i id="edit" class="fa fa-pencil" title="Edit"></i>
                            </a>
                            <a name="load_button" <?php if (!isset($_smarty_tpl->tpl_vars['operation_3']->value)) {?> class="op-not-enable" <?php }?> href="#" onclick="select_operation(event, <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)">
                                <i id="load" class="fa fa-play-circle" title="Load"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <hr style="margin-bottom: 13px;">
            <button id="cancel_edit" class="btn btn-sm btn-default" type="button" onclick="exitModal()">Cancel</button>
            <button id="confirm_edit" class="btn btn-sm btn-success" type="button" onclick="select_addORedit(event)">Confirm</button>
        </div>
        <input id=modalOperation type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['operation']->value;?>
" name="modalOperation">
    </div>
</div>
<?php }
}
