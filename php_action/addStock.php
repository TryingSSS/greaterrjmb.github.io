<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

  $productName 		= $_POST['productName'];
  $quantity 		= $_POST['quantity'];

  $updateProductQuantitySql = "SELECT quantity FROM product WHERE product_id = '$productName'";
  $result = $connect->query($updateProductQuantitySql);
  $row = $result->fetch_array();
  $updateProductQuantityResult = $row[0];
  $updateQuantity = $updateProductQuantityResult + $quantity;		
  
	$sql = "UPDATE product SET quantity = '$updateQuantity' WHERE product_id = '$productName'";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Quantity Added: $productName', '$username', '$datetime')";
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