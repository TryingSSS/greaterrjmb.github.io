<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$supplierName = $_POST['editSupplierName'];
	$supplierAddress = $_POST['editSupplierAddress'];
	$supplierContactNumber = $_POST['editSupplierContactNumber'];  
	$supplierId = $_POST['supplierId'];

	$sql = "UPDATE suppliers SET supplier_name = '$supplierName', supplier_address = '$supplierAddress' , supplier_contact = '$supplierContactNumber' WHERE supplier_id = '$supplierId'";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Supplier Updated: $supplierName', '$username', '$datetime')";
	$connect->query($sqlrecord);
	
	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST