<?php
/* Smarty version 3.1.30, created on 2017-05-03 18:20:24
  from "/Users/Davide/Desktop/Blog/templates/search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590a03489c5375_48785475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '102da6eaa2f80bc94c47b51cc16d7070fd834e73' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/templates/search.tpl',
      1 => 1492980114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590a03489c5375_48785475 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Main Content: Search article -->
<div class="row" id="search_header">

    <?php if (isset($_smarty_tpl->tpl_vars['error_message']->value) || isset($_smarty_tpl->tpl_vars['success_message']->value)) {?>
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['notice_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </div>
    <?php }?>

    <div id="show_form" class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <a class="show-form" href="#" onClick="display_search_form(event);">
                <span> New search </span>
                <i class="fa fa-arrow-down" id="temp"></i>
                <input id="form_display_status" type="hidden" name="form_display_status" value="down" />
            </a>
    </div>

    <div id="search_body" class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

        <div class="search-intro-section">
            <span>Start your article search by title, category and/or tag. </span></br>
            <span>You can insert at most one category and at most three tags. Tag separated by '@'.</span>
        </div>

        <form id="search_form" action="controllers/search_service.php" method="post" onSubmit="start_search(event)">
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Title</label>
                    <input id="s_title" type="text" name="title" class="form-control" placeholder="Insert title or keyword" >
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group in-line">
                <div class="form-group col-xs-5 floating-label-form-group controls pull-left">
                    <label>Category</label>
                    <input id="s_category" type="text" name="category" class="form-control" placeholder="Category">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group col-xs-6 floating-label-form-group controls pull-right">
                    <label>Tag</label>
                    <input id="s_tag" type="text" name="tag" class="form-control" placeholder="Tag">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="form-group col-xs-12">
                    <button id="search_start" type="submit" name="search" class="btn btn-default">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['temp_option']->value)) {?>
    <input id="temp_option" name="<?php echo $_smarty_tpl->tpl_vars['temp_option']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['temp_option']->value;?>
" type="hidden"/>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['articles']->value)) {?>
    <hr>
    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['home_page']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
}
