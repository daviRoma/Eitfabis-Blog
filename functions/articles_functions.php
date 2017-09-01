<?php

require_once BLOG_ROOT . '/functions/comments_functions.php';



/* **************************  ARTICLES LIST  ***************************** */

// Retrieve information on the most recent articles.
function retrieve_recent($page_number, $page_limit){
    $error = "";
    $result = array();

    // recovery information articles according to the page
    if($page_number <= $page_limit){

        if($page_number == 1){
            $DBarticles = selectQuery(TAB_ARTICLES, "draft = 0", "date DESC LIMIT 0, 4");
        }else{
            $page_number = ($page_number - 1) * 4;
            $condition = $page_number . ", 4";
            $DBarticles = selectQuery(TAB_ARTICLES, "draft = 0", "date DESC LIMIT $condition");
        }
    }else {
        $error = "Page not found";
        return $error;
    }

    foreach($DBarticles as $article){
        $list_element = array();

        $list_element['id'] = $article['id'];
        $list_element['title'] = $article['title'];
        $list_element['subtitle'] = $article['subtitle'];
        $list_element['author'] = $article['author'];
        $list_element['date'] = date_format_uni($article['date']);
        $list_element['category'] = retrieve_category($article);
        $list_element['tags'] = retrieve_tag_list($article['id']);
        $list_element['comments'] = get_total_comments($article['id']);

        $result[] = $list_element;
    }

    return $result;
}


// Retrieves information on an article's category
function retrieve_category($article){
    $id = $article['id'];
    $query = selectJoin(TAB_ART_CAT, TAB_CATEGORIES, "category = id", "article = $id");
    if(count($query) > 0)
        $category = $query[0]['name'];

    return $category;
}


// Retrieves article's tags
function retrieve_tag_list($id){
    $tags = array();
    $DBtags = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "article = $id");

    if(count($DBtags) > 0){
        $i = 0;
        while($i < count($DBtags)){
            $tags[$i] = $DBtags[$i]['label'];
            $i++;
        }
    }
    return $tags;
}


/* ***************************  ARTICLE PAGE  ***************************** */

// Retrieve information of a selected article
function retrieve_article($id){
    $result = selectRecord(TAB_ARTICLES, "id = '$id'");
    $category = selectJoin(TAB_ART_CAT, TAB_CATEGORIES, "category = id", "article = $id");
    $new_date = date_format_uni($result['date']);

    $result['date'] = $new_date;
    $result['category'] = $category[0]['name'];
    $result['tags'] = retrieve_tag_list($id);
    $result['comments'] = get_total_comments($id);

    return $result;
}


// Retrieve pictures of a selected article
function retrieve_article_pictures($id){
    $query = selectJoin(TAB_ART_UPL, TAB_UPLOADS, "upload = id", "article = $id AND folder = 'post'");
    $pictures = array();

    $i = 0;
    while($i < count($query)){
        $pictures['img'.$i] = $query[$i]['file_address']."".$query[$i]['file_name'];
        $i++;
    }
    return $pictures;
}


/* ****************************** UTILITY ********************************* */

// Count and return the maximum page of Home-page
function get_page_limit($list){
    if(is_null($list)){
        $row = countRecord(TAB_ARTICLES, "draft = 0");
        $page = $row / 4;
    }else
        $row = count($list);

    $page = $row / 4;

    if($row % 4 == 0)
        return $page;
    else
        return substr($page+1, 0, 1);
}


// Divide a list of articles in multiple pages of 4 articles one.
function split_in_page($list, $page_number){
    $new_list = array();
    $start = ($page_number - 1) * 4;
    $end = $page_number * 4;
    $max = count($list);

    if($max >= $end){
        while($start < $end){
            $new_list[] = $list[$start];
            $start++;
        }
    }else{
        while($start < $max){
            $new_list[] = $list[$start];
            $start++;
        }
    }
    return $new_list;
}


// Get an articles array by a given list of articles
function assign_articles($articles){
    $list = array();

    foreach($articles as $article){
        $list_element = array();

        if(isset($article['tags']))
            $list_element['tags'] = $article['tags'];

        $list_element['id'] = $article['id'];
        $list_element['title'] = $article['title'];
        $list_element['subtitle'] = $article['subtitle'];
        $list_element['author'] = $article['author'];
        $list_element['date'] = $article['date'];
        $list_element['category'] = $article['category'];
        $list_element['comments'] = $article['comments'];

        $list[] = $list_element;
    }
    return $list;
}


// Retrieve titles of all articles
function retrieve_article_title($id){
    $result = array();
    $DBarticle = selectRecord(TAB_ARTICLES, "id = '$id' AND draft = 0");
    $result['id'] = $DBarticle['id'];
    $result['title'] = $DBarticle['title'];
    return $result;
}

?>
