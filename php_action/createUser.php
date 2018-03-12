<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	  $firstName		= $_POST['firstname'];
	  $lastName 		= $_POST['lastname'];
	  $userName 		= $_POST['username'];
	  $userPassword		= md5($_POST['upassword']);
	  $userEmail 		= $_POST['uemail'];
	  $userRole			= $_POST['role'];
	  $userStatus 		= $_POST['status'];

	$sql = "INSERT INTO users (firstname, lastname, username, password, email, role, status) VALUES ('$firstName', '$lastName', 
								'$userName', '$userPassword','$userEmail','$userRole','$userStatus')";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('User Added: $userName', '$username', '$datetime')";
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