<?php
/* Smarty version 3.1.30, created on 2017-07-13 14:02:12
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/categories&tag.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5967614453f334_06370306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcb5492eab1eac14d23c43504d5563f73c6e123d' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/categories&tag.tpl',
      1 => 1499788581,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5967614453f334_06370306 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Main Content: List of categories or tags -->
<div class="row" id="catEtag_row">

    <div id="catEtag_header" class="col-lg-12 col-md-12 col-xs-12">

        <?php if (isset($_smarty_tpl->tpl_vars['category']->value) || isset($_smarty_tpl->tpl_vars['tag']->value)) {?>
            <div class="col-lg-3 col-md-3 col-xs-3">
                <div class="catEtag-header-back">
                    <?php if (isset($_smarty_tpl->tpl_vars['temp_section']->value)) {?>
                        <input id="temp_section" name="<?php echo $_smarty_tpl->tpl_vars['temp_section']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['temp_section']->value;?>
" type="hidden"/>
                    <?php }?>
                    <a href="?section=<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
" onClick="turn_back_to_section(this,event)"><i class="fa fa-arrow-left"></i></a>
                </div>
            </div>

            <?php if (isset($_smarty_tpl->tpl_vars['category']->value)) {?>
                <div class="col-lg-6 col-md-6 col-xs-6">
                    <div class="category-header text-center">
                        <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['category']->value['background'];?>
" alt="">
                        <input id="temp_option" name="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" type="hidden"/>
                        <h1><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</h1>
                        <span><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</span>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-6 col-md-6 col-xs-6">
                    <div class="tag-header text-center">
                        <input id="temp_option" name="<?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
" type="hidden"/>
                        <h1><i class="fa fa-tag" style="color:#264d73;"></i> &nbsp<?php echo $_smarty_tpl->tpl_vars['tag']->value['label'];?>
</h1>
                        <span><?php echo $_smarty_tpl->tpl_vars['tag']->value['description'];?>
</span>
                    </div>
                </div>
            <?php }?>

        <?php } else { ?>

            <div class="navbar-category-tag">
                <ul class="navbar-button-left" type="none">
                    <li id="category" class="navbar-elem" <?php if (isset($_smarty_tpl->tpl_vars['categoryLink_style']->value)) {
echo $_smarty_tpl->tpl_vars['categoryLink_style']->value;
}?> onClick="show_categories(event)">
                        <input id="temp_link_category" name="category" value="category" type="hidden"/>
                        <a class="elem-link" href="category-tag.php?section=category">
                            Category
                        </a>
                    </li>
                    <li id="tag" class="navbar-elem" <?php if (isset($_smarty_tpl->tpl_vars['tagLink_style']->value)) {
echo $_smarty_tpl->tpl_vars['tagLink_style']->value;
}?> onClick="show_tags(event, 1)">
                        <input id="temp_link_tag" name="tag" value="tag" type="hidden"/>
                        <a class="elem-link" href="category-tag.php?section=tag">
                            Tag
                        </a>
                    </li>
                </ul>

                <!-- Real time search -->
                <ul id="realTimeSearch" class="navbar-search-right" type="none">
                    <li class="navbar-search-elem">
                        <form class="mini-search-form" action="" method="post">
                            <div class="col-xs-10 ">
                                <input class="mini-search" id="catEtag_search" name="search" type="text" onkeyup="real_time()" placeholder="">
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        <?php }?>

    </div>
    <!-- /Row Header -->

    <div id="hr_divider" class="col-lg-12">
        <hr>
    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['categories']->value) || isset($_smarty_tpl->tpl_vars['tags']->value)) {?>
        <div id="catEtag_container" class="col-lg-12 col-md-12 col-xs-12">
            <?php if (isset($_smarty_tpl->tpl_vars['categories']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['list_of_categories']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php } else { ?>
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['list_of_tags']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
        </div>
        <div class="col-lg-12">
            <hr>
        </div>
    <?php }?>

</div>
<!-- /Row -->

<?php if (isset($_smarty_tpl->tpl_vars['articles']->value)) {?>
    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['home_page']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
}
