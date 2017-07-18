<?php

require_once BLOG_ROOT . '/functions/search_functions.php';


/* ******************************  CATEGORY  ****************************** */

// Retrieve all categories by name
function retrieve_categories(){
    $result = selectQuery(TAB_CATEGORIES, "", "name ASC");
    return $result;
}


// Retrieve category information by name
function category_by_name($name){
    $result = selectRecord(TAB_CATEGORIES, "name = '$name'");
    return $result;
}


// Retrieve articles by page
function list_by_category($category, $page_number){
    $DBarticles = retrieve_by_category($category);
    $result = array();

    // recovery information articles according to the page
    if($page_number == 1){
        if(count($DBarticles) < 4){
            foreach($DBarticles as $article)
                $result[] = $article;
        }else{
            $count = 0;
            while($count < 4){
                $result[] = $DBarticles[$count];
                $count++;
            }
        }
    }else{
        $start = ($page_number - 1) * 4;
        $end = $page_number * 4;
        $max = count($DBarticles);

        if($max >= $end){
            while($start < $end){
                $result[] = $DBarticles[$start];
                $start++;
            }
        }else{
            while($start < $max){
                $result[] = $DBarticles[$start];
                $start++;
            }
        }
    }
    return $result;
}


/* *********************************  TAG  ******************************** */

// Get all tags
function retrieve_all_tags(){
    $tags = selectQuery(TAB_TAGS, "", "label ASC");
    return $tags;
}


// Retrieve tag by label
function tag_by_name($name){
    $result = selectRecord(TAB_TAGS, "label = '$name'");
    return $result;
}


// Retrieve first 32 tags by page
function retrieve_tags($page_number){
    $result = array();

    if($page_number == 1){
        $DBtags = selectQuery(TAB_TAGS, "", "label ASC LIMIT 0, 36");
    }else{
        $page_number = ($page_number - 1) * 36;
        $condition = $page_number . ", 36";
        $DBtags = selectQuery(TAB_TAGS, "", "label ASC LIMIT $condition");
    }

    foreach($DBtags as $tag) {
        $result[] = $tag;
    }
    return $result;
}


// Retrieve articles list by tag
function list_by_tag($tag, $page_number){
    $DBarticlesId = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "label = '$tag'", "ORDER BY article DESC");
    $result = array();

    if($page_number == 1){
        if(count($DBarticlesId) < 4){
            foreach($DBarticlesId as $articleId)
                $result[] = retrieve_article($articleId['article']);
        }else{
            $count = 0;
            while($count < 4){
                $result[] = retrieve_article($DBarticlesId[$count]['article']);
                $count++;
            }
        }
    }else{
        $start = ($page_number - 1) * 4;
        $end = $page_number * 4;
        $max = count($DBarticlesId);

        if($max >= $end){
            while($start < $end){
                $result[] = retrieve_article($DBarticles[$start]['article']);
                $start++;
            }
        }else{
            while($start < $max){
                $result[] = retrieve_article($DBarticles[$start]['article']);
                $start++;
            }
        }
    }
    return $result;
}


/* ****************************** UTILITY ********************************** */

// Call the correct method for articles navigation
function list_by_option($option, $name, $page){
    if($option == "category")
        return list_by_category($name, $page);
    if($option == "tag")
        return list_by_tag($name, $page);
}


// Returns the total number of pages of the articles found by category or tag.
function get_total_page($name, $section){
    if($section == "category"){
        $row = countRecord(TAB_ART_CAT, "category = '$name'");
    }

    if($section == "tag"){
        $DBtag = selectRecord(TAB_TAGS, "label = '$name'");
        $tagId = $DBtag['id'];
        $row = countRecord(TAB_ART_TAG, "tag = '$tagId'");
    }

    $page = $row / 4;

    if($row % 4 == 0)
        return $page;
    else
        return substr($page + 1, 0, 1);
}


// Returns the total numbero of pages of tags
function get_tag_page(){
    $elements = countRecord(TAB_TAGS, "", "");
    $page = $elements / 32;

    if($elements % 32 == 0)
        return $page;
    else
        return substr($page+1, 0, 1);
}

?>
