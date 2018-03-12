<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$branchName = $_POST['branchName'];
	$branchAddress = $_POST['branchAddress'];
	$branchContactNumber = $_POST['branchContactNumber'];   

	$sql = "INSERT INTO branch (branch_name, branch_address, branch_contact) VALUES ('$branchName', '$branchAddress', '$branchContactNumber')";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('branch Added: $branchName', '$username', '$datetime')";
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