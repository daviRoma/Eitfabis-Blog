<?php

require_once _ROOT . '/admin/functions/db_functions.php';
require_once _ROOT . '/admin/functions/utility_functions.php';


// Get a single user without additional information
function get_user($id){
    $user = selectRecord(TAB_USERS, "id = $id");
    return $user;
}

// Get all information about logged user
function get_userProfile($id){
    $info = selectRecord(TAB_PERSONALINFO, "user = $id");
    $user = selectRecord(TAB_USERS, "id = $id");

    $result['id'] = $info['id'];
    $result['country'] = $info['country'];
    $result['employment'] = $info['employment'];
    $result['brief_description'] = $info['brief_description'];
    $links = explode("[]", $info['link']);
    array_pop($links);
    $result['link'] = $links;
    $result['img_address'] = $info['img_address'];
    $result['email'] = $user['email'];
    return $result;
}

// Get own user avatar
function get_userAvatar($id){
    $query = selectRecord(TAB_PERSONALINFO, "id = $id");
    if($query['img_address'] == "upload/user/user-default.png"){
        return _ROOT . "/" . $query['img_address'];
    }else{
        return false;
    }
}

// Get own user articles
function get_userArticles($username){
    $result = array();
    $i = 0;

    $articles = selectQuery(TAB_ARTICLES, "author = '$username'", "date DESC LIMIT 10");
    foreach($articles as $article){
        $id = $article['id'];
        $category = selectRecord(TAB_ART_CAT, "article = $id");
        $tags = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "article = $id");
        $result[$i]['id'] = $article['id'];
        $result[$i]['title'] = substr($article['title'], 0, 30) . "..";
        $result[$i]['date'] = substr($article['date'], 0, 10);
        $result[$i]['category'] = $category['category'];
        foreach($tags as $tag) {
            $result[$i]['tags'] .= "|" . $tag['label'] ."|";
        }
        $i++;
    }
    return $result;
}

?>
