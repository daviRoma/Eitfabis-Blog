<!-- Tags management -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel" style="height:680px;">
            <div class="x_title">
                <h2>Manage dataTable<small>List of upload pictures</small> </h2>
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
                        <u>NOTE</u>:
                        Undo operation not allowed in this section.
                    </span></br>
                </div>
                <div class="col-md-12">
                    <hr class="subscribers-footer-line">
                    <button id="undo" class="btn btn-sm btn-default" type="button" onClick="restore_row(event)" disabled><i class="fa fa-undo"></i> Undo</button>
                    <button id="delete_selected" class="btn btn-sm btn-default" type="button" onClick="delete_selected(event)"><i class="fa fa-trash"></i> Delete</button>
                    <button id="add" class="btn btn-sm btn-success" type="button" onClick="addModal(event)" disabled><i class="fa fa-plus"></i> Add</button>
                    <button id="save" class="btn btn-sm btn-success pull-right" type="button" onClick="save_changes(event)"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
