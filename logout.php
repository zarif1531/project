<?php
// This PHP code is destroying the current session and redirecting the user to the index.html page.
session_start();
$_SESSION = array();
session_destroy();
header('location:index.html')
 ?>
