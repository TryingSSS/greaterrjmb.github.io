<?php 

require_once 'core.php';

if($_POST) {

	$supplierName = $_POST['supplierName']; 
	
	$sql = "SELECT product.product_name, product_detail.price, product_detail.quantity_order, suppliers.supplier_name, suppliers.supplier_address, suppliers.supplier_contact
			FROM product
			INNER JOIN product_detail on product_detail.product_id = product.product_id
			INNER JOIN suppliers on suppliers.supplier_id = product.supplier_id
			WHERE product.quantity <= product_detail.quantity_limit && product_detail.supplier_id = '$supplierName' && product.status = 1 ";
	
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	$table = '
	
	<p></p>
	<h3> Greater RJ Appliance and Trading Corporation </h3>
	<p> Address: Surallah, South Cotabato</p>
	<p> Contact Number: 223-4567 </p>
	<p>__________________________________________________________________________________________<p>
	
	<h4>Supplier Details</h4>
	<p> Supplier Name:  <b>'.$result['supplier_name'].' </b> </p>
	<p> Address: <b>'.$result['supplier_address'].' </b></p>
	<p> Contact Number: <b>'.$result['supplier_contact'].'</b> </p>
	
	
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%; ">
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total</th>
		</tr>
		
		<tr>';
		$query = $connect->query($sql);
		$totalAmount = "";
		$subTotal="";
		$grandTotal = "";
		while ($result = $query->fetch_assoc()) {
			$totalAmount = $result['price'] * $result['quantity_order'] ;
			$table .= '<tr>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['quantity_order'].'</center></td>
				<td><center>'.$result['price'].'</center></td>
				<td><center>'.$totalAmount.'</center></td>
			</tr>';				
				$subTotal += $totalAmount;
		}
		$grandTotal = $subTotal;
		
		$table .= '
		</tr>
		<tr>
			<td colspan="2"></td>
			<td><center>TOTAL</center></td>
			<td><center>'.$grandTotal.'</center></td>
		</tr>
	</table>
	
	<div style="position: fixed; bottom: 5px; right:30px;  text-align: right; width: 100%;  ">
			<p>____________________________</p>
			<h5>   Authorized Person</h5>
	
    </div>
	
	
	';	
	
	

	echo $table;
	
	

}

?>