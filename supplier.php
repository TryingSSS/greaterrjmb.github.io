<?php require_once 'php_action/admin.php'; ?>
<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Manufacturer</li>
		</ol>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Manufacturer</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-primary button1" data-toggle="modal" data-target="#addSupplierModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add Manufacturer </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageSupplierTable">
					<thead>
						<tr>							
							<th>Manufacturer Name</th>
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

<div class="modal fade" id="addSupplierModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitSupplierForm" action="php_action/createSupplier.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Manufacturer</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-supplier-messages"></div>

	        <div class="form-group">
	        	<label for="supplierName" class="col-sm-3 control-label">Manufacturer Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="supplierName" placeholder="Name" name="supplierName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	<label for="supplierAddress" class="col-sm-3 control-label">Address</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
						<input type="text" class="form-control" id="supplierAddress" placeholder="Address" name="supplierAddress" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
			 <div class="form-group">
	        	<label for="supplierContactNumber" class="col-sm-3 control-label">Contact Number</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
						<input type="number" pattern = "[-+ \d()]*" class="form-control" id="supplierContactNumber" placeholder="Contact Number" name="supplierContactNumber" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createSupplierBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>
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

<!-- edit supplier -->
<div class="modal fade" id="editSupplierModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editSupplierForm" action="php_action/editSupplier.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Manufacturer</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-supplier-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-supplier-result">
		      	<div class="form-group">
		        	<label for="editSupplierName" class="col-sm-3 control-label">Manufacturer Name: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editSupplierName" placeholder="Supplier Name" name="editSupplierName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
         	        
				<div class="form-group">
					<label for="editSupplierAddress" class="col-sm-3 control-label">Address</label>
					<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="editSupplierAddress" placeholder="Address" name="editSupplierAddress" autocomplete="off">
						</div>
				</div> <!-- /form-group-->	 
				 <div class="form-group">
					<label for="editSupplierContactNumber" class="col-sm-3 control-label">Contact Number</label>
					<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<input type="number" pattern = "[-+ \d()]*" class="form-control" id="editSupplierContactNumber" placeholder="Contact Number" name="editSupplierContactNumber" autocomplete="off">
						</div>
				</div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /edit Supplier result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editSupplierFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-success" id="editSupplierBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
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
<!-- /edit Supplier -->

<!-- remove Supplier -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Manufacturer</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeSupplierFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeSupplierBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove supplier -->

<script src="custom/js/supplier.js?newversion"></script>

<?php require_once 'includes/footer.php'; ?>