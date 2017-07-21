<?php
/* Smarty version 3.1.30, created on 2017-07-20 22:23:03
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/notice-message.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59711127560e46_47395704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '141100aa4a2e048085d0a2df3a86923bf122f205' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/notice-message.tpl',
      1 => 1491916698,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59711127560e46_47395704 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Message: Error -->
<div id="error" class="col-lg-12 col-md-12 col-xs-12" <?php if (!isset($_smarty_tpl->tpl_vars['error_message']->value)) {?>style="display:none;"<?php }?>>
    <div class="error-label text-center">
        <strong class="fa fa-times"> Error! </strong>
        <span id="error_message"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</span>
        <hr>
    </div>
</div>

<!-- Message: Success -->
<div id="success" class="col-lg-12 col-md-12 col-xs-12" <?php if (!isset($_smarty_tpl->tpl_vars['success_message']->value)) {?>style="display:none;"<?php }?>>
    <div class="success-label text-center">
        <strong class="fa fa-check"> Success! </strong>
        <span id="success_message"><?php echo $_smarty_tpl->tpl_vars['success_message']->value;?>
</span>
        <hr>
    </div>
</div>
<?php }
}
