<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/utility_functions.php';


$smarty_error = new Admin_Item();

if(isset($_GET['typeError'])){
    switch($_GET['typeError']){
        case 403 :
            $smarty_error->assign('number_403', $_GET['message']);
            break;

        case 404 :
            $smarty_error->assign('number_404', $_GET['message']);
            break;

        case 500 :
            $smarty_error->assign('number_500', $_GET['message']);
            break;

        default: break;
    }
}else{
     $smarty_error->assign('number_400', "Type of request not complete.");
}

$smarty_error->display(ERROR_PAGE);

?>
