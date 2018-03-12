<?php 	

require_once 'core.php';

$branchId = $_POST['branchId'];

$sql = "SELECT branch_id, branch_name, branch_address, branch_contact FROM branch WHERE branch_id = $branchId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);