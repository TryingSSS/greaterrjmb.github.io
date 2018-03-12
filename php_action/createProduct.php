<?php 	

require_once 'core.php';
require_once 'setHistory.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$productName 		= $_POST['productName'];
  // $productImage 	= $_POST['productImage'];
  $quantity 			= $_POST['quantity'];
  $rate 					= $_POST['rate'];
  $brandName 			= $_POST['brandName'];
  $categoryName 	= $_POST['categoryName'];
  $productStatus 	= $_POST['productStatus'];
  
   $supplierName = $_POST['supplierName'];
   $supplierPrice = $_POST['price'];
   $qty = $_POST['qty'];
   $qtyorder = $_POST['qtyorder'];

	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];		
	$url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
				
				$sql = "INSERT INTO product (product_name, product_image, brand_id, categories_id, supplier_id, quantity, rate, active, status) 
				VALUES ('$productName', '$url', '$brandName', '$categoryName','$supplierName', '$quantity', '$rate', '$productStatus', 1)";
				 
				 $sqlrecord = "INSERT INTO history (process, username, date_executed) VALUES ('Product Added: $productName', '$username', '$datetime')";
				 $connect->query($sqlrecord); 
 
				if($connect->query($sql) === TRUE) {
					$product_id = $connect->insert_id;
					
					$sqlItem = "INSERT INTO product_detail (product_id, supplier_id, price , quantity_limit, quantity_order)
					VALUES ('$product_id','$supplierName','$supplierPrice','$qty','$qtyorder')";
					$connect->query($sqlItem);		
				 
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST