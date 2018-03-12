<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$role = $_POST['editUserRole'];
	$status = $_POST['editUserStatus']; 
	$userId = $_POST['userId'];

	$sql = "UPDATE users SET role = '$role', status = '$status' WHERE user_id = '$userId'";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('User Updated', '$username', '$datetime')";
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