<!-- page content -->
<div class="row" id="inbox_container">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inbox<small>Message</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-rigth">
                        <button id="delete_archived" class="btn btn-sm btn-default delete-archived-button" type="button" onClick="delete_archived()"><i class="fa fa-trash"></i> </button>
                    </li>
                    <li class="pull-right">
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="row">
                    <!-- MAIL LIST -->
                    <div id="inbox-list" class="col-sm-3 mail_list_column report-preview-content">
                        {foreach $reports as $report}
                            <a id="view_message" href="#" onClick="show_report(event, {$report.id})" >
                                <div class="mail_list">
                                    <div id="report_archive" name="report_archive" class="left">
                                        {if $report.flag == 0}
                                            <i class="fa fa-circle-o"></i>
                                        {else}
                                            <i class="fa fa-check-circle"></i>
                                        {/if}
                                        <input type="hidden" id="report_id_prev" name="report_id_prev" value="{$report.id}"/>
                                    </div>
                                    <div class="right">
                                        <h3 id="report_name_prev">{$report.name} <small id="report_date_prev">{$report.date}</small></h3>
                                        <p id="report_message_prev">{$report.message_preview}</p>
                                    </div>
                                </div>
                            </a>
                        {/foreach}
                    </div>
                    <!-- /MAIL LIST -->

                    <!-- CONTENT MAIL -->
                    <div id="report_container" class="col-sm-9 mail_view">
                        {include file = "$report_content"}
                    </div>
                    <!-- /CONTENT MAIL -->
                </div>
                <hr class="inbox-footer-line">
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
