<?php 	



require_once 'core.php';

$sql = "SELECT product.product_id, product.product_name, product.quantity, suppliers.supplier_name, product_detail.deliveryStatus
		FROM product
		INNER JOIN product_detail on product_detail.product_id = product.product_id
		INNER JOIN suppliers on suppliers.supplier_id = product.supplier_id
		WHERE product.quantity <= product_detail.quantity_limit && product.status = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$productId = $row[0];
 	if($row[4] == 1) {
 		// activate member
 		$active = "<label class='label label-info'>Pending</label>";
 	} else {
 		// deactivate member
 		$active = "<label class='label label-danger'>None</label>";
 	} // /else
 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editStockModal" onclick="editStock('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	  </ul>
	</div>';


	//$brand = $row[10];
	//$category = $row[11];
	$supplier = $row[3];
 	$output['data'][] = array( 		
 		// product name
 		$row[1], 
 		// quantity 
 		$row[2], 		 	
		$supplier,
 		// active
 		 $active,
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);