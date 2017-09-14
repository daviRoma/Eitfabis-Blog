<?php
/* Smarty version 3.1.30, created on 2017-09-14 23:34:30
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/inbox.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59baf5e6e3e405_03292661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9a3b736facaf47ec0557dc790dc1100615e965d' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/inbox.tpl',
      1 => 1497102573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59baf5e6e3e405_03292661 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Inbox -->
<div id="report_content" class="inbox-body">
    <div class="mail_heading row">
        <div class="col-md-8">
            <div class="btn-group">
                <button id="reply_report" class="btn btn-sm btn-primary" type="button" onClick="mail_reply()"><i class="fa fa-reply"></i> Reply</button>
                <?php if ($_smarty_tpl->tpl_vars['foreground_report']->value['flag'] == 0) {?>
                    <button id="archive_report" class="btn btn-sm btn-default" type="button" onClick="archive_report(<?php echo $_smarty_tpl->tpl_vars['foreground_report']->value['id'];?>
)" data-placement="top" title="Archive"><i class="fa fa-check-circle"></i></button>
                <?php } else { ?>
                    <button id="unarchive_report" class="btn btn-sm btn-default" type="button" onClick="unarchive_report(<?php echo $_smarty_tpl->tpl_vars['foreground_report']->value['id'];?>
)" data-placement="top" title="Unarchive"><i class="fa fa-circle-thin"></i></button>
                <?php }?>
                <button id="delete_report" class="btn btn-sm btn-default" type="button" onClick="delete_report(<?php echo $_smarty_tpl->tpl_vars['foreground_report']->value['id'];?>
)" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i></button>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <p id="report_date" class="date"><?php echo $_smarty_tpl->tpl_vars['foreground_report']->value['date'];?>
</p>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="sender-info">
        <div class="row">
            <div class="col-md-12 report-header">
                <strong id="report_name" style="font-size:15px;"><?php echo $_smarty_tpl->tpl_vars['foreground_report']->value['name'];?>
</strong>
                <span id="report_email" title="<?php echo $_smarty_tpl->tpl_vars['foreground_report']->value['email'];?>
">&nbsp &lt<?php echo $_smarty_tpl->tpl_vars['foreground_report']->value['email'];?>
&gt</span>
            </div>
        </div>
    </div>
    <div class="view-mail">
        <p id="report_message" class="report-message"><?php echo $_smarty_tpl->tpl_vars['foreground_report']->value['message'];?>
</p>
    </div>
</div>
<?php }
}
