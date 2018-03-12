<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

$branchId = $_POST['branchId'];
$branchName = $_POST['branchName'];

if($branchId) { 

 $sql = "Delete from branch WHERE branch_id = {$branchId}";
 $sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('branch Deleted: $branchName', '$username', '$datetime')";
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