var dispatchCourierTable;
var dispatchHandTable;

$(document).ready(function() {

	var divRequest = $(".div-request").text();

	// top nav bar 
	$("#navCourier").addClass('active');

	if(divRequest == 'courier')  {
		// add courier	
		// top nav child bar 
		$('#topNavDispatchCourier').addClass('active');	

		dispatchCourierTable = $("#dispatchCourierTable").DataTable({
			'ajax': 'php_action/fetchDispatchCourier.php',
			'courier': []
		});		
					
	
	} else if(divRequest == 'hand') {
		// top nav child bar 
		$('#topNavDispatchCourier').addClass('active');

		dispatchHandTable = $("#dispatchHandTable").DataTable({
			'ajax': 'php_action/fetchDispatchHand.php',
			'courier': []
		});		
					
	}
}); // /documernt

function dispatchCourier(courierId = null) {
	if(courierId) {


		$.ajax({
			url: 'php_action/fetchCourierData.php',
			type: 'post',
			data: {courierId: courierId},
			dataType: 'json',
			success:function(response) {				
				// due 
				$("#finalStatus").val(response.courier[1]);				

				// update payment
				$("#updateDispatchCourierBtn").unbind('click').bind('click', function() {
					var finalStatus = $("#finalStatus").val();


					if(finalStatus == "") {
						$("#finalStatus").after('<p class="text-danger">The final Status field is required</p>');
						$("#finalStatus").closest('.form-group').addClass('has-error');
					} else {
						$("#finalStatus").closest('.form-group').addClass('has-success');
					}

					if(finalStatus) {
						$("#updateDispatchCourierBtn").button('loading');
						$.ajax({
							url: 'php_action/editDispatch.php',
							type: 'post',
							data: {
								courierId: courierId,
								finalStatus: finalStatus,
							},
							dataType: 'json',
							success:function(response) {
								$("#updateDispatchCourierBtn").button('loading');

								// remove error
								$('.text-danger').remove();
								$('.form-group').removeClass('has-error').removeClass('has-success');

								$("#dispatchCourierModal").modal('hide');

								$("#success-messages").html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

								// remove the mesages
			          $(".alert-success").delay(500).show(10, function() {
									$(this).delay(3000).hide(10, function() {
										$(this).remove();
									});
								}); // /.alert	

			          // refresh the manage order table
								dispatchCourierTable.ajax.reload(null, true);

							} //

						});
					} // /if
						
					return false;
				}); // /update payment			
							},
			error: function(xhr, textStatus, error) {
				console.log(xhr.responseText);
				console.log(xhr.statusText);
				console.log(textStatus);
				console.log(error);

			} // /success
		}); // fetch order data
	} else {
		alert('Error ! Refresh the page again');
	}
}
