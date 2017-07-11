<?php
/* Smarty version 3.1.30, created on 2017-04-23 17:12:12
  from "/Users/Davide/Desktop/Blog/templates/home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fcc44c490bc1_30388486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6673242bdc37ea6254b1202f37d299cad85aa48a' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/templates/home.tpl',
      1 => 1492794236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fcc44c490bc1_30388486 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Main content: Home page that contains the articles list -->
<div class="row" id="articles" <?php if (isset($_smarty_tpl->tpl_vars['home_style']->value)) {
echo $_smarty_tpl->tpl_vars['home_style']->value;
}?>>
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['list_of_articles']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <hr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['page_navigation']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    </div>
</div>
<?php }
}
