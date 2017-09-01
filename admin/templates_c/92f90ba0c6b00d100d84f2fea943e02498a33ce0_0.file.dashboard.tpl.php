<?php
/* Smarty version 3.1.30, created on 2017-08-04 15:32:13
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/dashboard.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5984775d68d626_23776191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92f90ba0c6b00d100d84f2fea943e02498a33ce0' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/dashboard.tpl',
      1 => 1501853532,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5984775d68d626_23776191 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Blog's page setting -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Your Article<small>Set Title, subtitle, background image ...</small> </h2>
                <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?><h2 id="error_field" class="pull-right"><small class="error-field"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</small></h2><?php }?>
                <div class="clearfix"></div>
            </div>

            <form id="insertArticle-form" enctype="multipart/form-data" action="controllers/article_service.php" method="POST">
                <div class="x_content">
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4><i class="fa fa-header"></i> - Title</h4>
                                </div>
                                <textarea id="set_article_title" name="setTitle" class="set-article-title" rows="2" maxlength="128" required="Mandatory field"><?php if (isset($_smarty_tpl->tpl_vars['draft']->value)) {
echo $_smarty_tpl->tpl_vars['draft']->value['title'];
}?></textarea>
                            </div>
                        </div>
                        <!-- Subtitle -->
                        <div class="col-md-6">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4><i class="fa fa-h-square"></i> - Subtitle</h4>
                                </div>
                                <textarea id="set_article_subtitle" name="setSubtitle" class="set-article-subtitle" rows="4" maxlength="500"><?php if (isset($_smarty_tpl->tpl_vars['draft']->value)) {
echo $_smarty_tpl->tpl_vars['draft']->value['subtitle'];
}?></textarea>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div id="background_container" class="col-md-12" title="Upload image">
                            <img id="bg_image" class="img-responsive" src="../upload/blog/background/admin-bg/article-default-bg-3.jpg">
                            <img id="bg_fake" src="" style="display:none;">
                        </div>
                        <input id="bg_file" type="file" name="bg_file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="display: none;"/>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Paragraph -->
                <div class="x_content">
                    <div class="panel-body">
                        <div class="x_title">
                            <h4><i class="fa fa-pencil-square"></i> - Paragraphs</h4>
                        </div>

                        <div id="alerts"></div>
                        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one" style="margin-top:15px;">
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a data-edit="fontSize 5">
                                            <p style="font-size:17px">Huge</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-edit="fontSize 3">
                                            <p style="font-size:14px">Normal</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-edit="fontSize 1">
                                            <p style="font-size:11px">Small</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                            </div>

                            <div class="btn-group">
                                <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                            </div>

                            <div class="btn-group">
                                <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                            </div>

                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                <div class="dropdown-menu input-append">
                                    <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                    <button class="btn" type="button">Add</button>
                                </div>
                                <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                            </div>

                            <div class="btn-group">
                                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                            </div>
                        </div>

                        <div id="editor-one" class="editor-wrapper set-article-content"><?php if (isset($_smarty_tpl->tpl_vars['draft']->value)) {
echo $_smarty_tpl->tpl_vars['draft']->value['content'];
}?></div>

                        <textarea name="descr" id="descr" style="display:none;"></textarea>
                        <input id="article_content" type="text" name="articleContent" style="display:none;"/>
                        </br>

                        <div class="ln_solid"></div>
                    </div>

                    <div id="img_upload" class="file-upload-field">
                        <button id="upload_file" class="btn btn-sm btn-primary" type="button" > Upload</button>
                        <input id="upload_img_file" name="upload_img_file" type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="display: none;"/>
                        <img id="img_fake_1" src="" style="display:none;">
                        <input id="file_number" name="fileNumber" value="" style="display:none;"/>

                        <!-- Path string fields -->
                        <input id="set_img_file_0" name="set_img_file_0" class="set-img-file" maxlength="48" value=""/>

                    </div>
                    </br>
                </div>
                <div class="clearfix"></div>

                <!-- Category&Tag -->
                <div class="x_content">
                    <!-- Category -->
                    <div class="col-md-4">
                        <div class="panel-body">
                            <div class="x_title">
                                <h4>Category</h4>
                            </div>
                            <div class="select-category-menu">
                                <i class="fa fa-th"></i>
                                <select id="set_category" name="setCategory">
                                    <?php if (isset($_smarty_tpl->tpl_vars['draft']->value)) {?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['category'];?>
</option>
                                    <?php }?>
                                    <option value="Other"> - Other - </option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Tags -->
                    <div class="col-md-6">
                        <div class="panel-body">
                            <div class="x_title">
                                <h4>Tags</h4>
                            </div>
                            <div class="select-menu-flat tags-menu" style="margin-left:5px;">
                                <select id="tags_label_1" name="setTag_1">
                                    <?php if (isset($_smarty_tpl->tpl_vars['tags']->value[0])) {?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['tags']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['tags']->value[0];?>
</option>
                                    <?php }?>
                                    <option value="default"> TAG - 1 </option>
                                </select>
                            </div>
                            <div class="select-menu-flat tags-menu">
                                <select id="tags_label_2" name="setTag_2">
                                    <?php if (isset($_smarty_tpl->tpl_vars['tags']->value[1])) {?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['tags']->value[1];?>
"><?php echo $_smarty_tpl->tpl_vars['tags']->value[1];?>
</option>
                                    <?php }?>
                                    <option value="default"> TAG - 2 </option>
                                </select>
                            </div>
                            <div class="select-menu-flat tags-menu">
                                <select id="tags_label_3" name="setTag_3">
                                    <?php if (isset($_smarty_tpl->tpl_vars['tags']->value[2])) {?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['tags']->value[2];?>
"><?php echo $_smarty_tpl->tpl_vars['tags']->value[2];?>
</option>
                                    <?php }?>
                                    <option value="default"> TAG - 3 </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Is draft? -->
                <input id="is_draft" type="text" name="is_draft" value="<?php echo $_smarty_tpl->tpl_vars['is_draft']->value;?>
" style="display: none;"/>
                <?php if (isset($_smarty_tpl->tpl_vars['draft']->value)) {?>
                    <input id="draft_id" type="text" name="draftId" value="<?php echo $_smarty_tpl->tpl_vars['draft']->value['id'];?>
" style="display: none;"/>
                <?php }?>

                <!-- Public or Reset -->
                <div class="col-md-12">
                    <hr class="blog-footer-line">
                    <div class="panel-body">
                        <button id="reset" class="btn btn-sm btn-default" type="button" onClick="reset_all_fields()"><i class="fa fa-eraser"></i>&nbsp Reset</button>
                        <button id="draft" class="btn btn-sm btn-warning" type="button" onClick="make_draft()" <?php if (isset($_smarty_tpl->tpl_vars['draft']->value)) {?> disabled <?php }?>><i class="fa fa-edit"></i>&nbsp Draft</button>
                        <button id="public" name="public" class="btn btn-sm btn-success pull-right" type="submit" onClick="return public_article(event);"><i class="fa fa-send"></i>&nbsp Public</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}
