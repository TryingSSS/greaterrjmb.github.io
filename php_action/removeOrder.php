<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

$orderId = $_POST['orderId'];

  $sqlname = "SELECT branch.branch_name FROM orders 
				INNER JOIN branch ON orders.branch_name = branch.branch_id
				WHERE order_id = {$orderId}";
	$result = $connect->query($sqlname);
	$row = $result->fetch_array();
	$branch = $row[0];


if($orderId) { 

 $sql = "UPDATE orders SET order_status = 2 WHERE order_id = {$orderId}";
 $sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Deleted Delivery: Name = $branch, '$username', '$datetime')";
 $connect->query($sqlrecord); 

 $orderItem = "UPDATE order_item SET order_item_status = 2 WHERE  order_id = {$orderId}";

 if($connect->query($sql) === TRUE && $connect->query($orderItem) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST