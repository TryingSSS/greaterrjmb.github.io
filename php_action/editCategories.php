<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$categoriesName = $_POST['editCategoriesName'];
	$categoriesStatus = $_POST['editCategoriesStatus']; 
	$categoriesId = $_POST['editCategoriesId'];

	$sql = "UPDATE categories SET categories_name = '$categoriesName', categories_active = '$categoriesStatus' WHERE categories_id = '$categoriesId'";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Category Updated: $categoriesName', '$username', '$datetime')";
	$connect->query($sqlrecord);
	
	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the categories";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST