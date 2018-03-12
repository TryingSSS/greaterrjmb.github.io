<?php 	

require_once 'core.php';
require_once 'setHistory.php';


$valid['success'] = array('success' => false, 'messages' => array());

$productId = $_POST['productId'];
$productName = $_POST['productName'];

if($productId) { 

 $sql = "UPDATE product SET active = 2, status = 2 WHERE product_id = {$productId}";
 $sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Product Deleted: $productName', '$username', '$datetime')";
 $connect->query($sqlrecord); 
	
 if($connect->query($sql) === TRUE) {
 
	$sqlItem = "Update product_detail SET status = 2 WHERE product_id = {$productId}";
	$connect->query($sqlItem);
	
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST