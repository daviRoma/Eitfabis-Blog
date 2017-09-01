<?php
/* Smarty version 3.1.30, created on 2017-08-05 12:33:44
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/modalComment.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59859f0810f935_21422479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8195df671762d21776b68e11126a66c5d49700d7' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/modalComment.tpl',
      1 => 1501929086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59859f0810f935_21422479 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Modal window for list of comments -->
<div id="modal_comment" class="modal-comment">

    <div class="modal-content-comments">
        <div class="modal-body-comments">
            <div id="comment_header" class="modal-comment-header">
                <span> Comments </span>
            </div>
            <!-- Comment List -->
            <hr class="comment-divider">
            <div id="c_container">
                <?php if (isset($_smarty_tpl->tpl_vars['comments']->value)) {?>
                    <div id="comments_list">
                        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['comment_body']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    </div>
                <?php } else { ?>
                    <div id="no_comments" class="modal-no-comment-header">
                        <span> No comment present </span>
                    </div>
                <?php }?>
            </div>
            <!-- /Comment List -->

            <div id="more_comments" <?php if ($_smarty_tpl->tpl_vars['comments_page_limit']->value > 1) {?> class="comment-show-more active-elem" <?php } else { ?> class="comment-show-more hide-elem" <?php }?>>
                <a id="show_more_comments" href="#" onClick="show_more_comments(event)"> &nbsp Show more &nbsp </a>
                </br><i class="fa fa-sort-down"></i>
                <input id="comments_current_page" type="hidden" value="1"/>
            </div>

            <!-- Comment Form -->
            <div id="comment_form" class="write-comment-container">
                <div id="" class="comment-header-write">
                    <span> Write your comment &nbsp  </span>
                    <i class="fa fa-pencil"></i>
                </div>
                <div class="row control-group comment-field-group">
                    <div class="form-group col-xs-11 floating-label-form-group controls">
                        <label>Name</label>
                        <input id="v_name" type="text" name="name" class="form-control form-distance" placeholder="Name"  maxlength="32" autocomplete="off" required style="font-size:18px;"/>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group comment-field-group">
                    <div class="form-group col-xs-11 floating-label-form-group controls">
                        <label>Comment</label>
                        <textarea id="v_comment" rows="3" name="comment" class="form-control form-distance" placeholder="Comment" maxlength="500" autocomplete="off" required style="font-size:18px;"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class="form-group pull-right" style="margin-right:40px;">
                        <button id="v_public" type="submit" name="public" class="btn btn-default" onClick="add_comment(event)">Public</button>
                    </div>
                </div>
            </div>
            <!-- Comment Form -->
        </div>
    </div>
</div>
<?php }
}
