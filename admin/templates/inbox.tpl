<!-- Inbox -->
<div id="report_content" class="inbox-body">
    <div class="mail_heading row">
        <div class="col-md-8">
            <div class="btn-group">
                <button id="reply_report" class="btn btn-sm btn-primary" type="button" onClick="mail_reply()"><i class="fa fa-reply"></i> Reply</button>
                {if $foreground_report.flag == 0}
                    <button id="archive_report" class="btn btn-sm btn-default" type="button" onClick="archive_report({$foreground_report.id})" data-placement="top" title="Archive"><i class="fa fa-check-circle"></i></button>
                {else}
                    <button id="unarchive_report" class="btn btn-sm btn-default" type="button" onClick="unarchive_report({$foreground_report.id})" data-placement="top" title="Unarchive"><i class="fa fa-circle-thin"></i></button>
                {/if}
                <button id="delete_report" class="btn btn-sm btn-default" type="button" onClick="delete_report({$foreground_report.id})" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i></button>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <p id="report_date" class="date">{$foreground_report.date}</p>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="sender-info">
        <div class="row">
            <div class="col-md-12 report-header">
                <strong id="report_name" style="font-size:15px;">{$foreground_report.name}</strong>
                <span id="report_email" title="{$foreground_report.email}">&nbsp &lt{$foreground_report.email}&gt</span>
            </div>
        </div>
    </div>
    <div class="view-mail">
        <p id="report_message" class="report-message">{$foreground_report.message}</p>
    </div>
</div>
