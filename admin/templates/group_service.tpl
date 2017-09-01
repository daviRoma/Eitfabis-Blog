<!-- Group-Service page setting -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add service</h2>
                {if isset($error)}<h2 id="error_field" class="pull-right"><small class="error-field">{$error}</small></h2>{/if}
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form id="addService-form" enctype="multipart/form-data" action="controllers/addServiceGroup_service.php" method="POST">

                    <div id="serviceForm_container" name="serviceForm_container">
                        <div class="col-md-6">
                            <!--  Service label -->
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Service Label</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <input id="set_s_label" name="set_s_label" class="change-input" maxlength="128" required></input>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Service name -->
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Service Name</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <input id="set_s_name" name="set_s_name" class="change-input" maxlength="255" required/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Service page -->
                            <div id="main_page-container" class="col-md-6">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Main Service</h4>
                                    </div>
                                    <div class="row">
                                        <div id="primary_service" class="col-md-12">
                                            <div class="checkbox">
                                                <label style="padding-left:7px;">
                                                    <input id="main_service" type="checkbox" class="flat" value="" name="main_service"> &nbsp Is main
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Service available -->
                            <div id="page_available-container" class="col-md-6">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Available Service</h4>
                                    </div>
                                    <div class="row">
                                        <div id="available_service" class="col-md-12">
                                            <div class="checkbox">
                                                <label style="padding-left:7px;">
                                                    <input id="available_service" type="checkbox" class="flat" value="" name="available_service"> &nbsp Is available
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Service-Groups -->
                        <div id="group_list-container" class="col-md-6">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Groups</h4>
                                </div>
                                <div class="row">
                                    <div id="group_list" class="col-md-10">
                                        {foreach $groups as $group}
                                            <div class="checkbox">
                                                <label style="padding-left:7px;">
                                                    <input type="checkbox" class="flat" value="{$group.id}" name="groups[]"> &nbsp {$group.role}
                                                </label>
                                            </div>
                                        {/foreach}
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
                                <button id="add-newService" name="addNewService" class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-plus"></i> Add Service</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>


<!-- Add group -->
<div class="row" id="add_group_container">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Group</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form id="addGroup-form" enctype="multipart/form-data" action="controllers/addServiceGroup_service.php" method="POST">

                    <div id="groupForm_container" name="groupForm_container">
                        <div class="col-md-4">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Group Name</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <input id="set_g_name" name="set_g_name" class="change-input" maxlength="24" required></input>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Group Description</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <input id="set_g_desc" name="set_g_desc" class="change-input" maxlength="255" style="width:250px;" required></input>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Group Starter Page &nbsp <i class="fa fa-chevron-down"></i></h4>
                                </div>
                                <div class="row">
                                    <div class="select-menu-all">
                                        <select id="select_starter" name="set_g_start" required>
                                            <option value="default"> &nbsp </option>
                                            {foreach $filter_services as $service}
                                                <option value="{$service.label}">&nbsp{$service.label}</option>
                                            {/foreach}
                                        </select>
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
                                <button id="add-newGroup" name="addNewGroup" class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-plus"></i> Add Group</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<!-- Editing groups or services -->
<div class="row" id="service_group_manage">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Service-Groups management<small> Select 'Services' or 'Groups' to perform the operations.</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div id="gs_select" style="margin-top:15px; padding-bottom:30px;">
                    <div class="col-md-4">
                        <div class="select-menu-flat" style="margin-left:0px;">
                            <select id="select_service">
                                <option value="default"> &nbsp Service list</option>
                                {foreach $services as $service}
                                    <option value="{$service.id}"> &nbsp {$service.label}</option>
                                {/foreach}
                            </select>
                        </div>
                        <button class="btn btn-sm btn-primary pull-left" onClick="go_to_service()" style="float:left;"> Go &nbsp<i class="fa fa-arrow-down"></i></button>
                    </div>

                    <div class="col-md-4">
                        <div class="select-menu-flat" style="margin-left:0px;">
                            <select id="select_group">
                                <option value="default"> &nbsp Groups list</option>
                                {foreach $groups as $group}
                                    <option value="{$group.id}"> &nbsp {$group.role}</option>
                                {/foreach}
                            </select>
                        </div>
                        <button class="btn btn-sm btn-primary pull-left" onClick="go_to_group()" style="float:left;"> Go &nbsp<i class="fa fa-arrow-down"></i></button>
                    </div>
                </div>
                <hr class="footer-divider">

                <div id="gs_edit_container">
                    <p name="empty_gs_edit" class="text-center" style="margin-top:15px;">. . . </br></p>
                    <div id="serviceEdit_container" name="serviceEdit_container" style="display:none;">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Service Label</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <input id="set_s_label" name="set_s_label" class="change-input" maxlength="128" required></input>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Service name -->
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Service Name</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <input id="set_s_name" name="set_s_name" class="change-input" maxlength="255" required/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Service page -->
                            <div id="main_page-container" class="col-md-6">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Main Service</h4>
                                    </div>
                                    <div class="row">
                                        <div id="primary_service" class="col-md-12">
                                            <div class="checkbox">
                                                <label style="padding-left:7px;">
                                                    <input id="main_service" type="checkbox" class="flat" value="" name="main_service"> &nbsp Is main
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Service available -->
                            <div id="page_available-container" class="col-md-6">
                                <div class="panel-body">
                                    <div class="x_title">
                                        <h4>Available Service</h4>
                                    </div>
                                    <div class="row">
                                        <div id="available_service" class="col-md-12">
                                            <div class="checkbox">
                                                <label style="padding-left:7px;">
                                                    <input id="available_service" type="checkbox" class="flat" value="" name="available_service"> &nbsp Is available
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Service-Groups -->
                        <div id="group_list-container" class="col-md-6">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Groups</h4>
                                </div>
                                <div class="row">
                                    <div id="group_list" class="col-md-10">
                                        {foreach $groups as $group}
                                            <div class="checkbox">
                                                <label style="padding-left:7px;">
                                                    <input type="checkbox" class="flat" value="{$group.id}" name="groups[]"> &nbsp {$group.role}
                                                </label>
                                            </div>
                                        {/foreach}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="groupEdit_container" name="groupEdit_container" style="display:none;">
                        <div class="col-md-4">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Group Name</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <input id="set_g_name" name="set_g_name" class="change-input" maxlength="24" required></input>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Group Description</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <input id="set_g_desc" name="set_g_desc" class="change-input" maxlength="255" style="width:250px;" required></input>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>Group Starter Page &nbsp <i class="fa fa-chevron-down"></i></h4>
                                </div>
                                <div class="row">
                                    <div class="select-menu-all">
                                        <select id="select_starter" name="set_g_start" required>
                                            <option value="default"> &nbsp </option>
                                            {foreach $filter_services as $service}
                                                <option value="{$service.label}">&nbsp{$service.label}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gs_edit_buttonGroup" class="row" style="display:none;">
                        <div class="col-md-12">
                            <hr class="blog-footer-line">
                            <div class="panel-body">
                                <button id="back_gs" name="backToList" class="btn btn-sm btn-default pull-left" onClick="remove_gs_list()"><i class="fa fa-arrow-left"></i> Back</button>
                                <button id="delete_gs" name="deleteGrServ" class="btn btn-sm btn-default pull-right" onClick="delete_gs()"><i class="fa fa-trash"></i> Delete</button>
                                <button id="save_gs" name="saveGrServ" class="btn btn-sm btn-success pull-right" onClick="confirm_gs_changes()"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
