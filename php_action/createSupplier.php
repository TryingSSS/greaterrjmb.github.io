<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$supplierName = $_POST['supplierName'];
	$supplierAddress = $_POST['supplierAddress'];
	$supplierContactNumber = $_POST['supplierContactNumber'];   

	$sql = "INSERT INTO suppliers (supplier_name, supplier_address, supplier_contact) VALUES ('$supplierName', '$supplierAddress', '$supplierContactNumber')";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Supplier Added: $supplierName', '$username', '$datetime')";
	$connect->query($sqlrecord);
	
	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST