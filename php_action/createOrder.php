<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');
// print_r($valid);
if($_POST) {	
  $orderDate 					= date('Y-m-d', strtotime($_POST['orderDate']));	
  $branchName 					= $_POST['clientName'];
  
  $sqlname = "SELECT branch.branch_name FROM orders 
				INNER JOIN branch ON orders.branch_name = branch.branch_id
				WHERE order_id = {$branchName}";
	$result = $connect->query($sqlname);
	$row = $result->fetch_array();
	$branch = $row[0];
				
	$sql = "INSERT INTO orders (order_date, branch_name,order_status, delivery_status) VALUES ('$orderDate', '$branchName',1,1)";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Added delivery : Branch= $branch,'$username', '$datetime')";
	$connect->query($sqlrecord);
	
	$order_id;
	$orderStatus = false;
	if($connect->query($sql) === true) {
		$order_id = $connect->insert_id;
		$valid['order_id'] = $order_id;	
		$orderStatus = true;
	}


		
	// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);
		
		
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			//$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
				// update product table
			//	$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
			//	$connect->query($updateProductTable);

				// add into order_item
				$orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, order_item_status) 
				VALUES ('$order_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', 1)";
	
				$connect->query($orderItemSql);		

				if($x == count($_POST['productName'])) {
					$orderItemStatus = true;
				}		
		} // while	
	} // /for quantity

	$valid['success'] = true;
	$valid['messages'] = "Successfully Added";		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);