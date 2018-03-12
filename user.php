<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'php_action/admin.php'; ?>
<?php require_once 'includes/header.php'; ?>



<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">User</li>
		</ol>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Users</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-primary button1" data-toggle="modal" id="addUserModalBtn" data-target="#addUserModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add User </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageUserTable">
					<thead>
						<tr>						
							<th>First Name</th>
							<th>Last Name</th>
							<th>Role</th>
							<th>Status</th>
							<th>Last Logged In</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitUserForm" action="php_action/createUser.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-user-messages"></div>  	           	       

	        <div class="form-group">
	        	<label for="firstname" class="col-sm-3 control-label">First Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

			 <div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label">Last Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="username" class="col-sm-3 control-label">Username: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="username" placeholder="Username" name="username" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="upassword" class="col-sm-3 control-label">Password</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control element" id="upassword" placeholder="Password" name="upassword" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	
			
			 <div class="form-group">
				 <label for="cpassword" class="col-sm-3 control-label">Confirm Password</label>
				 <label class="col-sm-1 control-label">: </label>
					 <div class="col-sm-8">
					       <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
						   <label id = "message"></label>
					    </div>
				
			</div> <!-- /form-group-->

			<div class="form-group">
				 <label for="uemail" class="col-sm-3 control-label">Email Address</label>
				 <label class="col-sm-1 control-label">: </label>
					 <div class="col-sm-8">
					       <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Email Address">
					    </div>
			</div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="role" class="col-sm-3 control-label">Role </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="role" name="role">
				      	<option value="">~~SELECT~~</option>
						<option value="1">Administrator</option>
						<option value="2">User</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			 <div class="form-group">
	        	<label for="status" class="col-sm-3 control-label">Status </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="status" name="status">
				      	<option value="">~~SELECT~~</option>
						<option value="1">Active</option>
						<option value="2">Block</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div>
</div> 
<!-- /add categories -->


<!-- edit user -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editUserForm" action="php_action/editUser.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Users</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-user-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-user-result">
		      	<div class="form-group">
		        	<label for="editUserRole" class="col-sm-3 control-label">Role: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <select class="form-control" id="editUserRole" name="editUserRole">
					      	<option value="1">Administrator</option>
					      	<option value="2">User</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editUserStatus" class="col-sm-3 control-label">Status: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <select class="form-control" id="editUserStatus" name="editUserStatus">
					      	<option value="1">Active</option>
					      	<option value="2">Block</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /edit user result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editUserFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-success" id="editUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /edit user -->

<!-- remove user -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove User</h4>
      </div>
      <div class="modal-body">

      	<div class="removeUserMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeUserFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeUserBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- / remove user-->

<script>
	$('#upassword, #cpassword').on('keyup', function () {
  if ($('#upassword').val() == $('#cpassword').val()) {
    $('#message').html('Password match').css('color', 'green');
  } else 
    $('#message').html('Password does not match').css('color', 'red');
});
</script>
<script src="custom/js/user.js?v=12"></script>

<?php require_once 'includes/footer.php'; ?>