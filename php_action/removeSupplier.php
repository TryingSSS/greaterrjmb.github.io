<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

$supplierId = $_POST['supplierId'];
$supplierName = $_POST['supplierName'];

if($supplierId) { 

 $sql = "Delete from suppliers WHERE supplier_id = {$supplierId}";
 $sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Supplier Deleted: $supplierName', '$username', '$datetime')";
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