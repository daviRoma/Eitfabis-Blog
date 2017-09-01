<?php

// Check if the given fields are empty
function emptycheck($required){
    foreach($required as $attr) {
        if(empty($_POST[$attr]))
            $error .= $attr . ', ';
	}

	if(isset($error)) {
        $error = substr($error, 0, strlen($error)-2);
		return $error;
	}
	return false;
}

// Redirect to a specific page
function redirect($path, $condition){
    if(is_null($condition))
        $condition = true;

    if($condition) {
        header("location: $path");
        exit;
    }
}

// Convert all given date in a unique format date for the website
function date_format_uni($date){
    $day = substr($date, 8, 2);
 	$month = substr($date, 5, 2);
	$year = substr($date, 0, 4);

	switch ($month) {
		case '01' :	$month = "January"; break;
		case '02' :	$month = "February"; break;
       	case '03' :	$month = "March"; break;
	    case '04' :	$month = "April"; break;
	    case '05' :	$month = "May"; break;
		case '06' :	$month = "June"; break;
		case '07' :	$month = "July"; break;
	    case '08' :	$month = "August"; break;
		case '09' :	$month = "September"; break;
		case '10' :	$month = "October"; break;
		case '11' :	$month = "November"; break;
		case '12' :	$month = "December"; break;
	    default : break;
	}

	$date_convert = $month." ".$day.", ".$year;
	return $date_convert;
}


// Convert all given date in a unique format date for the dataTables
function date_format_table($date){
    $day = substr($date, 8, 2);
 	$month = substr($date, 5, 2);
	$year = substr($date, 0, 4);
    $hour_minute = substr($date, 11, 5);

    $date_convert = $day . "/" . $month . "/" . $year . " " . $hour_minute;
    return $date_convert;
}


// Return the current url
function get_current_url() {
	$url  = 'http' . ($_SERVER['HTTPS'] == 'on' ? 's' : '') . '://'
		  . $_SERVER['SERVER_NAME']
		  . ($_SERVER['SERVER_PORT'] !== 80  ? ':' . $_SERVER['SERVER_PORT'] : '')
		  . $_SERVER['REQUEST_URI'];

	return $url;
}


// Return the current page index
function get_current_page(){
    if(isset($_GET['currentPage']))
          return $_GET['currentPage'];
    else
        return 1;
}


// Count and return the total page of DataTables
function get_totalPage($row){
    $page = $row / 10;

    if($row % 10 == 0)
        return $page;
    else
        return substr($page+1, 0, 1);
}


// Return an array of all possible path to perform upload
function get_path_array(){
    $path = array();
    $path[0] = "upload/blog/background/";
    $path[1] = "upload/blog/category/";
    $path[2] = "upload/post/background/";
    $path[3] = "upload/post/pictures/";
    $path[4] = "upload/user/";
    return $path;
}

// Remove blank spaces and special characters
function field_validation($string){
    $finder = array(' ', 'à', 'è', 'é', 'ì', 'ò', 'ù', '*', '§', '#', '!', '?', '/', '%', ':', ';', ',', '&', '"', "'");
    for($i = 0; $i < count($finder); $i++){
        if(stristr($string, $finder[$i]))
            return false;
    }
    return true;
}

?>
