<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");

	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	
	$sql = "SELECT orders.order_id, orders.order_date, orders.delivery_status, branch.branch_name, branch.branch_contact
			FROM orders
			INNER JOIN branch ON orders.branch_name = branch.branch_id
			WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and delivery_status = 2
			ORDER BY branch.branch_name";
	$query = $connect->query($sql);

	$table = '
	<h4>DELIVERY SUMMARY<h4>
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Order Date</th>
			<th>Branch Name</th>
			<th>Contact</th>
		</tr>

		<tr>';

		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['branch_name'].'</center></td>
				<td><center>'.$result['branch_contact'].'</center></td>
			</tr>';	
		}
		$table .= '
		</tr>

	</table>
	';	

	echo $table;

	
	$sqlitem = "SELECT orders.order_date, branch.branch_name, branch.branch_contact, product.product_name, order_item.quantity 
				FROM orders 
				INNER JOIN branch ON orders.branch_name = branch.branch_id 
				INNER JOIN order_item ON orders.order_id = order_item.order_id 
				INNER JOIN product ON product.product_id = order_item.product_id 
				WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and delivery_status = 2
				ORDER BY orders.order_date";
				
	$queryitem = $connect->query($sqlitem);
	
	$table = '
	</br>
	<h4>DELIVERY DETAILS<h4>
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Date</th>
			<th>Branch Name</th>
			<th>Contact</th>
			<th>Product</th>
			<th>Quantity</th>
		</tr>

		<tr>';
		while ($result = $queryitem->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['branch_name'].'</center></td>
				<td><center>'.$result['branch_contact'].'</center></td>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
			</tr>';	
		}
		$table .= '
		</tr>

	</table>
	';	

	echo $table;

}

?>