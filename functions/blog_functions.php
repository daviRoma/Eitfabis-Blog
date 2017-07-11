<?php

require_once BLOG_ROOT . '/functions/db_functions.php' ;
require_once BLOG_ROOT . '/functions/utility_functions.php';


// Return page information
function get_blog_info($page){
    $DBblog = selectRecord("blogInfo", "page = '$page' AND backup = '0'");
    $result = $DBblog;

    return $result;
}

?>
