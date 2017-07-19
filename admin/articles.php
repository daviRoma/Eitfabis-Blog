<?php

require_once 'controllers/session.php';
require_once 'configs/smarty_setup.php';
require_once 'configs/admin_configs.php';
require_once 'functions/articles_functions.php';
require_once 'functions/service_setup.php';



$smarty = new Admin_Item();

$smarty->assign('username', ucfirst($_SESSION['username']));
$smarty->assign('userPicture', '../' . $_SESSION['userPicture']);
$smarty->assign('position', 'Article Management');

$section = $_GET['section'];

if($section == "manage"){
    // Check the privilegies of the logged user before proceeding
    check_service("articles.php?section=manage", $_SESSION['role'], 0);

    $smarty->assign('header_page', 'Article list');
    $smarty->assign('tables', TABLES);
    $smarty->assign('page', MANAGEARTICLE);

    // Operation
    $articles = get_articlesTable();
    $header = get_articleTableHeader();

    $smarty->assign('table_head', $header);
    $smarty->assign('rows', $articles);
    $smarty->assign('operation_1', 'delete');
    $smarty->assign('operation_2', 'edit');
    $smarty->assign('total_pageTable', get_totalPage(count($articles)));
}

if($section == "draft"){
    // Check the privilegies of the logged user before proceeding
    check_service("articles.php?section=draft", $_SESSION['role'], 0);

    if(isset($_GET['id'])){
        $smarty->assign('header_page', 'Complete draft');
        $smarty->assign("page", DASHBOARD);


        $draft = get_draft($_GET['id']);
        $category = get_articleCategory($_GET['id']);
        $tags = get_articleTags($_GET['id']);
        $categories = get_categoryList();

        $smarty->assign('categories', $categories);
        $smarty->assign("draft", $draft);
        $smarty->assign("category", $category);
        $smarty->assign("tags", $tags);
        $smarty->assign("is_draft", 1);
    }else{
        $smarty->assign('header_page', 'Draft List');
        $smarty->assign('page', DRAFT_LIST);

        // Operation
        $drafts = get_draftList($_SESSION['username']);
        if(count($drafts) < 1){
            $nocontent = "There are no draft for " . $_SESSION['username'];
            $smarty->assign("nocontent", $nocontent);
        }else{
            $smarty->assign("drafts", $drafts);
        }
    }
}


$smarty->display(STARTER);

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
