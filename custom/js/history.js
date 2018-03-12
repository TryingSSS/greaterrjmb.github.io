var manageHistoryTable;

$(document).ready(function() {
	// top bar active
	$('#navHistory').addClass('active');
	
	// manage brand table
	manageHistoryTable = $("#manageHistoryTable").DataTable({
		'ajax': 'php_action/fetchHistory.php',
		'order': []		
	});

});


function removeHistory(historyId = null) {
	if(historyId) {
		$('#removeHistoryId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedHistory.php',
			type: 'post',
			data: {historyId : historyId},
			dataType: 'json',
			success:function(response) {
				$('.removeHistoryFooter').after('<input type="hidden" name="removeHistoryId" id="removeHistoryId" value="'+response.history_id+'" /> ');

				// click on remove button to remove the brand
				$("#removeHistoryBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeHistoryBtn").button('loading');

					$.ajax({
						url: 'php_action/removeHistory.php',
						type: 'post',
						data: {historyId : historyId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeHistoryBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeHistoryModal').modal('hide');

								// reload the History table 
								manageHistoryTable.ajax.reload(null, false);
								
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
					}); // /ajax function to remove the History

				}); // /click on remove button to remove the History

			} // /success
		}); // /ajax

		$('.removeHistoryooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove history function