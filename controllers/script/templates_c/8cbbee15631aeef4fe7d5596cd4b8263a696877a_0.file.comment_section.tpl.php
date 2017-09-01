<?php
/* Smarty version 3.1.30, created on 2017-08-30 15:03:30
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/comment_section.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59a6b7a2cbe292_22942601',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8cbbee15631aeef4fe7d5596cd4b8263a696877a' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/comment_section.tpl',
      1 => 1504098165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a6b7a2cbe292_22942601 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Comment body -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?>
    <div id="comment_section" name="a_comment" class="comment-container">
        <div class="comment-field-group">
            <div class="comment-content-name">
                <span id="com_name" type="text" name="name"><?php echo $_smarty_tpl->tpl_vars['comment']->value['name'];?>
</span>
            </div>
            <div class="comment-content-text">
                <p id="c_content" name="content"><?php echo $_smarty_tpl->tpl_vars['comment']->value['content'];?>
</p>
            </div>
            <div class="comment-date">
                <small id="c_date" name="date"><?php echo $_smarty_tpl->tpl_vars['comment']->value['date'];?>
</small>
            </div>
        </div>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <div class="hide-elem" name="scroll_comments">
        <input id="comments_page_limit" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['comments_page_limit']->value;?>
"/>
    </div>
<?php }
}
