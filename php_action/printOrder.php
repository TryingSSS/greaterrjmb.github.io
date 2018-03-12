<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT orders.order_id, orders.order_date, orders.delivery_status, branch.branch_name, branch.branch_contact
		FROM orders
		INNER JOIN branch ON orders.branch_name = branch.branch_id
		WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[1];
$branchName = $orderData[3];
$branchContact = $orderData[4]; 
$status = $orderData[2];


$orderItemSql = "SELECT order_item.product_id, order_item.quantity,
product.product_name FROM order_item
	INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

 $table = '
 <table border="1" cellspacing="0" cellpadding="20" width="100%">
	<thead>
		<tr >
			<th colspan="5">

			<center>
				Order Date : '.$orderDate.'
				<center>Branch Name : '.$branchName.'</center>
				Contact : '.$branchContact.'
			</center>		
			</th>
				
		</tr>		
	</thead>
</table>
<table border="0" width="100%;" cellpadding="5" style="border:1px solid black;border-top-style:1px solid black;border-bottom-style:1px solid black;">

	<tbody>
		<tr>
			<th>S.no</th>
			<th>Product</th>
			<th>Quantity</th>
		</tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '<tr>
				<th>'.$x.'</th>
				<th>'.$row[2].'</th>
				<th>'.$row[1].'</th>
			</tr>
			';
		$x++;
		} // /while

		$table .= '<tr>
			<th></th>
		</tr>

		<tr>
			<th></th>
		</tr>

	</tbody>
</table>
 ';


$connect->close();

echo $table;