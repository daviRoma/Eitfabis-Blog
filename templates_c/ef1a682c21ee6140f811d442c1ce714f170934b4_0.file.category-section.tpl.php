<?php
/* Smarty version 3.1.30, created on 2017-05-03 23:20:44
  from "/Users/Davide/Desktop/Blog/templates/category-section.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590a49acd089f7_27520601',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef1a682c21ee6140f811d442c1ce714f170934b4' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/templates/category-section.tpl',
      1 => 1493846409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590a49acd089f7_27520601 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Category piece -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
    <div class="col-lg-3 col-md-4 col-xs-6">
        <a class="category-box" href="?section=category&name=<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" onClick="go_to_articles(this, event)">
            <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['category']->value['background'];?>
" alt="">
            <span>
                <strong><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</strong>
                <small><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</small>
            </span>
        </a>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }
}
