<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$historyId = $_POST['historyId'];

if($historyId) { 

$sql = "Delete from history WHERE history_id = {$historyId}";

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