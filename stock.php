<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Stock</li>
		</ol>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Stocks</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>		
				
				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-primary button1" data-toggle="modal" data-target="#addStockModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Stock </button>
				</div> <!-- /div-action -->		
				
				<table class="table" id="manageStockTable">
					<thead>
						<tr>						
							<th>Product Name</th>						
							<th>Quantity</th>
							<th>Manufacturer</th>
							<th>Status</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
	
    	<form class="form-horizontal" id="submitStockForm" action="php_action/addStock.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Stock</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-stock-messages"></div>    	           	       
			
	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				     <select type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" >
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT product_id, product_name FROM product WHERE status = 1 AND active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	      	  
	         
			 </div> <!-- /modal-body -->
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="addStockBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
		
     </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<div class="modal fade" id="editStockModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
	
    	<form class="form-horizontal" id="editStockForm" action="php_action/editStock.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Manage Stock</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="edit-stock-messages"></div>    	           	       
	
			<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
				<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
				<span class="sr-only">Loading...</span>
			</div>		      	
					
			 <div class="edit-stock-result">
			 
	       <div class="form-group">
	        	<label for="editproductName" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editproductName" placeholder="Product Name" name="editproductName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="stockStatus" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="stockStatus" name="stockStatus">
				      	<option value="">~~SELECT~~</option>
						<option value="0">None</option>
				      	<option value="1">Pending</option>
				      	<option value="2">Delivered</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	      	  
	      	
			  </div>         	        
		      <!-- /edit stock result -->
			  
		</div> <!-- /modal-body -->
	      <div class="modal-footer editStockFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="editStockBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
		
     </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dialog -->
</div>
<!-- / edit modal -->

<script src="custom/js/stock.js?v=23"></script>



<?php require_once 'includes/footer.php'; ?>