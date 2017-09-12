<?php
/* Smarty version 3.1.30, created on 2017-09-11 17:49:40
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/tag-section.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59b6b0949c09c7_01609648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4da7f4ab23db14c806d740b8c5d269092ce66577' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/tag-section.tpl',
      1 => 1493931580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59b6b0949c09c7_01609648 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Tag piece -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
?>
    <div class="tag-container">
        <a class="tag-box" href="?section=tag&name=<?php echo $_smarty_tpl->tpl_vars['tag']->value['label'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['tag']->value['label'];?>
" onClick="go_to_articles(this, event)">
            <span class="fa fa-tag">&nbsp
                <?php echo $_smarty_tpl->tpl_vars['tag']->value['label'];?>

            </span></br>
            <i> <?php echo $_smarty_tpl->tpl_vars['tag']->value['description'];?>
 </i>
        </a>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</br>
<div class="col-lg-12">
    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['page_navigation']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

</div>
<?php }
}
