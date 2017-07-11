<?php
/* Smarty version 3.1.30, created on 2017-05-02 19:57:47
  from "/Users/Davide/Desktop/Blog/templates/page_navigation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5908c89b2feeb9_44484030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfeaf4140ac4ff1ce93b83cc4856c1466c17b389' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/templates/page_navigation.tpl',
      1 => 1492794355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5908c89b2feeb9_44484030 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Footer: Browse the articles list-->
<ul class="pager">

    <?php if (isset($_smarty_tpl->tpl_vars['subPosition']->value)) {?>
        <input id="subPosition" name="<?php echo $_smarty_tpl->tpl_vars['subPosition']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['subPosition']->value;?>
" type="hidden"/>
    <?php }?>

    <li class="next" id="next_page" onClick="go_next(event);" <?php if (isset($_smarty_tpl->tpl_vars['nextPage_style']->value)) {
echo $_smarty_tpl->tpl_vars['nextPage_style']->value;
}?>>
        <a href="?<?php if (isset($_smarty_tpl->tpl_vars['option']->value)) {
echo $_smarty_tpl->tpl_vars['option']->value;
}?>currentPage=<?php echo $_smarty_tpl->tpl_vars['page_set']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['next']->value;?>
 &nbsp<i class="glyphicon glyphicon-arrow-right"></i></a>
    </li>
    <li class="previous" id="previous_page" onClick="go_back(event);" <?php if (isset($_smarty_tpl->tpl_vars['previousPage_style']->value)) {
echo $_smarty_tpl->tpl_vars['previousPage_style']->value;
}?>>
        <a href="?<?php if (isset($_smarty_tpl->tpl_vars['option']->value)) {
echo $_smarty_tpl->tpl_vars['option']->value;
}?>currentPage=<?php echo $_smarty_tpl->tpl_vars['page_set']->value-1;?>
"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp <?php echo $_smarty_tpl->tpl_vars['back']->value;?>
</a>
    </li>
</ul>

<input type="hidden" name="current_page" value="<?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
" id="current_page"/>

<p class="text-center pager-label"> Page <?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
 of <?php echo $_smarty_tpl->tpl_vars['page_limit']->value;?>
 </p>

<input type="hidden" name="page_limit" value="<?php echo $_smarty_tpl->tpl_vars['page_limit']->value;?>
" id="page_limit"/>
<?php }
}
