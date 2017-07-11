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

// Return the current page index
function get_current_page(){
    if(isset($_GET['currentPage']))
          return $_GET['currentPage'];
    else
        return 1;
}

//Return the current url
function get_current_url() {
	$url  = 'http' . ($_SERVER['HTTPS'] == 'on' ? 's' : '') . '://'
		  . $_SERVER['SERVER_NAME']
		  . ($_SERVER['SERVER_PORT'] !== 80  ? ':' . $_SERVER['SERVER_PORT'] : '')
		  . $_SERVER['REQUEST_URI'];

	return $url;
}

?>
