<?php 

require_once 'php_action/core.php';
require_once 'php_action/setHistory.php';

$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('User Logged Out: $username', '$username', '$datetime')";
				 $connect->query($sqlrecord); 
				 
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header('location: http://localhost/supply/index.php');

?>