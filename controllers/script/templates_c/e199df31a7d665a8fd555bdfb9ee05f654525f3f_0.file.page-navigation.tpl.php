<?php
/* Smarty version 3.1.30, created on 2017-08-30 14:59:25
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/page-navigation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59a6b6adc314e4_33807655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e199df31a7d665a8fd555bdfb9ee05f654525f3f' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/page-navigation.tpl',
      1 => 1501835182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a6b6adc314e4_33807655 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Footer: Browse the articles list, tag list or pictures-->

<?php if (isset($_smarty_tpl->tpl_vars['articles']->value)) {?>
    <ul class="pager">
        <?php if (isset($_smarty_tpl->tpl_vars['subPosition']->value)) {?>
            <input id="subPosition" name="<?php echo $_smarty_tpl->tpl_vars['subPosition']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['subPosition']->value;?>
" type="hidden"/>
        <?php }?>
        <li id="next_page" class="next" <?php if (!$_smarty_tpl->tpl_vars['nextPage_style']->value) {?> style="display:none;" <?php } else { ?> style="display:block;" <?php }?> onClick="go_next(event)">
            <a href="?<?php if (isset($_smarty_tpl->tpl_vars['option']->value)) {
echo $_smarty_tpl->tpl_vars['option']->value;
}?>currentPage=<?php echo $_smarty_tpl->tpl_vars['page_set']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['next']->value;?>
 &nbsp<i class="glyphicon glyphicon-arrow-right"></i></a>
        </li>
        <li id="previous_page" class="previous" <?php if (!$_smarty_tpl->tpl_vars['previousPage_style']->value) {?> style="display:none;" <?php } else { ?> style="display:block;" <?php }?> onClick="go_back(event)">
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
<?php } else { ?>
    <ul class="pager-other">
        <li id="back_page" <?php if (!$_smarty_tpl->tpl_vars['backPage_style']->value) {?> class="next-back-button hide-button" <?php } else { ?> class="next-back-button active-elem" <?php }?> onClick="backPage(event)">
            <a href="?<?php if (isset($_smarty_tpl->tpl_vars['option']->value)) {
echo $_smarty_tpl->tpl_vars['option']->value;
}?>currentPage=<?php echo $_smarty_tpl->tpl_vars['page_set']->value-1;?>
">
                <b>BACK</b>
            </a>
        </li>
        <li>
            <input id="current_page" type="hidden" name="current_page" value="<?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
" />
            <span><?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
 of <?php echo $_smarty_tpl->tpl_vars['page_limit']->value;?>
</span>
        </li>
        <li id="next_page" <?php if (!$_smarty_tpl->tpl_vars['nextPage_style']->value) {?> class="next-back-button hide-button" <?php } else { ?> class="next-back-button active-elem" <?php }?> onClick="nextPage(event)">
            <a href="?<?php if (isset($_smarty_tpl->tpl_vars['option']->value)) {
echo $_smarty_tpl->tpl_vars['option']->value;
}?>currentPage=<?php echo $_smarty_tpl->tpl_vars['page_set']->value+1;?>
">
                <b>NEXT</b>
            </a>
        </li>
    </ul>
<?php }
}
}
