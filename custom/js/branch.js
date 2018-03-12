var managebranchTable;

$(document).ready(function() {
	// top bar active
	$('#navbranch').addClass('active');
	
	// manage branch table
	managebranchTable = $("#managebranchTable").DataTable({
		'ajax': 'php_action/fetchbranch.php',
		'order': []		
	});

	// submit branch form function
	$("#submitbranchForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var branchName = $("#branchName").val();
		var branchAddress = $("#branchAddress").val();
		var branchContactNumber = $("#branchContactNumber").val();

		if(branchName == "") {
			$("#branchName").after('<p class="text-danger">branch Name field is required</p>');
			$('#branchName').closest('.form-group').addClass('has-error');
		} else {
			// remove error text field
			$("#branchName").find('.text-danger').remove();
			// success out for form 
			$("#branchName").closest('.form-group').addClass('has-success');	  	
		}
		
		if(branchAddress == "") {
			$("#branchAddress").after('<p class="text-danger">Address field is required</p>');
			$('#branchAddress').closest('.form-group').addClass('has-error');
		} else {
			// remove error text field
			$("#branchAddress").find('.text-danger').remove();
			// success out for form 
			$("#branchAddress").closest('.form-group').addClass('has-success');	  	
		}
		
		if(branchContactNumber == "") {
			$("#branchContactNumber").after('<p class="text-danger">Contact Number field is required</p>');
			$('#branchContactNumber').closest('.form-group').addClass('has-error');
		} else {
			// remove error text field
			$("#branchContactNumber").find('.text-danger').remove();
			// success out for form 
			$("#branchContactNumber").closest('.form-group').addClass('has-success');	  	
		}

		if(branchName && branchAddress && branchContactNumber) {
			var form = $(this);
			// button loading
			$("#createbranchBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createbranchBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						managebranchTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitbranchForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-branch-messages').html('<div class="alert alert-success">'+
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
	}); // /submit branch form function

});

function editbranchs(branchId = null) {
	if(branchId) {
		// remove hidden branch id text
		$('#branchId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-branch-result').addClass('div-hide');
		// modal footer
		$('.editbranchFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedbranch.php',
			type: 'post',
			data: {branchId : branchId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-branch-result').removeClass('div-hide');
				// modal footer
				$('.editbranchFooter').removeClass('div-hide');

				// setting the branch name value 
				$('#editbranchName').val(response.branch_name);
				// setting the branch address value
				$('#editbranchAddress').val(response.branch_address);
				// setting the branch contact number value
				$('#editbranchContactNumber').val(response.branch_contact);
				// branch id 
				$(".editbranchFooter").after('<input type="hidden" name="branchId" id="branchId" value="'+response.branch_id+'" />');

				// update branch form 
				$('#editbranchForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var branchName = $('#editbranchName').val();
					var branchAddress = $('#editbranchAddress').val();
					var branchContactNumber = $('#editbranchContactNumber').val();
					
					if(branchName == "") {
						$("#editbranchName").after('<p class="text-danger">branch Name field is required</p>');
						$('#editbranchName').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editbranchName").find('.text-danger').remove();
						// success out for form 
						$("#editbranchName").closest('.form-group').addClass('has-success');	  	
					}

					if(branchAddress == "") {
						$("#editbranchAddress").after('<p class="text-danger">Address field is required</p>');
						$('#editbranchAddress').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editbranchAddress").find('.text-danger').remove();
						// success out for form 
						$("#editbranchAddress").closest('.form-group').addClass('has-success');	  	
					}
					
					if(branchContactNumber == "") {
						$("#editbranchContactNumber").after('<p class="text-danger">Contact Number field is required</p>');
						$('#editbranchContactNumber').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editbranchContactNumber").find('.text-danger').remove();
						// success out for form 
						$("#editbranchContactNumber").closest('.form-group').addClass('has-success');	  	
					}

					if(branchName && branchAddress && branchContactNumber) {
						var form = $(this);
						// submit btn
						$('#editbranchBtn').button('loading');
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
							
								if(response.success == true) {
									
									// submit btn
									$('#editbranchBtn').button('reset');

									// reload the manage member table 
									managebranchTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-branch-messages').html('<div class="alert alert-success">'+
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
				}); // /update branch form

			} // /success
		}); // ajax function

	} else {
		
		alert('error!! Refresh the page again');
	}
} // /edit branchs function

function removebranchs(branchId = null) {
	if(branchId) {
		$('#removebranchId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedbranch.php',
			type: 'post',
			data: {branchId : branchId},
			dataType: 'json',
			success:function(response) {
				$('.removebranchFooter').after('<input type="hidden" name="removebranchId" id="removebranchId" value="'+response.branch_id+'" /> ');
				var branchName = response.branch_name;
				
				// click on remove button to remove the branch
				$("#removebranchBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removebranchBtn").button('loading');

					$.ajax({
						url: 'php_action/removebranch.php',
						type: 'post',
						data: {branchId : branchId , branchName : branchName},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removebranchBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the branch table 
								managebranchTable.ajax.reload(null, false);
								
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
					}); // /ajax function to remove the branch

				}); // /click on remove button to remove the branch

			} // /success
		}); // /ajax

		$('.removebranchFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove branchs function
