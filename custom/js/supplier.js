var manageSupplierTable;

$(document).ready(function() {
	// top bar active
	$('#navSupplier').addClass('active');
	
	// manage supplier table
	manageSupplierTable = $("#manageSupplierTable").DataTable({
		'ajax': 'php_action/fetchSupplier.php',
		'order': []		
	});

	// submit supplier form function
	$("#submitSupplierForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var supplierName = $("#supplierName").val();
		var supplierAddress = $("#supplierAddress").val();
		var supplierContactNumber = $("#supplierContactNumber").val();

		if(supplierName == "") {
			$("#supplierName").after('<p class="text-danger">Supplier Name field is required</p>');
			$('#supplierName').closest('.form-group').addClass('has-error');
		} else {
			// remove error text field
			$("#supplierName").find('.text-danger').remove();
			// success out for form 
			$("#supplierName").closest('.form-group').addClass('has-success');	  	
		}
		
		if(supplierAddress == "") {
			$("#supplierAddress").after('<p class="text-danger">Address field is required</p>');
			$('#supplierAddress').closest('.form-group').addClass('has-error');
		} else {
			// remove error text field
			$("#supplierAddress").find('.text-danger').remove();
			// success out for form 
			$("#supplierAddress").closest('.form-group').addClass('has-success');	  	
		}
		
		if(supplierContactNumber == "") {
			$("#supplierContactNumber").after('<p class="text-danger">Contact Number field is required</p>');
			$('#supplierContactNumber').closest('.form-group').addClass('has-error');
		} else {
			// remove error text field
			$("#supplierContactNumber").find('.text-danger').remove();
			// success out for form 
			$("#supplierContactNumber").closest('.form-group').addClass('has-success');	  	
		}

		if(supplierName && supplierAddress && supplierContactNumber) {
			var form = $(this);
			// button loading
			$("#createSupplierBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createSupplierBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageSupplierTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitSupplierForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-supplier-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if

				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit supplier form function

});

function editSuppliers(supplierId = null) {
	if(supplierId) {
		// remove hidden supplier id text
		$('#supplierId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-supplier-result').addClass('div-hide');
		// modal footer
		$('.editSupplierFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedSupplier.php',
			type: 'post',
			data: {supplierId : supplierId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-supplier-result').removeClass('div-hide');
				// modal footer
				$('.editSupplierFooter').removeClass('div-hide');

				// setting the supplier name value 
				$('#editSupplierName').val(response.supplier_name);
				// setting the supplier address value
				$('#editSupplierAddress').val(response.supplier_address);
				// setting the supplier contact number value
				$('#editSupplierContactNumber').val(response.supplier_contact);
				// supplier id 
				$(".editSupplierFooter").after('<input type="hidden" name="supplierId" id="supplierId" value="'+response.supplier_id+'" />');

				// update supplier form 
				$('#editSupplierForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var supplierName = $('#editSupplierName').val();
					var supplierAddress = $('#editSupplierAddress').val();
					var supplierContactNumber = $('#editSupplierContactNumber').val();
					
					if(supplierName == "") {
						$("#editSupplierName").after('<p class="text-danger">Supplier Name field is required</p>');
						$('#editSupplierName').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editSupplierName").find('.text-danger').remove();
						// success out for form 
						$("#editSupplierName").closest('.form-group').addClass('has-success');	  	
					}

					if(supplierAddress == "") {
						$("#editSupplierAddress").after('<p class="text-danger">Address field is required</p>');
						$('#editSupplierAddress').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editSupplierAddress").find('.text-danger').remove();
						// success out for form 
						$("#editSupplierAddress").closest('.form-group').addClass('has-success');	  	
					}
					
					if(supplierContactNumber == "") {
						$("#editSupplierContactNumber").after('<p class="text-danger">Contact Number field is required</p>');
						$('#editSupplierContactNumber').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editSupplierContactNumber").find('.text-danger').remove();
						// success out for form 
						$("#editSupplierContactNumber").closest('.form-group').addClass('has-success');	  	
					}

					if(supplierName && supplierAddress && supplierContactNumber) {
						var form = $(this);
						// submit btn
						$('#editSupplierBtn').button('loading');
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
							
								if(response.success == true) {
									
									// submit btn
									$('#editSupplierBtn').button('reset');

									// reload the manage member table 
									manageSupplierTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-supplier-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if								
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update supplier form

			} // /success
		}); // ajax function

	} else {
		
		alert('error!! Refresh the page again');
	}
} // /edit suppliers function

function removeSuppliers(supplierId = null) {
	if(supplierId) {
		$('#removeSupplierId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedSupplier.php',
			type: 'post',
			data: {supplierId : supplierId},
			dataType: 'json',
			success:function(response) {
				$('.removeSupplierFooter').after('<input type="hidden" name="removeSupplierId" id="removeSupplierId" value="'+response.supplier_id+'" /> ');
				var supplierName = response.supplier_name;
				
				// click on remove button to remove the supplier
				$("#removeSupplierBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeSupplierBtn").button('loading');

					$.ajax({
						url: 'php_action/removeSupplier.php',
						type: 'post',
						data: {supplierId : supplierId , supplierName : supplierName},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeSupplierBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the supplier table 
								manageSupplierTable.ajax.reload(null, false);
								
								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the supplier

				}); // /click on remove button to remove the supplier

			} // /success
		}); // /ajax

		$('.removeSupplierFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove suppliers function
