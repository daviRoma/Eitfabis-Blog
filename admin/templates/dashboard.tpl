
<!-- Blog's page setting -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Your Article<small>Set Title, subtitle, background image ...</small> </h2>
                {if isset($error)}<h2 id="error_field" class="pull-right"><small class="error-field">{$error}</small></h2>{/if}
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
                                <textarea id="set_article_title" name="setTitle" class="set-article-title" rows="2" maxlength="128" required="Mandatory field">
                                    {if isset($draft)}{$draft.title}{/if}
                                </textarea>
                            </div>
                        </div>
                        <!-- Subtitle -->
                        <div class="col-md-6">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4><i class="fa fa-h-square"></i> - Subtitle</h4>
                                </div>
                                <textarea id="set_article_subtitle" name="setSubtitle" class="set-article-subtitle" rows="4" maxlength="500" required="Mandatory field">
                                    {if isset($draft)}{$draft.subtitle}{/if}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div id="background_container" class="col-md-12" title="Upload image">
                            <img id="bg_image" class="img-responsive" src="../upload/blog/background/admin-bg/article-default-bg-2.jpg">
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

                        <div id="editor-one" class="editor-wrapper set-article-content"></div>

                        <textarea name="descr" id="descr" style="display:none;">{if isset($draft)}{$draft.content}{/if}</textarea>
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
                                    {if isset($draft)}
                                        <option value="{$category.category}">{$category.category}</option>
                                    {/if}
                                    <option value="Other"> - Other - </option>
                                    {foreach $categories as $category}
                                        <option value="{$category.name}">{$category.name}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Tags -->
                    <div class="col-md-5">
                        <div class="panel-body">
                            <div class="x_title">
                                <h4>Tags</h4>
                            </div>
                            <div class="select-menu-flat tags-menu" style="margin-left:5px;">
                                <select id="tags_label_1" name="setTag_1">
                                    {if isset($tags[0])}
                                        <option value="{$tags[0]}">{$tags[0]}</option>
                                    {/if}
                                    <option value="default"> &nbsp - TAG - </option>
                                </select>
                            </div>
                            <div class="select-menu-flat tags-menu">
                                <select id="tags_label_2" name="setTag_2">
                                    {if isset($tags[1])}
                                        <option value="{$tags[0]}">{$tags[1]}</option>
                                    {/if}
                                    <option value="default"> &nbsp - TAG - </option>
                                </select>
                            </div>
                            <div class="select-menu-flat tags-menu">
                                <select id="tags_label_3" name="setTag_3">
                                    {if isset($tags[2])}
                                        <option value="{$tags[0]}">{$tags[2]}</option>
                                    {/if}
                                    <option value="default"> &nbsp - TAG - </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Is draft? -->
                <input id="is_draft" type="text" name="is_draft" value="{$is_draft}" style="display: none;"/>
                {if isset($draft)}
                    <input id="draft_id" type="text" name="draftId" value="{$draft.id}" style="display: none;"/>
                {/if}

                <!-- Public or Reset -->
                <div class="col-md-12">
                    <hr class="blog-footer-line">
                    <div class="panel-body">
                        <button id="reset" class="btn btn-sm btn-default" type="button" onClick="reset_all_fields()"><i class="fa fa-eraser"></i>&nbsp Reset</button>
                        <button id="draft" class="btn btn-sm btn-warning" type="button" onClick="make_draft()" {if isset($draft)} disabled {/if}><i class="fa fa-edit"></i>&nbsp Draft</button>
                        <button id="public" name="public" class="btn btn-sm btn-success pull-right" type="submit" onClick="return public_article(event);"><i class="fa fa-send"></i>&nbsp Public</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
