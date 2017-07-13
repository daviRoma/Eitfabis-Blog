<?php
/* Smarty version 3.1.30, created on 2017-07-13 17:04:13
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/modalWindow.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59678bed58cd59_16101523',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08a6c8a1d443764a668aa8f1c5c82ac66efd03d3' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/modalWindow.tpl',
      1 => 1493395321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59678bed58cd59_16101523 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Modal window for gallery images -->
<div id="image_modal" class="modal">
    <div class="modal-content">

        <div class="modal-body">
            <input id="temp_key" name="<?php echo $_smarty_tpl->tpl_vars['picture_key']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['picture_key']->value;?>
" type="hidden"/>
            <i id="previous_picture" class="fa fa-chevron-left" onClick="backModalPicture(event)"/>
            <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="" data-toggle="modal" date-target="#image_modal">
            <i id="next_picture" class="fa fa-chevron-right" onClick="nextModalPicture(event)"/>
            <span><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</span> </br>
            <p><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</p>
        </div>

        <div class="modal-footer">
            <span>
                <strong>From:</strong>
                 <a href="article.php?title=<?php echo $_smarty_tpl->tpl_vars['article_title']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['article_id']->value;?>
" alt=""><?php echo $_smarty_tpl->tpl_vars['article_title']->value;?>
</a>
            </span>
        </div>

    </div>
</div>
<?php }
}
