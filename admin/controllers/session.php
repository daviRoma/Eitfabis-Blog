<?php

session_start();

$inactive = 900; 		//time-out:15m (in seconds)

// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
    // calculate the session's "time to live"
    $sessionTTL = time() - $_SESSION["timeout"];
	if ($sessionTTL > $inactive) {
        session_destroy();
        header("location: login.php");
    }
}

$_SESSION["timeout"] = time();

if(!isset($_SESSION['username'])){
	header("location: login.php");
}

?>
