<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/configs/smarty_setup.php';
require_once _ROOT . '/admin/functions/set_of_functions.php';

$smarty = new Admin_Item();

switch ($_POST['position']) {
    case 'Blog':
        $id = $_POST['row'];
        $rowInfo_preview = get_BlogInfo($id);
        $smarty->assign("title", $rowInfo_preview['title']);
        $smarty->assign("subtitle", $rowInfo_preview['subtitle']);
        $smarty->assign("background", $rowInfo_preview['background']);
        $smarty->assign("preview_content", "<p>Paragraph and contents depend on the section.</p>");
        break;

    default : break;
}

$smarty->display(PREVIEW_MODAL);

?>
