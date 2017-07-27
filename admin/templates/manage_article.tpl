<!-- Article management -->
<div class="row">
    <div class="col-md-12">

        <div class="x_panel" >
            <div class="x_title">
                <h2>Manage dataTable<small>List of articles</small> </h2>
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
                        <u>NOTE 1</u>:
                        The undo button is disable in this section.
                    </span></br>
                    <span style="padding-left:5px; padding-bottom:5px;">
                        <u>NOTE 2</u>:
                        Deleting an article, will be deleted all linking with category and tags that cannot be restored with the undo operation.
                    </span>
                </div>
                <div class="col-md-12">
                    <hr class="subscribers-footer-line">
                    <button id="undo" class="btn btn-sm btn-default" type="button" onClick="restore_row(event)" disabled><i class="fa fa-undo"></i> Undo</button>
                    <button id="delete_selected" class="btn btn-sm btn-default" type="button" onClick="delete_selected(event)"><i class="fa fa-trash"></i> Delete</button>
                    <button id="view_comments" class="btn btn-sm btn-primary" type="button" onClick="" disabled><i class="fa fa-comments-o"></i> View Comments</button>
                    <button id="save" class="btn btn-sm btn-success pull-right" type="button" onClick="save_changes(event)"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
