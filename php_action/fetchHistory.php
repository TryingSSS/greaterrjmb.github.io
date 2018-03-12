<?php 	

require_once 'core.php';

$sql = "SELECT history_id, process, username, date_executed FROM history ORDER BY date_executed DESC";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$historyId = $row[0];

 	$button = '<!-- Single button -->
	<div class="btn-group">
	 <a type="button" data-toggle="modal" data-target="#removeHistoryModal" onclick="removeHistory('.$historyId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a>       
	  </button>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 		
 		$row[2],
		$row[3],
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);