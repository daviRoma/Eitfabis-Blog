<?php
/* Smarty version 3.1.30, created on 2017-07-24 10:20:29
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/about_us.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5975adcd83ebd5_59093202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3c79bbd8b8ddf663901b422cde46b884bf15932' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/about_us.tpl',
      1 => 1492793943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5975adcd83ebd5_59093202 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Users: brief description -->
<div class="row">
    <div class="col-md-12" style="margin-bottom: 5%;">
        <p>Disappears! It ceases to exist without me. No, you clearly don't know who you're talking to, so let me clue you in.
            I am not in danger, Skyler. I am the danger! A guy opens his door and gets shot and you think that of me? No.
            I am the one who knocks!
        </p>
     </div>
</div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>

    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['list_of_users']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <hr class="user-divider">

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }
}
