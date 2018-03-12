<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$brandName = $_POST['editBrandName'];
	$brandStatus = $_POST['editBrandStatus']; 
	$brandId = $_POST['brandId'];

	$sql = "UPDATE brands SET brand_name = '$brandName', brand_active = '$brandStatus' WHERE brand_id = '$brandId'";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Brand Updated: $brandName', '$username', '$datetime')";
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