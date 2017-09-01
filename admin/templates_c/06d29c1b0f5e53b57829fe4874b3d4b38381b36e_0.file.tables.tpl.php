<?php
/* Smarty version 3.1.30, created on 2017-08-04 15:36:41
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/tables.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5984786938cfe8_03435475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06d29c1b0f5e53b57829fe4874b3d4b38381b36e' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/tables.tpl',
      1 => 1501169178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5984786938cfe8_03435475 (Smarty_Internal_Template $_smarty_tpl) {
?>

<table class="table table-striped jambo_table bulk_action">
    <thead>
        <tr id="table_head" class="headings">
            <th>
                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" name="select_allCheckbox" style="position: relative;" onClick="selected_allCheckbox(this)">
                    <input type="checkbox" id="check-all" class="table-checkbox">
                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0; background-position: initial initial; background-repeat: initial initial;"></ins>
                </div>
            </th>
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

            <th class="column-title">Operations</th>
            <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Selected Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
            </th>
        </tr>
    </thead>
    <tbody id="data_table-body">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
            <tr class="even pointer" id="data_row" name="data_row" role="row">
                <td class="a-center " name="table_td-checkbox">
                    <div class="icheckbox_flat-green" style="position: relative;" name="data_check" onClick="selected_checkbox(this)">
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
$__foreach_value_2_saved = $_smarty_tpl->tpl_vars['value'];
?>
                    <td id="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
" class=" " name="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->key == 'id') {?> style="width:7%; margin-right:5px;"<?php }?> <?php if ($_smarty_tpl->tpl_vars['value']->key == 'backup' || $_smarty_tpl->tpl_vars['value']->key == 'gallery') {?> style="width:7%; padding-left:27px;"<?php }?> <?php if ($_smarty_tpl->tpl_vars['value']->key == 'folder') {?> style="width:7%; padding-left:10px;"<?php }?> <?php if ($_smarty_tpl->tpl_vars['value']->key == 'description') {?> style="width:60%; padding-left:5px; padding-right:20px;"<?php }?>>
                        <input id="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
" class="table_td-input" name="table_input-field" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" readonly="readonly"/>
                    </td>
                <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <td class="table-operation" name="table_operation">
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
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table>
<div class="col-md-4">
    <div class="table_count-entries">
        <span name="show-entries">Showing entries</span>
    </div>
</div>
<div class="col-md-4 pull-right">
    <ul class="table_pagination">
        <li class="paginate_button-previous"><button type="button" id="previous_button" onClick="previous_dataRows()">Previous</button></li>
        <li class="paginate_button-page" id="currentPage" value="1" onClick="reload_pageTable()"> 1 </li>
        <li class="paginate_button-next"> <button type="button" id="next_button" onClick="next_dataRows()">Next</button></li>
    </ul>
    <input type="hidden" id="starting_row" value="0"/>
    <input type="hidden" id="total_pageTable" value="<?php echo $_smarty_tpl->tpl_vars['total_pageTable']->value;?>
"/>
</div>
<?php }
}
