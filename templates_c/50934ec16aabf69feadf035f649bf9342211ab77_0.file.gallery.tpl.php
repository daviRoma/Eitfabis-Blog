<?php
/* Smarty version 3.1.30, created on 2017-05-05 16:17:44
  from "/Users/Davide/Desktop/Blog/templates/gallery.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590c89882f54a4_18674669',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50934ec16aabf69feadf035f649bf9342211ab77' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/templates/gallery.tpl',
      1 => 1493993775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590c89882f54a4_18674669 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Main Content: Photo gallery -->
<div class="row" id="gallery_container">

    <div class="col-lg-12 col-md-12 col-xs-12">
        <hr style="margin-top: -15px;">
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="pictures-container">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pictures']->value, 'picture');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['picture']->key => $_smarty_tpl->tpl_vars['picture']->value) {
$__foreach_picture_0_saved = $_smarty_tpl->tpl_vars['picture'];
?>
                <div id="picture" class="picture-box" title="<?php echo $_smarty_tpl->tpl_vars['picture']->value['name'];?>
" data-toggle="tooltip" onClick="showModal(<?php echo $_smarty_tpl->tpl_vars['picture']->key;?>
, event)">
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['picture']->value['image'];?>
" alt="">
                </div>
            <?php
$_smarty_tpl->tpl_vars['picture'] = $__foreach_picture_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    </div>
    </br>
    <div class="col-lg-12" style="margin-left:12px;">
        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['page_navigation']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    </div>
</div>
<?php }
}
