<?php 
session_start();
require_once 'db_connect.php';

if($_SESSION['role'] != 1) {
	header('location: http://localhost/supply/index.php');	
} 
?>