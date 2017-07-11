<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/configs/smarty_setup.php';
require_once _ROOT . '/admin/functions/reports_functions.php';

$smarty = new Admin_Item();

switch ($_POST['operation']) {
    case 'show':
        $report = get_report($_POST['report']);
        $smarty->assign('foreground_report', $report);
        $smarty->display(INBOX);
        break;

    case 'archive':
        set_archive($_POST['report'], true);
        break;

    case 'unarchive':
        set_archive($_POST['report'], false);
        break;

    case 'delete':
        delete_report($_POST['report']);
        break;

    case 'delete_archived':
        $deleted = delete_archived();
        echo $deleted;
        break;

    default : break;
}
?>
