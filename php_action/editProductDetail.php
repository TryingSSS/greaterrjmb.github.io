<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$supplierName = $_POST['editsupplierName'];
	$supplierPrice 	= $_POST['editprice'];
	$qty	= $_POST['editqty'];
	$qtyorder = $_POST['editqtyorder'];

				
	$sql = "UPDATE product_detail SET supplier_id = '$supplierName', quantity_limit = '$qty', price = '$supplierPrice' , quantity_order = '$qtyorder' WHERE product_id = $productId ";
	$sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Product Updated:', '$username', '$datetime')";
	$connect->query($sqlrecord); 
				 
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
