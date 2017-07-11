<!-- Draft List -->
<div id="draft_list" class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Select draft<small>Choose the draft you want to complete</small> </h2>
                <h2 id="error_field" class="pull-right"><small class="error-field">{$error}</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    {if isset($nocontent)}
                        <div class="col-md-4">
                            <div class="panel-body">
                                <div class="x_title">
                                    <h4>{$nocontent} &nbsp <i class="fa fa-check"></i></h4>
                                </div>
                            </div>
                        </div>
                    {else}
                        {foreach $drafts as $draft}
                            <div id="draft_box" name="draftBox">
                                <!-- id -->
                                <div class="col-md-4">
                                    <div class="panel-body">
                                        <div class="x_title">
                                            <h4>Id</h4>
                                        </div>
                                        <input id="get_draft_id" class="set-article-title" value="{$draft.id}" maxlength="24" readonly/>
                                    </div>
                                </div>
                                <!-- date -->
                                <div class="col-md-4">
                                    <div class="panel-body">
                                        <div class="x_title">
                                            <h4>Date</h4>
                                        </div>
                                        <input id="get_draft_date" class="set-article-subtitle" value="{$draft.date}" maxlength="48" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="" style="margin-top:23%;">
                                        <button id="choose_draft" name="chooseDraft" class="btn btn-sm btn-success pull-right" onClick="choose_draft({$draft.id})"><i class="fa fa-sign-in"></i> Go</button>
                                        <button id="delete_draft" name="deleteDraft" class="btn btn-sm btn-default pull-right" onclick="delete_draft({$draft.id})"><i class="fa fa-trash"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>
