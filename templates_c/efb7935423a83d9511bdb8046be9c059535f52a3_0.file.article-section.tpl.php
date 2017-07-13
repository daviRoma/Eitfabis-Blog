<?php
/* Smarty version 3.1.30, created on 2017-07-13 13:49:53
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/article-section.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59675e6133bed5_25775250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efb7935423a83d9511bdb8046be9c059535f52a3' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/article-section.tpl',
      1 => 1493413523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59675e6133bed5_25775250 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Article piece -->
<div class="post-preview">
    <a href="article.php?title=<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
        <h2 class="post-title">
            <?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>

        </h2>
        <h3 class="post-subtitle">
            <?php echo $_smarty_tpl->tpl_vars['article']->value['subtitle'];?>

        </h3>
    </a>
    <span class="post-meta">Posted by <a href="about_us.php"><?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
</a> on <?php echo $_smarty_tpl->tpl_vars['article']->value['date'];?>
 - in</span>

    <span class="in-line">
        <a class="category-field-set" href="category-tag.php?section=category&name=<?php echo $_smarty_tpl->tpl_vars['article']->value['category'];?>
"> <b> <?php echo $_smarty_tpl->tpl_vars['article']->value['category'];?>
 </b> </a>
    </span>
    </br>
    <div class="tag-divider in-line">
        <?php if (isset($_smarty_tpl->tpl_vars['article']->value['tags'])) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value['tags'], 'tag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
?>
                <a class="field-tag-set" href="category-tag.php?section=tag&name=<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
">
                    <span > <?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
 </span>
                </a>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>
    </div>
</div>
<?php }
}
