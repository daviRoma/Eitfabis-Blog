<?php

require_once BLOG_ROOT . '/functions/articles_functions.php';


/* *********************  Check the search type  ***************************** */

function select_search_method($method, $title, $category, $tag){
    switch($method){

        case 'title-category-tag' : $result = retrieve_by_all($title, $category, $tag); break;

        case 'title-category'     : $result = retrieve_by_title_category($title, $category); break;

        case 'title-tag'          : $result = retrieve_by_title_tag($title, $tag); break;

        case 'category-tag'       : $result = retrieve_by_category_tag($category, $tag); break;

        case 'title'    : $result = retrieve_by_title($title); break;

        case 'category' : $result = retrieve_by_category($category); break;

        case 'tag'      : $result = retrieve_by_tag($tag); break;

        default         : break;
    }

    return $result;
}


/* *********************  Search and retrieve articles  ***************************** */

// Search and return the articles by title, category and tag
function retrieve_by_all($title, $category, $tag){
    $result = array();
    $error = "";

    $list_1 = retrieve_by_title_tag($title, $tag);

    if(!is_string($list_1)){
        $list_2 = retrieve_by_category_tag($category, $tag);

        if(!is_string($list_2)){
            foreach($list_1 as $article_1){
                foreach($list_2 as $article_2){
                    if($article_1['id'] == $article_2['id'])
                        $result[] = $article_1;
                }
            }
        }else{
            $error = $list_2;
            return $error;
        }

    }else{
        $error = $list_1;
        return $error;
    }

    if(count($result) > 0)
        return $result;
    else
        $error = "No article found in \"$category\" with title \"$title\" and tag \"$tag\".";

    return $error;
}


// Search and return the articles by title and category
function retrieve_by_title_category($title, $category){
    $error = "";
    $result = array();

    // checks the articles membership to the category
    $DBarticles = selectJoin(TAB_ARTICLES, TAB_ART_CAT, "id = article", "category = '$category' ORDER BY date");

    if(count($DBarticles) > 0){
        foreach($DBarticles as $article){
            if(stristr($article['title'], $title))
                $result[] = retrieve_article($article['id']);
        }
    }else{
        $error = "Non-existing category \"$category\".";
        return $error;
    }

    if(count($result) > 0)
        return $result;
    else
        $error = "No article found with title \"$title\" in \"$category\".";

    return $error;
}


// Search and return the articles by title and tags
function retrieve_by_title_tag($title, $tag){
    $error = "";
    $result = array();
    $list_by_title = retrieve_by_title($title);

    if(!is_string($list_by_title)){
        $list_by_tag = retrieve_by_tag($tag);

        if(!is_string($list_by_tag)){
            foreach($list_by_title as $article_by_title){
                foreach ($list_by_tag as $article_by_tag){
                    if($article_by_title['id'] == $article_by_tag['id'])
                        $result[] = $article_by_title;
                }
            }
        }else{
            $error = $list_by_tag;
            return $error;
        }
    }else{
        $error = $list_by_title;
        return $error;
    }

    if(count($result) > 0)
        return $result;
    else
        $error = "No match found for \"$title\" title and \"$tag\" tag.";

    return $error;
}


// Search and return the articles by category and tag
function retrieve_by_category_tag($category, $tag){
    $error = "";
    $result = array();
    $list_by_category = retrieve_by_category($category);

    if(!is_string($list_by_category)){
        $list_by_tag = retrieve_by_tag($tag);

        if(!is_string($list_by_tag)){
            foreach ($list_by_category as $article_by_category){
                foreach ($list_by_tag as $article_by_tag){
                    if($article_by_category['id'] == $article_by_tag['id'])
                        $result[] = $article_by_category;
                }
            }
        }else{
            $error = $list_by_tag;
            return $error;
        }
    }else{
        $error = $list_by_category;
        return $error;
    }

    if(count($result) > 0)
        return $result;
    else
        $error = "No match found for \"$category\" category and \"$tag\" tag.";

    return $error;
}

// Search and return the articles only by title
function retrieve_by_title($title){
    $error = "";
    $result = array();
    $DBarticles = selectQuery(TAB_ARTICLES, "", "");

    foreach($DBarticles as $article){
        if(stristr($article['title'], $title))
            $result[] = retrieve_article($article['id']);
    }

    if(count($result) > 0)
        return $result;
    else
        $error = "No article found with title \"$title\".";

    return $error;
}


// Search and return the articles only by category
function retrieve_by_category($category){

    $error = "";
    $result = array();
    $DBarticles = selectQuery(TAB_ART_CAT, "category = '$category'", "article DESC");

    if(count($DBarticles) > 0){
        foreach($DBarticles as $article)
            $result[] = retrieve_article($article['article']);
    }else{
        $error = "Non-existing category: \"$category\".";
        return $error;
    }

    if(count($result) > 0)
        return $result;
    else
        $error = "No article found in " . $category . ". Empty section.";

    return $error;
}


// Search and return the articles only by tag
function retrieve_by_tag($tag){
    $error = "";
    $result = array();
    $tagList = explode("@", $tag);
    $total_tags = count($tagList);

    if($total_tags > 4){
        $error = "Only 3 contemporary tags!";
        return $error;
    }

    switch($total_tags){
        case 2  :
            $tag_1 = $tagList[1];
            $DBtags = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "label = '$tag_1'", "ORDER BY article DESC");

            if(count($DBtags) > 0){
                foreach($DBtags as $DBtag)
                    $result[] = retrieve_article($DBtag['article']);
            }else{
                $error = "No article found with tag: \"$tag_1\".";
                return $error;
            }
            return $result;
            break;

        case 3  :
            $tag_1 = $tagList[1];
            $tag_2 = $tagList[2];
            $DBtags_1 = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "label = '$tag_1'", "ORDER BY article DESC");

                    if(count($DBtags_1) > 0){
                        $DBtags_2 = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "label = '$tag_2'", "ORDER BY article DESC");

                        if(count($DBtags_2) > 0){
                            $i = 0;
                            $count = 0;

                            while($i < count($DBtags_1)){
                                $j = 0;
                                $flag = false;

                                while($j < count($DBtags_2) && !$flag){

                                    if($DBtags_1[$i]['article'] == $DBtags_2[$j]['article']){
                                        $result[] = retrieve_article($DBtags_1[$i]['article']);
                                        $flag = true;
                                        $count++;
                                    }
                                    $j++;
                                }
                                $i++;
                            }

                            if($count > 0){
                                return $result;
                            }else{
                                $error = "No article found with tags \"$tag_1\" and \"$tag_2\".";
                                return $error;
                            }

                        }else{
                            $error = "Non-existing tag: \"$tag_2\".";
                            return $error;
                        }
                    }else{
                        $error = "Non-existing tag: \"$tag_1\".";
                        return $error;
                    }
                    break;

        case 4  :
            $tag_1 = $tagList[1];
            $tag_2 = $tagList[2];
            $tag_3 = $tagList[3];
            $DBtags_1 = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "label = '$tag_1'", "ORDER BY article DESC");

            if(count($DBtags_1) > 0){
                $DBtags_2 = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "label = '$tag_2'", "ORDER BY article DESC");

                if(count($DBtags_2) > 0){
                    $DBtags_3 = selectJoin(TAB_ART_TAG, TAB_TAGS, "tag = id", "label = '$tag_3'", "ORDER BY article DESC");

                    if(count($DBtags_3) > 0){
                        $i = 0;
                        $count = 0;

                        while($i < count($DBtags_1)){
                            $j = 0;
                            $flag = false;

                            while($j < count($DBtags_2) && !$flag){
                                $k = 0;

                                while($k < count($DBtags_3) && !$flag){
                                    if($DBtags_1[$i]['article'] == $DBtags_2[$j]['article'] && $DBtags_1[$i]['article'] == $DBtags_3[$h]['article']){
                                        $result[] = retrieve_article($DBtags_1[$i]['article']);
                                        $flag = true;
                                        $count++;
                                    }
                                    $k++;
                                }
                                $j++;
                            }
                            $i++;
                        }

                        if($count > 0){
                            return $result;
                        }else{
                            $error = "No article found with tags: @\"$tag_1\" @\"$tag_2\" @\"$tag_3\".";
                            return $error;
                        }

                    }else{
                        $error = "Non-existing tag: \"$tag_3\".";
                    }

                }else{
                    $error = "Non-existing tag: \"$tag_2\".";
                    return $error;
                }

            }else{
                $error = "Non-existing tag: \"$tag_1\".";
                return $error;
            }
            break;

        default  :  break;
    }
}

?>
