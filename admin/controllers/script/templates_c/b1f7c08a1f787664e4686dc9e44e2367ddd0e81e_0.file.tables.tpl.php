<?php
/* Smarty version 3.1.30, created on 2017-05-20 15:24:46
  from "/Users/Davide/Desktop/Blog/admin/templates/tables.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5920439e9bcca5_49465224',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1f7c08a1f787664e4686dc9e44e2367ddd0e81e' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/admin/templates/tables.tpl',
      1 => 1495283128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5920439e9bcca5_49465224 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Database table -->
<div class="col-md-4" style="margin-left:-10px;">
    <div class="table_desc">
        <span>Manage the data taken from the DB.</span>
    </div>
</div>
<div class="col-md-4 pull-right" style="margin-right:-10px;">
    <div class="table_filter">
        <input type="search" class="form-control" placeholder="Search"></input>
    </div>
</div>
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
                <td class="a-center ">
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
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</td>
                <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <td class="table-operation">
                    <a <?php if (!isset($_smarty_tpl->tpl_vars['operation_1']->value)) {?> class="op-not-enable" <?php }?> href="#" onclick="select_operation(event, <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)">
                        <i id="delete" class="fa fa-trash" title="Delete"></i>
                    </a>
                    <a <?php if (!isset($_smarty_tpl->tpl_vars['operation_2']->value)) {?> class="op-not-enable" <?php }?> href="#" onclick="select_operation(event, <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)" >
                        <i id="edit" class="fa fa-pencil" title="Edit"></i>
                    </a>
                    <a <?php if (!isset($_smarty_tpl->tpl_vars['operation_3']->value)) {?> class="op-not-enable" <?php }?> href="#" onclick="select_operation(event, <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
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
        <span>Showing entries</span>
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
