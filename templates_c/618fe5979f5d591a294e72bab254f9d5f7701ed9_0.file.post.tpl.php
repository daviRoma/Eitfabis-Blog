<?php
/* Smarty version 3.1.30, created on 2017-08-05 12:12:01
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/post.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598599f1a75d65_13787291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '618fe5979f5d591a294e72bab254f9d5f7701ed9' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/post.tpl',
      1 => 1501793769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598599f1a75d65_13787291 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Article Content -->
<article>
    <div class="row">
        <div class="hide-elem">
            <input id="article_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
        </div>
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>


        </div>
        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-1">
            <hr class="article-footer-divider">
            <span class="article-footer-desc">
                in
                <a class="category-field-set" href="category-tag.php?section=category&name=<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
">
                    <b><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</b>
                </a>
                tagged by
            </span>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
?>
                <a class="field-tag-set" href="category-tag.php?section=tag&name=<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
">
                    <span> <?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
 </span>
                </a>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <span class="comment-link pull-right">
                <a id="comment_link" href="#" onClick="show_comments(event)"> Show comments <i class="fa fa-comments-o"></i> (<span id="count_comments"><?php echo $_smarty_tpl->tpl_vars['num_comments']->value;?>
</span>) </a>
                <input id="number_of_comments" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['num_comments']->value;?>
"/>
            </span>
        </div>
    </div>
    </br>

</article>
<?php }
}
