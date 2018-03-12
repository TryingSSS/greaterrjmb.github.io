<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>Supplier Order Report
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getSupplierOrderReport.php" method="post" id="getOrderReportForm">
				 
				 <div class="form-group">
					<label for="supplierName" class="col-sm-2 control-label">Supplier Name: </label>
						<div class="col-sm-10">
						  <select type="text" class="form-control" id="supplierName" placeholder="Supplier Name" name="supplierName" >
							<option value="">~~SELECT~~</option>
							<?php 
							$sql = "SELECT supplier_id, supplier_name FROM suppliers";
									$result = $connect->query($sql);

									while($row = $result->fetch_array()) {
										echo "<option value='".$row[0]."'>".$row[1]."</option>";
									} // while
									
							?>
						  </select>
						</div>
				</div> <!-- /form-group-->
				 
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
<!-- /row -->

<script src="custom/js/purchase.js"></script>

<?php require_once 'includes/footer.php'; ?>