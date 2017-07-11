<?php
/* Smarty version 3.1.30, created on 2017-07-07 18:38:49
  from "/Users/Davide/Desktop/Blog/admin/templates/newsletter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595fb919ad3190_91312717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17ffeda30e2aa21e1269c352098099bcbcdd4051' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/admin/templates/newsletter.tpl',
      1 => 1499445526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595fb919ad3190_91312717 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Write newsletter -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <!-- Title -->
                    <div class="col-md-6">
                        <div class="panel-body">
                            <div class="x_title">
                                <h4>Title</h4>
                            </div>
                            <textarea id="set_newsletter_title" class="set-newsletter-title" maxlength="255" required="Mandatory field"></textarea>
                        </div>
                    </div>
                    <!-- Type -->
                    <div class="col-md-4 pull-right">
                        <div class="panel-body">
                            <div class="x_title">
                                <h4>Type</h4>
                            </div>
                            <div class="btn-toolbar">
                                <div class="btn-group" id="set_newsletter_type">
                                    <button class="btn btn-default" type="button" value="Normal">Normal</button>
                                    <button class="btn btn-default" type="button" value="Info">Info</button>
                                    <button class="btn btn-warning" type="button" value="Warning">Warning</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Frequency -->
                    <div class="col-md-4 pull-right">
                        <div class="panel-body">
                            <div class="x_title">
                                <h4>Frequency</h4>
                            </div>
                            <div class="btn-toolbar">
                                <div class="btn-group" id="set_newsletter_frequency">
                                    <button class="btn btn-success" type="button" value="Day">Day</button>
                                    <button class="btn btn-success" type="button" value="Week">Week</button>
                                    <button class="btn btn-success" type="button" value="Month">Month</button>
                                    <button class="btn btn-success" type="button" value="Year">Year</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paragraph -->
            <div class="x_content">
                <div class="panel-body">
                    <div class="x_title">
                        <h4>Content</h4>
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

                    </div>

                    <div id="editor-one" class="editor-wrapper set-article-content"></div>

                    <textarea name="descr" id="descr" style="display:none;"></textarea>

                </div>
            </div>
            <div class="clearfix"></div>

            <!-- Save -->
            <div class="col-md-12" style="margin-top:-20px;">
                <hr class="blog-footer-line">
                <div class="panel-body">
                    <button id="save_newsletter" class="btn btn-sm btn-success pull-right" type="submit" ><i class="fa fa-level-up"></i>&nbsp Insert</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Newsletter list <small>Select and send or delete newsletter</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" id="table_container">
                <div class="table-responsive">
                    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['tables']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span style="padding-left:5px; padding-bottom:5px;"><u>NOTE</u>: The undo button allows you to turn back and restore the original rows.</span>
                </div>
                <div class="col-md-12">
                    <hr class="subscribers-footer-line">
                    <button id="undo" class="btn btn-sm btn-default" type="button" onClick="restore_row(event)"><i class="fa fa-undo"></i> Undo</button>
                    <button id="delete_selected" class="btn btn-sm btn-default" type="button" onClick="delete_selected(event)"><i class="fa fa-trash"></i> Delete</button>
                    <button id="send_news" class="btn btn-sm btn-primary" type="button" onClick="sendNewsletter(event)"><i class="fa fa-send-o"></i> Send</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
