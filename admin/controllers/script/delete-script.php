<?php

require_once '../../configs/admin_configs.php';
require_once _ROOT . '/admin/functions/set_of_functions.php';


$deleted = $_POST['row'];

switch ($_POST['position']) {
    case 'Article Management':
        delete_article($deleted, $_POST['number']);
        break;

    case 'Subscribers':
        delete_subscriber($deleted, $_POST['number']);
        break;

    case 'Blog':
        delete_blogInfo($deleted, $_POST['number']);
        break;

    case 'Users':
        if(!delete_userGroup($deleted, $_POST['number']))
            echo "STOP";
        break;

    case 'Tags':
        delete_tag($deleted, $_POST['number']);
        break;

    case 'Files Manager':
        delete_upload($deleted, $_POST['number']);
        break;

    case 'Newsletter':
        delete_newsletter($deleted, $_POST['number']);
        break;

    default : break;
}

?>
