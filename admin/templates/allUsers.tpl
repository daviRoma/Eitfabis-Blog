
<!-- Blog's page setting -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add new user</h2>
                {if isset($error)}<h2 id="error_field" class="pull-right"><small class="error-field">{$error}</small></h2>{/if}
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form id="addUser-form" enctype="multipart/form-data" action="controllers/addUserEmail_service.php" method="POST">

                    <!-- Email address -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Email Address</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <input id="set_email" name="set_email" class="change-input" maxlength="48" required></input>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Username -->
                        <div class="col-md-4">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Username</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <input id="set_username" name="set_username" class="change-input" maxlength="24" required/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr class="blog-footer-line">
                            <div class="panel-body">
                                <button id="add-newUser" name="addNewUser" class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<!-- Users settings -->
<div class="row" id="blogInfo_container">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Users <small>Information about users in 24CinL company</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" id="table_container">
                <div class="table-responsive">
                    {include $tables}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span style="padding-left:5px; padding-bottom:5px;">
                        <u>NOTE 1</u>: The undo button allows you to turn back and restore the original rows.</br>
                    </span>
                    <span style="padding-left:5px; padding-bottom:5px;">
                        <u>NOTE 2</u>: Group 1 -> Administrator </br>
                        <span style="margin-left:6%; padding-bottom:5px;">
                            Group 2 -> Report Manager </br>
                        </span>
                        <span style="margin-left:6%; padding-bottom:5px;">
                            Group 3 -> Blog Manager </br>
                        </span>
                        <span style="margin-left:6%; padding-bottom:5px;">
                            Group 4 -> Base User </br>
                        </span>
                    </span>
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
