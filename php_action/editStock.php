<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$productName = $_POST['editproductName'];
	$stockStatus = $_POST['stockStatus']; 
	$productId =  $_POST['productId']; 

	$sql = "UPDATE product_detail SET deliveryStatus = '$stockStatus' WHERE product_id = '$productId'";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Stock Updated: $productName', '$username', '$datetime')";
	$connect->query($sqlrecord);
	
	if($stockStatus == 2)
	{	
		$updateProductQuantitySql = "SELECT product.quantity, product_detail.quantity_order 
									FROM product
									INNER JOIN product_detail ON product_detail.product_id = product.product_id
									WHERE product.product_id = '$productId'";
		$result = $connect->query($updateProductQuantitySql);

			if($result->num_rows > 0) { 
			$row = $result->fetch_array();
			} 
			$updateProductQuantityResult = $row[0];
			$updateQuantityAdded = $row[1];
			
		$updateQuantity = $updateProductQuantityResult + $updateQuantityAdded;		
  
		$sql = "UPDATE product SET quantity = '$updateQuantity' WHERE product_id = '$productId'";
		$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Quantity Added: $productName', '$username', '$datetime')";
	}
	
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