<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
  $orderId 					= $_POST['orderId'];
  $paymentStatus 		= $_POST['paymentStatus'];  

	$sqlname = "SELECT branch.branch_name FROM orders 
				INNER JOIN branch ON orders.branch_name = branch.branch_id
				WHERE order_id = {$orderId}";
	$result = $connect->query($sqlname);
	$row = $result->fetch_array();
	$clientName = $row[0];
	
	$sql = "UPDATE orders SET delivery_status = '$paymentStatus' WHERE order_id = {$orderId}";
	$sqlrecord = "INSERT INTO history (process, username , date_executed) VALUES ('Delivery Status Updated: Branch: $clientName, '$username', '$datetime')";
	$connect->query($sqlrecord);
	
	if ($paymentStatus == 2){
		$ProductQuantitySql = "SELECT quantity , product_id FROM order_item WHERE order_id = '".$orderId."'";
		$QuantityData = $connect->query($ProductQuantitySql);
				
		while ($QuantityResult = $QuantityData->fetch_row()) {
			
				$productId = $QuantityResult[1];
				$productQuantity = $QuantityResult[0];
				
				$updateProductQuantitySql = "SELECT quantity FROM product WHERE product_id = '$productId' ";
				$result = $connect->query($updateProductQuantitySql);
				$row = $result->fetch_array(); 
				$QTY = $row[0];
				
			 $updateQuantity = $QTY - $productQuantity;							
				//update product table
				$updateProductTable = "UPDATE product SET quantity = '$updateQuantity' WHERE product_id = '$productId'";
				$connect->query($updateProductTable);		
		} // while	
	 // /for quantity
	}else if ($paymentStatus == 3)
	{
		$ProductQuantitySql = "SELECT quantity , product_id FROM order_item WHERE order_id = '".$orderId."'";
		$QuantityData = $connect->query($ProductQuantitySql);
				
		while ($QuantityResult = $QuantityData->fetch_row()) {
			
				$productId = $QuantityResult[1];
				$productQuantity = $QuantityResult[0];
				
				$updateProductQuantitySql = "SELECT quantity FROM product WHERE product_id = '$productId' ";
				$result = $connect->query($updateProductQuantitySql);
				$row = $result->fetch_array(); 
				$QTY = $row[0];
				
			 $updateQuantity = $QTY + $productQuantity;							
				//update product table
				$updateProductTable = "UPDATE product SET quantity = '$updateQuantity' WHERE product_id = '$productId'";
				$connect->query($updateProductTable);		
		} // while	
		
	}
	
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}	
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST