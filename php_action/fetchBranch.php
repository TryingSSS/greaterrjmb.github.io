<?php 	

require_once 'core.php';

$sql = "SELECT branch_id, branch_name, branch_address, branch_contact FROM branch";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 


 while($row = $result->fetch_array()) {
 	$branchId = $row[0];
 	// active 

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editbranchModel" onclick="editbranchs('.$branchId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removebranchs('.$branchId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
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