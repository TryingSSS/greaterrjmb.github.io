<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

$categoriesId = $_POST['categoriesId'];
$categoriesName = $_POST['categoriesName'];

if($categoriesId) { 

 $sql = "UPDATE categories SET categories_status = 2 WHERE categories_id = {$categoriesId}";
 $sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Category Deleted: $categoriesName', '$username', '$datetime')";
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