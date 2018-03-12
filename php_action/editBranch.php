<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$branchName = $_POST['editbranchName'];
	$branchAddress = $_POST['editbranchAddress'];
	$branchContactNumber = $_POST['editbranchContactNumber'];  
	$branchId = $_POST['branchId'];

	$sql = "UPDATE branch SET branch_name = '$branchName', branch_address = '$branchAddress' , branch_contact = '$branchContactNumber' WHERE branch_id = '$branchId'";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('branch Updated: $branchName', '$username', '$datetime')";
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