
<!-- Blog's page setting -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Background Image</h2>
                {if isset($error)}<h2 id="error_field" class="pull-right"><small class="error-field">{$error}</small></h2>{/if}
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form id="addPage-form" enctype="multipart/form-data" action="controllers/addBlogPage_service.php" method="POST">
                    <div class="row">
                        <div id="background_container" class="col-md-12" title="Upload image">
                            <img id="bg_image" class="img-responsive" src="../upload/blog/background/admin-bg/blog-default-bg.jpg">
                            <img id="bg_fake" src="" style="display:none;">
                        </div>
                        <input id="bg_file" type="file" name="bg_file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="display: none;"/>
                    </div>

                    <div class="clearfix"></div>

                    <!-- Change title -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Title</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <input id="set_title" name="set_title" class="change-input" maxlength="24"></input>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Change subtitle -->
                        <div class="col-md-4">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Subtitle</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <input id="set_subtitle" name="set_subtitle" class="change-input" maxlength="128"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Set Page -->
                        <div class="col-md-3 pull-right">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Page</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <input id="set_position" name="set_position" class="change-input" value="" maxlength="24"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr class="x-content-footer-line">
                            <div class="panel-body">
                                <button id="add-new" name="addNewPage" class="btn btn-sm btn-success pull-right" type="submit" onClick="add_blogPage(event)"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<!-- BlogInfo settings -->
<div class="row" id="blogInfo_container">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Blog pages <small>Information about the sections of the 24CinL Blog</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" id="table_container">
                <div class="table-responsive">
                    {include $tables}
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
                    <button id="add" class="btn btn-sm btn-success" type="button" onClick="addModal(event)"><i class="fa fa-plus"></i> Add</button>
                    <button id="save" class="btn btn-sm btn-success pull-right" type="button" onClick="save_changes(event)"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
