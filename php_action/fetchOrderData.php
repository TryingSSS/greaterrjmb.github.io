<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$valid = array('order' => array(), 'order_item' => array());

$sql = "SELECT order_id, delivery_status
		FROM orders 	
		WHERE orders.order_id = {$orderId}";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['order'] = $data;


$connect->close();

echo json_encode($valid);