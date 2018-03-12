<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

$userId = $_POST['userId'];
$userName = $_POST['username'];
 
if($userId) { 

 $sql = "Delete from users WHERE user_id = {$userId}";
 $sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('User Deleted: $userName', '$username', '$datetime')";
 $connect->query($sqlrecord); 

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST