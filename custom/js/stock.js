$(document).ready(function() {
	// top bar active
	$('#navStock').addClass('active');
	// manage brand table
	
	manageStockTable = $("#manageStockTable").DataTable({
		'ajax': 'php_action/fetchStock.php',
		'order': []		
	});
	// submit brand form function
	$("#submitStockForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var productName = $("#productName").val();
		var quantity = $("#quantity").val();

		if(productName == "") {
			$("#productName").after('<p class="text-danger">Product Name field is required</p>');
			$('#productName').closest('.form-group').addClass('has-error');
		} else {
			// remove error text field
			$("#productName").find('.text-danger').remove();
			// success out for form 
			$("#productName").closest('.form-group').addClass('has-success');	  	
		}

		if(quantity == "") {
			$("#quantity").after('<p class="text-danger">Quantity field is required</p>');

			$('#quantity').closest('.form-group').addClass('has-error');
		} else {
			// remove error text field
			$("#quantity").find('.text-danger').remove();
			// success out for form 
			$("#quantity").closest('.form-group').addClass('has-success');	  	
		}

		if(productName && quantity) {
			var form = $(this);
			// button loading
			$("#addStockBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#addStockBtn").button('reset');
					
					if(response.success == true) {
						// reload the manage member table 
						manageBrandTable.ajax.reload(null, false);	

  	  			// reset the form text
						$("#submitStockForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-stock-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					} // if

				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit brand form function

});

function editStock(productId = null) {
	if(productId) {
		// remove hidden brand id text
		$('#productId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-stock-result').addClass('div-hide');
		// modal footer
		$('.editStockFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedStock.php',
			type: 'post',
			data: {productId : productId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-stock-result').removeClass('div-hide');
                // modal footer
				$('.editStockFooter').removeClass('div-hide');
				
				// setting the brand name value 
				$('#editproductName').val(response.product_name);
				// setting the brand status value
				$('#stockStatus').val(response.deliveryStatus);
				// product id 
				$(".editStockFooter").after('<input type="hidden" name="productId" id="productId" value="'+response.product_id+'" />');

				// update brand form 
				$('#editStockForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var productName = $('#editproductName').val();
					var stockStatus = $('#stockStatus').val();
					
					if(productName == "") {
						$("#editproductName").after('<p class="text-danger">Product Name field is required</p>');
						$('#editproductName').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editproductName").find('.text-danger').remove();
						// success out for form 
						$("#editproductName").closest('.form-group').addClass('has-success');	  	
					}

					if(stockStatus == "") {
						$("#stockStatus").after('<p class="text-danger">Status field is required</p>');

						$('#stockStatus').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#stockStatus").find('.text-danger').remove();
						// success out for form 
						$("#stockStatus").closest('.form-group').addClass('has-success');	  	
					}

					if(productName && stockStatus) {
						var form = $(this);

						// submit btn
						$('#editStockBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editStockBtn').button('reset');

									// reload the manage member table 
									manageStockTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-stock-messages').html('<div class="alert alert-success">'+
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
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit function


