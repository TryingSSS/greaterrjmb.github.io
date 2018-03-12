<?php 	

require_once 'core.php';

$sql = "SELECT user_id, firstname, lastname,username,password,email, role, status, last_log_date FROM users";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 


 while($row = $result->fetch_array()) {
 	$userId = $row[0];
 	// active 
 	if($row[7] == 1) {
 		// activate member
 		$userStatus = "<label class='label label-success'>Active</label>";
 	} else {
 		// deactivate member
 		$userStatus = "<label class='label label-danger'>Block</label>";
 	}
	
	if($row[6] == 1) {
 		// activate member
 		$userRole = "<label class='label label-success'>Administrator</label>";
 	} else {
 		// deactivate member
 		$userRole= "<label class='label label-info'>User</label>";
 	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editUserModal" onclick="editUser('.$userId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeUserModal" onclick="removeUser('.$userId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 
		$row[2],		
 		$userRole,
		$userStatus,
		$row[8],
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);