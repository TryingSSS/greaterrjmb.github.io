<?php 	

require_once 'core.php';

$productId = $_POST['productId'];

$sql = "SELECT product.product_id, product.product_name, product.product_image, product.brand_id, product.categories_id, product.supplier_id, product.quantity, product.rate, product.active, product.status, product_detail.price, product_detail.quantity_limit, product_detail.quantity_order
FROM product
INNER JOIN product_detail ON product_detail.product_id = product.product_id
WHERE product.product_id = $productId";
 
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);