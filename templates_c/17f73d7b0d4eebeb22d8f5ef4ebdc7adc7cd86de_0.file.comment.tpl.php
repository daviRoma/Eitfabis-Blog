<?php
/* Smarty version 3.1.30, created on 2017-07-28 16:50:15
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/comment.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597b4f27023da7_09987944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17f73d7b0d4eebeb22d8f5ef4ebdc7adc7cd86de' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/comment.tpl',
      1 => 1501253400,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597b4f27023da7_09987944 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Comment section -->

<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">

    <div class="comment-container">
        <div id="" class="comment-header">
            <span> Write your comment &nbsp  </span>
            <i id="" class="fa fa-pencil"></i>
        </div>
        <div class="row control-group comment-field-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Name</label>
                <input id="c_name" type="text" name="name" class="form-control form-distance" placeholder="Name"  maxlength="32" autocomplete="off" required style="font-size:18px;"/>
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="row control-group comment-field-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Comment</label>
                <textarea id="" rows="3" name="comment" class="form-control form-distance" placeholder="Comment" autocomplete="off" required style="font-size:18px;"></textarea>
                <p class="help-block text-danger"></p>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="form-group col-xs-12">
                <button id="send" type="submit" name="send" class="btn btn-default pull-right" onClick="">Send</button>
            </div>
        </div>
    </div>

    <hr class="comment-divider"/>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?>
        <div class="comment-container">
            <div class="row control-group comment-field-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <input id="c_name" type="text" name="name" class="form-control form-distance" value="<?php echo $_smarty_tpl->tpl_vars['comment']->value['name'];?>
" readonly style="font-size:18px;"/>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group comment-field-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <textarea id="c_message" name="content" class="form-control form-distance" readonly style="font-size:18px;"><?php echo $_smarty_tpl->tpl_vars['comment']->value['content'];?>
</textarea>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
        </div>
        <hr class="comment-divider"/>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div>
<?php }
}
