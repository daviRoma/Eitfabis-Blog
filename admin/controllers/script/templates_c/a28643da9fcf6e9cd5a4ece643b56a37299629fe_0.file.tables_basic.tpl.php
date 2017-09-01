<?php
/* Smarty version 3.1.30, created on 2017-08-08 10:27:46
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/tables_basic.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59897602736b02_75051062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a28643da9fcf6e9cd5a4ece643b56a37299629fe' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/tables_basic.tpl',
      1 => 1502180667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59897602736b02_75051062 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Basic Tables design -->
<table id="table_basic" class="table table-striped">
    <thead>
        <tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['heads']->value, 'head');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['head']->value) {
?>
                <th><?php echo $_smarty_tpl->tpl_vars['head']->value;?>
</th>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <th>Delete</th>
        </tr>
    </thead>

    <?php if (isset($_smarty_tpl->tpl_vars['basic_rows']->value)) {?>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['basic_rows']->value, 'basic_row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['basic_row']->value) {
?>
                <tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['basic_row']->value, 'basic_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['basic_value']->key => $_smarty_tpl->tpl_vars['basic_value']->value) {
$__foreach_basic_value_2_saved = $_smarty_tpl->tpl_vars['basic_value'];
?>
                        <td id="<?php echo $_smarty_tpl->tpl_vars['basic_value']->key;?>
" name="data_basic_row"
                            <?php if ($_smarty_tpl->tpl_vars['basic_value']->key == 'id') {?> style="padding-top:12px;width:20px;"<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['basic_value']->key == 'date') {?> style="padding-top:13px;width:15%;"<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['basic_value']->key == 'name') {?> style="padding-top:12px;width:10%;"<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['basic_value']->key == 'content') {?> style="padding-top:12px;width:60%;"<?php }?>>
                            <?php echo $_smarty_tpl->tpl_vars['basic_value']->value;?>

                        </td>
                    <?php
$_smarty_tpl->tpl_vars['basic_value'] = $__foreach_basic_value_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <td>
                        <span class="table-basic-button" name="delete_button" onClick="delete_row(<?php echo $_smarty_tpl->tpl_vars['basic_row']->value['id'];?>
)"><i id="delete" class="fa fa-trash" title="Delete"></i></span>
                    </td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
    <?php }?>
</table>

<?php if (isset($_smarty_tpl->tpl_vars['empty_rows']->value)) {?>
    <div class="no-comments-present active-elem">
        <p> <?php echo $_smarty_tpl->tpl_vars['empty_rows']->value;?>
 </p>
    </div>
<?php }
}
}
