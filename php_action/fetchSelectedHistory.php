<?php 	

require_once 'core.php';

$historyId = $_POST['historyId'];

$sql = "SELECT history_id, process, username, date_executed FROM history WHERE history_id = $historyId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);