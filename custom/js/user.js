var manageUserTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage brand table
	manageUserTable = $("#manageUserTable").DataTable({
		'ajax': 'php_action/fetchUsers.php',
		'order': []		
	});

	// submit brand form function
	$("#submitUserForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var firstName = $("#firstname").val();
		var lastName = $("#lastname").val();
		var username= $("#username").val();
		var password = $("#upassword").val();
		var cpassword = $("#cpassword").val();
		var emailaddress = $("#uemail").val();
		var role = $("#role").val();
		var status = $("#status").val();

		if(firstName == "") {
			$("#firstname").after('<p class="text-danger">First Name field is required</p>');
			$('#firstname').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#firstname").find('.text-danger').remove();
			// success out for form 
			$("#firstname").closest('.form-group').addClass('has-success');	  	
		}
		
		if(lastName == "") {
			$("#lastname").after('<p class="text-danger">Last Name field is required</p>');
			$('#lastname').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#lastname").find('.text-danger').remove();
			// success out for form 
			$("#lastname").closest('.form-group').addClass('has-success');	  	
		}
		
		if(username == "") {
			$("#username").after('<p class="text-danger">Username field is required</p>');
			$('#username').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#username").find('.text-danger').remove();
			// success out for form 
			$("#username").closest('.form-group').addClass('has-success');	  	
		}
		
		if(password == "") {
			$("#upassword").after('<p class="text-danger">Password field is required</p>');
			$('#upassword').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#upassword").find('.text-danger').remove();
			// success out for form 
			$("#upassword").closest('.form-group').addClass('has-success');	  	
		}
		
		if(cpassword == "") {
			$("#cpassword").after('<p class="text-danger">Confirm Password field is required</p>');
			$('#cpassword').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#cpassword").find('.text-danger').remove();
			// success out for form 
			$("#cpassword").closest('.form-group').addClass('has-success');	  	
		}
		
		if(emailaddress == "") {
			$("#uemail").after('<p class="text-danger">Email field is required</p>');
			$('#uemail').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#uemail").find('.text-danger').remove();
			// success out for form 
			$("#uemail").closest('.form-group').addClass('has-success');	  	
		}

		if(role== "") {
			$("#role").after('<p class="text-danger">Role field is required</p>');

			$('#role').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#role").find('.text-danger').remove();
			// success out for form 
			$("#role").closest('.form-group').addClass('has-success');	  	
		}
		
		if(status== "") {
			$("#status").after('<p class="text-danger">Status field is required</p>');

			$('#status').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#status").find('.text-danger').remove();
			// success out for form 
			$("#status").closest('.form-group').addClass('has-success');	  	
		}

		if(firstname && lastname && username && password &&cpassword && emailaddress && role && status) {
			var form = $(this);
			// button loading
			$("#createUserBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createUserBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageUserTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitUserForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-user-messages').html('<div class="alert alert-success">'+
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
	}); // /submit brand form function

});

function editUser(userId = null) {
	if(userId) {
		// remove hidden brand id text
		$('#userId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-user-result').addClass('div-hide');
		// modal footer
		$('.editUserFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedUser.php',
			type: 'post',
			data: {userId : userId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-user-result').removeClass('div-hide');
				// modal footer
				$('.editUserFooter').removeClass('div-hide');

				// setting the brand name value 
				$('#editUserRole').val(response.role);
				// setting the brand status value
				$('#editUserStatus').val(response.status);
				
			
				// brand id 
				$(".editUserFooter").after('<input type="hidden" name="userId" id="userId" value="'+response.user_id+'" />');
				
				// update brand form 
				$('#editUserForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var role = $('#editUserRole').val();
					var status = $('#editUserStatus').val();
				
					if(role== "") {
						$("#editUserRole").after('<p class="text-danger">Role field is required</p>');

						$('#editUserRole').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUserRole").find('.text-danger').remove();
						// success out for form 
						$("#editUserRole").closest('.form-group').addClass('has-success');	  	
					}
		
					if(status== "") {
						$("#editUserStatus").after('<p class="text-danger">Status field is required</p>');

						$('#editUserStatus').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUserStatus").find('.text-danger').remove();
						// success out for form 
						$("#editUserStatus").closest('.form-group').addClass('has-success');	  	
					}				

					if(role && status) {
						var form = $(this);

						// submit btn
						$('#editUserBtn').button('loading');
						console.log("Success");
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editUserBtn').button('reset');

									// reload the manage member table 
									manageUserTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-user-messages').html('<div class="alert alert-success">'+
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
				}); // /update user form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit user function

function removeUser(userId = null) {
	if(userId) {
		$('#removeUserId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedUser.php',
			type: 'post',
			data: {userId : userId},
			dataType: 'json',
			success:function(response) {
				$('.removeUserFooter').after('<input type="hidden" name="removeUserId" id="removeUserId" value="'+response.user_id+'" /> ');
				var username = response.username;
				
				// click on remove button to remove the brand
				$("#removeUserBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeUserBtn").button('loading');

					$.ajax({
						url: 'php_action/removeUser.php',
						type: 'post',
						data: {userId : userId , username : username},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeUserBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeUserModal').modal('hide');

								// reload the brand table 
								manageUserTable.ajax.reload(null, false);
								
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
					}); // /ajax function to remove the brand

				}); // /click on remove button to remove the brand

			} // /success
		}); // /ajax

		$('.removeUserFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove users function

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};