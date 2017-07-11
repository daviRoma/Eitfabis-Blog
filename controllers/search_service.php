<?php

require_once '../configs/blog_configs.php';
require_once BLOG_ROOT . '/functions/db_functions.php';
require_once BLOG_ROOT . '/functions/utility_functions.php';


if(isset($_POST['search'])){

    $title = $_POST['title'];
    $category = $_POST['category'];
    $tag = $_POST['tag'];

    if(empty($title) && empty($category) && empty($tag)) {
        $error = 'Complete at least one field to start your search.';
        redirect("/search.php?error=true&typeError=$error", true);
    }

    $result = "";

    if(!empty($title))
        $result .= "title-";

    if(!empty($category))
        $result .= "category-";

    if(!empty($tag))
        $result .= "tag";
    else
        $result = substr($result, 0, strlen($result) - 1);

    redirect("/search.php?method=$result&title=$title&category=$category&tag=$tag", true);

}else{
    $error = "Server Error";
    redirect("/error_page.php", true);
}

?>
