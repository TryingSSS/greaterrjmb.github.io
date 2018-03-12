<?php require_once 'php_action/admin.php'; ?>
<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Branches</li>
		</ol>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Branches</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-primary button1" data-toggle="modal" data-target="#addbranchModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add branch </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="managebranchTable">
					<thead>
						<tr>							
							<th>Branches Name</th>
							<th>Address</th>
							<th>Contact Number</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addbranchModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitbranchForm" action="php_action/createBranch.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Branches</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-branch-messages"></div>

	        <div class="form-group">
	        	<label for="branchName" class="col-sm-3 control-label">Branches Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="branchName" placeholder="Name" name="branchName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	<label for="branchAddress" class="col-sm-3 control-label">Address</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
						<input type="text" class="form-control" id="branchAddress" placeholder="Address" name="branchAddress" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
			 <div class="form-group">
	        	<label for="branchContactNumber" class="col-sm-3 control-label">Contact Number</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
						<input type="number" pattern = "[-+ \d()]*" class="form-control" id="branchContactNumber" placeholder="Contact Number" name="branchContactNumber" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createbranchBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- edit branch -->
<div class="modal fade" id="editbranchModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editbranchForm" action="php_action/editbranch.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit branch</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-branch-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-branch-result">
		      	<div class="form-group">
		        	<label for="editbranchName" class="col-sm-3 control-label">Branch Name: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editbranchName" placeholder="branch Name" name="editbranchName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
         	        
				<div class="form-group">
					<label for="editbranchAddress" class="col-sm-3 control-label">Address</label>
					<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="editbranchAddress" placeholder="Address" name="editbranchAddress" autocomplete="off">
						</div>
				</div> <!-- /form-group-->	 
				 <div class="form-group">
					<label for="editbranchContactNumber" class="col-sm-3 control-label">Contact Number</label>
					<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<input type="number" pattern = "[-+ \d()]*" class="form-control" id="editbranchContactNumber" placeholder="Contact Number" name="editbranchContactNumber" autocomplete="off">
						</div>
				</div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /edit branch result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editbranchFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-success" id="editbranchBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit branch -->

<!-- remove branch -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove branch</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removebranchFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removebranchBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove branch -->

<script src="custom/js/branch.js?newversion"></script>

<?php require_once 'includes/footer.php'; ?>