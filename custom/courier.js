var manageCourierTable;

$(document).ready(function() {

	var divRequest = $(".div-request").text();

	// top nav bar 
	$("#navCourier").addClass('active');

	if(divRequest == 'add')  {
		// add courier	
		// top nav child bar 
		$('#topNavAddCourier').addClass('active');	

		// courier date picker
		$("#reqDate").datepicker();

		// create courier form function
		$("#createCourierForm").unbind('submit').bind('submit', function() {
			var form = $(this);

			$('.form-group').removeClass('has-error').removeClass('has-success');
			$('.text-danger').remove();
				
			var reqDate = $("#reqDate").val();
			var reqBy = $("#reqBy").val();
			var deptName = $("#deptName").val();
			var compName = $("#compName").val();
			var cityName = $("#cityName").val();
			var particularType = $("#particularType").val();
			var dispatchCenter = $("#dispatchCenter").val();
			var challan = $("#challan").val();		
			var invValue = $("#invValue").val();		
			var courierStatus = $("#courierStatus").val();		

			// form validation 
			if(reqDate == "") {
				$("#reqDate").after('<p class="text-danger"> Please provide Requisition Date </p>');
				$('#reqDate').closest('.form-group').addClass('has-error');
			} else {
				$('#reqDate').closest('.form-group').addClass('has-success');
			} // /else

			if(reqBy == "") {
				$("#reqBy").after('<p class="text-danger"> Please provide Requisition By whom </p>');
				$('#reqBy').closest('.form-group').addClass('has-error');
			} else {
				$('#reqBy').closest('.form-group').addClass('has-success');
			} // /else

			if(deptName == "") {
				$("#deptName").after('<p class="text-danger"> Please provide Department Name </p>');
				$('#deptName').closest('.form-group').addClass('has-error');
			} else {
				$('#deptName').closest('.form-group').addClass('has-success');
			} // /else

			if(compName == "") {
				$("#compName").after('<p class="text-danger"> Please provide Company Name </p>');
				$('#compName').closest('.form-group').addClass('has-error');
			} else {
				$('#compName').closest('.form-group').addClass('has-success');
			} // /else

			if(cityName == "") {
				$("#cityName").after('<p class="text-danger"> Please provide City Name </p>');
				$('#cityName').closest('.form-group').addClass('has-error');
			} else {
				$('#cityName').closest('.form-group').addClass('has-success');
			} // /else
				
			if(particularType == "") {
				$("#particularType").after('<p class="text-danger"> Please provide Particular Name </p>');
				$('#particularType').closest('.form-group').addClass('has-error');
			} else {
				$('#particularType').closest('.form-group').addClass('has-success');
			} // /else

			if(dispatchCenter == "") {
				$("#dispatchCenter").after('<p class="text-danger"> Please provide Dispatch Center</p>');
				$('#dispatchCenter').closest('.form-group').addClass('has-error');
			} else {
				$('#dispatchCenter').closest('.form-group').addClass('has-success');
			} // /else

			if(challan == "") {
				$("#challan").after('<p class="text-danger"> Please provide Challan No. </p>');
				$('#challan').closest('.form-group').addClass('has-error');
			} else {
				$('#challan').closest('.form-group').addClass('has-success');
			} // /else
			if(invValue == "") {
				$("#invValue").after('<p class="text-danger"> Please provide Invoice Value </p>');
				$('#invValue').closest('.form-group').addClass('has-error');
			} else {
				$('#invValue').closest('.form-group').addClass('has-success');
			} // /else
				
			if(courierStatus == "") {
				$("#courierStatus").after('<p class="text-danger"> Please assign Courier Status </p>');
				$('#courierStatus').closest('.form-group').addClass('has-error');
			} else {
				$('#courierStatus').closest('.form-group').addClass('has-success');
			} // /else


			// array validation
			var itemDescription = document.getElementsByName('description[]');				
			var validateitemcode;
			for (var x = 0; x < itemDescription.length; x++) {       			
				var itemDescriptionId = itemDescription[x].id;	    	
		    if(itemDescription[x].value == ''){	    		    	
		    	$("#"+itemDescriptionId+"").after('<p class="text-danger"> Please enter details of Particular. </p>');
		    	$("#"+itemDescriptionId+"").closest('.form-group').addClass('has-error');	    		    	    	
	      } else {      	
		    	$("#"+itemDescriptionId+"").closest('.form-group').addClass('has-success');	    		    		    	
	      }          
	   	} // for

	   	for (var x = 0; x < itemDescription.length; x++) {       						
		    if(itemDescription[x].value){	    		    		    	
		    	validateitemcode = true;
	      } else {      	
		    	validateitemcode = false;
	      }          
	   	} // for       		   	
	   	
	   	var quantity = document.getElementsByName('quantity[]');		   	
	   	var validateQuantity;
	   	for (var x = 0; x < quantity.length; x++) {       
	 			var quantityId = quantity[x].id;
		    if(quantity[x].value == ''){	    	
		    	$("#"+quantityId+"").after('<p class="text-danger"> Please enter details of Particular. </p>');
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-error');	    		    		    	
	      } else {      	
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-success');	    		    		    		    	
	      } 
	   	}  // for

	   	for (var x = 0; x < quantity.length; x++) {       						
		    if(quantity[x].value){	    		    		    	
		    	validateQuantity = true;
	      } else {      	
		    	validateQuantity = false;
	      }          
	   	} // for       	


	   	

			if(reqDate && reqBy && deptName && compName && cityName && particularType && dispatchCenter && challan && invValue && dispatchCenter) {
				if(validateitemcode == true && validateQuantity == true) {
					// create courier button
					 //$("#createCourierBtn").button('loading');
					
						
					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// reset button
							$("#createCourierBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) {
								
								// create order button
								$(".success-messages").html('<div class="alert alert-success">'+
	            	'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            	'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	            	' <br /> <br />'+
	            	'<a href="courier.php?o=add" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Courier </a>'+
	            	
	   		       '</div>');
								
							$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

							// disabled te modal footer button
							$(".submitButtonFooter").addClass('div-hide');
							// remove the product row
							$(".removeItemRowBtn").addClass('div-hide');
								
							} else {
								alert(response.messages);								
							}
						} // /response
					}); // /ajax
				} // if array validate is true
			} // /if field validate is true
			

			return false;
		}); // /create courier form function	
	
	} else if(divRequest == 'mancour') {	
		// top nav child bar 
		$('#topNavManageCourier').addClass('active');

		manageCourierTable = $("#manageCourierTable").DataTable({
			'ajax': 'php_action/fetchCourier.php',
			'courier': []
		});		
					
	} else if(divRequest == 'editcour') {
		$("#reqDate").datepicker();

		// edit courier form function
		$("#editCourierForm").unbind('submit').bind('submit', function() {
			// alert('ok');
			var form = $(this);

			$('.form-group').removeClass('has-error').removeClass('has-success');
			$('.text-danger').remove();
				
			var reqDate = $("#reqDate").val();
			var reqBy = $("#reqBy").val();
			var deptName = $("#deptName").val();
			var compName = $("#compName").val();
			var cityName = $("#cityName").val();
			var particularType = $("#particularType").val();
			var dispatchCenter = $("#dispatchCenter").val();
			var challan = $("#challan").val();		
			var invValue = $("#invValue").val();		
			var courierStatus = $("#courierStatus").val();		

			// form validation 
			if(reqDate == "") {
				$("#reqDate").after('<p class="text-danger"> Please provide Requisition Date </p>');
				$('#reqDate').closest('.form-group').addClass('has-error');
			} else {
				$('#reqDate').closest('.form-group').addClass('has-success');
			} // /else

			if(reqBy == "") {
				$("#reqBy").after('<p class="text-danger"> Please provide Requisition By whom </p>');
				$('#reqBy').closest('.form-group').addClass('has-error');
			} else {
				$('#reqBy').closest('.form-group').addClass('has-success');
			} // /else

			if(deptName == "") {
				$("#deptName").after('<p class="text-danger"> Please provide Department Name </p>');
				$('#deptName').closest('.form-group').addClass('has-error');
			} else {
				$('#deptName').closest('.form-group').addClass('has-success');
			} // /else

			if(compName == "") {
				$("#compName").after('<p class="text-danger"> Please provide Company Name </p>');
				$('#compName').closest('.form-group').addClass('has-error');
			} else {
				$('#compName').closest('.form-group').addClass('has-success');
			} // /else

			if(cityName == "") {
				$("#cityName").after('<p class="text-danger"> Please provide City Name </p>');
				$('#cityName').closest('.form-group').addClass('has-error');
			} else {
				$('#cityName').closest('.form-group').addClass('has-success');
			} // /else
				
			if(particularType == "") {
				$("#particularType").after('<p class="text-danger"> Please provide Particular Name </p>');
				$('#particularType').closest('.form-group').addClass('has-error');
			} else {
				$('#particularType').closest('.form-group').addClass('has-success');
			} // /else

			if(dispatchCenter == "") {
				$("#dispatchCenter").after('<p class="text-danger"> Please provide Dispatch Center</p>');
				$('#dispatchCenter').closest('.form-group').addClass('has-error');
			} else {
				$('#dispatchCenter').closest('.form-group').addClass('has-success');
			} // /else

			if(challan == "") {
				$("#challan").after('<p class="text-danger"> Please provide Challan No. </p>');
				$('#challan').closest('.form-group').addClass('has-error');
			} else {
				$('#challan').closest('.form-group').addClass('has-success');
			} // /else
			if(invValue == "") {
				$("#invValue").after('<p class="text-danger"> Please provide Invoice Value </p>');
				$('#invValue').closest('.form-group').addClass('has-error');
			} else {
				$('#invValue').closest('.form-group').addClass('has-success');
			} // /else
				
			if(courierStatus == "") {
				$("#courierStatus").after('<p class="text-danger"> Please assign Courier Status </p>');
				$('#courierStatus').closest('.form-group').addClass('has-error');
			} else {
				$('#courierStatus').closest('.form-group').addClass('has-success');
			} // /else


			// array validation
			var itemDescription = document.getElementsByName('description[]');				
			var validateitemcode;
			for (var x = 0; x < itemDescription.length; x++) {       			
				var itemDescriptionId = itemDescription[x].id;	    	
		    if(itemDescription[x].value == ''){	    		    	
		    	$("#"+itemDescriptionId+"").after('<p class="text-danger"> Please enter details of Particular. </p>');
		    	$("#"+itemDescriptionId+"").closest('.form-group').addClass('has-error');	    		    	    	
	      } else {      	
		    	$("#"+itemDescriptionId+"").closest('.form-group').addClass('has-success');	    		    		    	
	      }          
	   	} // for

	   	for (var x = 0; x < itemDescription.length; x++) {       						
		    if(itemDescription[x].value){	    		    		    	
		    	validateitemcode = true;
	      } else {      	
		    	validateitemcode = false;
	      }          
	   	} // for       		   	
	   	
	   	var quantity = document.getElementsByName('quantity[]');		   	
	   	var validateQuantity;
	   	for (var x = 0; x < quantity.length; x++) {       
	 			var quantityId = quantity[x].id;
		    if(quantity[x].value == ''){	    	
		    	$("#"+quantityId+"").after('<p class="text-danger"> Please enter details of Particular. </p>');
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-error');	    		    		    	
	      } else {      	
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-success');	    		    		    		    	
	      } 
	   	}  // for

	   	for (var x = 0; x < quantity.length; x++) {       						
		    if(quantity[x].value){	    		    		    	
		    	validateQuantity = true;
	      } else {      	
		    	validateQuantity = false;
	      }          
	   	} // for       	
	   	

			if(reqDate && reqBy && deptName && compName && cityName && particularType && dispatchCenter && challan && invValue && dispatchCenter) {
				if(validateitemcode == true && validateQuantity == true) {
					// create courier button
					// $("#createCourierBtn").button('loading');

					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// reset button
							$("#editCourierBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) {
								
								// create courier button
								$(".success-messages").html('<div class="alert alert-success">'+
	            	'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            	'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +' <br /> <br />'+
	            	'<a href="courier.php?o=mancour" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-edit"></i> Edit Other Courier </a>'+	            		            		            	
	   		       '</div>');
								
							$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

							// disabled te modal footer button
							$(".editButtonFooter").addClass('div-hide');
							// remove the product row
							$(".removeItemRowBtn").addClass('div-hide');
								
							} else {
								alert(response.messages);								
							}
						} // /response
					}); // /ajax
				} // if array validate is true
			} // /if field validate is true
			

			return false;
		}); // /dispatch courier modal function	
	} else if(divRequest == 'dispatchcour') {
		
		$("#disDate").datepicker();
		
		
		// dispatch courier form function
		$("#dispatchCourierForm").unbind('submit').bind('submit', function() {
			 //alert('ok');
			var form = $(this);

			$('.form-group').removeClass('has-error').removeClass('has-success');
			$('.text-danger').remove();
				
			var reqDate = $("#reqDate").val();
			var disDate = $("#disDate").val();
			var mode = $("#mode").val();
			var courierComp = $("#courierComp").val();
			var pod = $("#pod").val();
			var empId = $("#empId").val();
			var empName = $("#empName").val();
			var weight = $("#weight").val();
			var finalStatus = $("#finalStatus").val();		
			//alert('ok');
			//alert(disDate);
			
			
			// form validation 
			if(disDate == "") {
				$("#disDate").after('<p class="text-danger"> Please provide Dispatch Date </p>');
				$('#disDate').closest('.form-group').addClass('has-error');
			} else {
				$('#disDate').closest('.form-group').addClass('has-success');
			} // /else
				
			if(mode == "") {
				$("#mode").after('<p class="text-danger"> Please provide Mode of Dispatch </p>');
				$('#mode').closest('.form-group').addClass('has-error');
			} else {
				$('#mode').closest('.form-group').addClass('has-success');
			} // /else
				
			if(mode == "1") {
				$("#mode").after('<p class="text-danger"> Please provide details of Dispatch </p>');
				$('#mode').closest('.form-group').addClass('has-error');
			} else {
				$('#mode').closest('.form-group').addClass('has-success');
			} // /else
				
			if(mode == "2") {
				$("#mode").after('<p class="text-danger"> Please provide details of Dispatch </p>');
				$('#mode').closest('.form-group').addClass('has-error');
			} else {
				$('#mode').closest('.form-group').addClass('has-success');
			} // /else

			/*if(courierComp == "") {
				$("#courierComp").after('<p class="text-danger"> Please provide Courier Service Name </p>');
				$('#courierComp').closest('.form-group').addClass('has-error');
			} else {
				$('#courierComp').closest('.form-group').addClass('has-success');
			} // /else

			if(pod == "") {
				$("#pod").after('<p class="text-danger"> Please provide POD No. </p>');
				$('#pod').closest('.form-group').addClass('has-error');
			} else {
				$('#pod').closest('.form-group').addClass('has-success');
			} // /else
				
			if(empId == "") {
				$("#empId").after('<p class="text-danger"> Please provide Employee ID </p>');
				$('#empId').closest('.form-group').addClass('has-error');
			} else {
				$('#empId').closest('.form-group').addClass('has-success');
			} // /else

			if(empName == "") {
				$("#empName").after('<p class="text-danger"> Please provide Employee Name</p>');
				$('#empName').closest('.form-group').addClass('has-error');
			} else {
				$('#empName').closest('.form-group').addClass('has-success');
			} // /else*/

			if(weight == "") {
				$("#weight").after('<p class="text-danger"> Please provide Weight of Courier </p>');
				$('#weight').closest('.form-group').addClass('has-error');
			} else {
				$('#weight').closest('.form-group').addClass('has-success');
			} // /else
			if(finalStatus == "") {
				$("#finalStatus").after('<p class="text-danger"> Please provide Dispatch Status Value </p>');
				$('#finalStatus').closest('.form-group').addClass('has-error');
			} else {
				$('#finalStatus').closest('.form-group').addClass('has-success');
			} // /else
				


	   	

			if(disDate && mode && courierComp && pod && weight && finalStatus) {
					// create courier button
					// $("#createCourierBtn").button('loading');

					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// reset button
							$("#dispatchCourierBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) {
								
								// create courier button
								$(".success-messages").html('<div class="alert alert-success">'+
								'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +' <br /> <br />'+
								'<a href="courier.php?o=mancour" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-wrench"></i> Update Other Courier </a>'+
	            		            		            	
							   '</div>');
								
							$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

							// disabled te modal footer button
							$(".editButtonFooter").addClass('div-hide');
								
							} else {
								alert(response.messages);								
							}
						} // // /response
					}); // /ajax
			} // /if field validate is true
			else if(disDate && mode && empId && empName && weight && finalStatus){
					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// reset button
							$("#dispatchCourierBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) {
								
								// create courier button
								$(".success-messages").html('<div class="alert alert-success">'+
								'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +' <br /> <br />'+
								'<a href="courier.php?o=mancour" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-wrench"></i> Update Other Courier </a>'+
	            		            		            	
							   '</div>');
								
							$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

							// disabled te modal footer button
							$(".editButtonFooter").addClass('div-hide');
								
							} else {
								alert(response.messages);								
							}
						} // // /response
					}); // /ajax
				
			}

			return false;
		}); // /dispatch courier modal function	
	}
}); // /documernt





function addRow() {
	$("#addRowBtn").button("loading");

	var tableLength = $("#particularTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) {		
		tableRow = $("#particularTable tbody tr:last").attr('id');
		arrayNumber = $("#particularTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
	} else {
		// no table row
		count = 1;
		arrayNumber = 0;
	}
		$.ajax({
		url: 'php_action/fetchItemData.php',
		type: 'post',
		dataType: 'json',
		success:function(response) {

			$("#addRowBtn").button("reset");			

			var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
				'<td>'+
						'<select class="form-control" name="description[]" id="description'+count+'" onchange="getItemData('+count+')" >'+
						'<option value="">~~SELECT~~</option>';
						 //console.log(response);
						$.each(response, function(index, value) {
							tr += '<option value="'+value[0]+'">'+value[1]+'</option>';							
						});
													
					tr += '</select>'+
				'</td>'+
				'<td>'+
					'<input type="text" name="itemcode[]" id="itemcode'+count+'" autocomplete="off" disabled="true" class="form-control"/>'+
					'<input type="hidden" name="itemcodeValue[]" id="itemcodeValue'+count+'" autocomplete="off"  class="form-control" />'+
				'</td>'+
				'<td>'+
					'<input type="number" name="amount[]" id="amount'+count+'"  autocomplete="off" class="form-control" min="1" />'+
				'</td>'+
				'<td>'+
					'<input type="number" name="unit[]" id="unit'+count+'" autocomplete="off" class="form-control" min="1" />'+
				'</td>'+
				'<td>'+
					'<input type="number" name="quantity[]" id="quantity'+count+'" autocomplete="off" class="form-control"  />'+
				'</td>'+
				'<td>'+
					'<button class="btn btn-default removeItemRowBtn" type="button"  onclick="removeItemRow('+count+')"><i class="fas fa-trash">&nbsp;</i></button>'+
				'</td>'+
			'</tr>';
			if(tableLength > 0) {							
				$("#particularTable tbody tr:last").after(tr);
			} else {				
				$("#particularTable tbody").append(tr);
			}
		} // /success
	});	// get the product data
} // /add row

function removeItemRow(row = null) {
	if(row) {
		$("#row"+row).remove();


	} else {
		alert('error! Refresh the page again');
	}
}


function fun_showtextbox()
{
    var select_status=$('#mode').val();
    /* if select hand from select box then show my text box */
    //alert(select_status);
if(select_status == '1')
    {
        $('#byCourier').show();// By using this id you can show your content    
    }
    else
    {
        $('#byCourier').hide();// otherwise hide   
    }
	
if(select_status == '2')
    {
        $('#byHand').show();// By using this id you can show your content    
    }
    else
    {
        $('#byHand').hide();// otherwise hide   
    }
    
}

// select on product data
function getItemData(row = null) {
	if(row) {
		var itemId = $("#description"+row).val();	
					//alert(itemId);
		
		if(itemId == "") {
			$("#itemcode"+row).val("");



		} else {
			$.ajax({
				url: 'php_action/fetchSelectedItem.php',
				type: 'post',
				data: {itemId : itemId},
				dataType: 'json',
				success:function(response) {
					// setting the itemcode value into the itemcode input field
					$("#itemcode"+row).val(response.item_code);
					$("#itemcodeValue"+row).val(response.item_code);

					$("#quantity"+row).val(1);
				} // /success
			}); // /ajax function to fetch the item data	
		}
				
	} else {
		alert('no row! please refresh the page');
	}
} // /select on item data




function resetCourierForm() {
	// reset the input field
	$("#createCourierForm")[0].reset();
	// remove remove text danger
	$(".text-danger").remove();
	// remove form group error 
	$(".form-group").removeClass('has-success').removeClass('has-error');
} // /reset courier form


function resetdispatchCourierForm() {
	// reset the input field
	$("#dispatchCourierForm")[0].reset();
	// remove remove text danger
	$(".text-danger").remove();
	// remove form group error 
	$(".form-group").removeClass('has-success').removeClass('has-error');
} // /reset courier form

// remove order from server
function removeCourier(courierId = null) {
	if(courierId) {
		$("#removeCourierBtn").unbind('click').bind('click', function() {
			$("#removeCourierBtn").button('loading');

			$.ajax({
				url: 'php_action/removeCourier.php',
				type: 'post',
				data: {courierId : courierId},
				dataType: 'json',
				success:function(response) {
					$("#removeCourierBtn").button('reset');

					if(response.success == true) {

						manageCourierTable.ajax.reload(null, false);
						// hide modal
						$("#removeCourierModal").modal('hide');
						// success messages
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

					} else {
						// error messages
						$(".removeCourierMessages").html('<div class="alert alert-warning">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          
					} // /else

				} // /success
			});  // /ajax function to remove the order

		}); // /remove order button clicked
		

	} else {
		alert('error! refresh the page again');
	}
}
// /remove order from server


function dateCheck() {

    var disDate,reqDate;
    disDate = Date.parse(document.getElementById("disDate").value);
    reqDate = Date.parse(document.getElementById("reqDate").value);

    if(reqDate > disDate) {
    alert("Dispatch Date can not be less than Requisition date");
    return false;
    } 

}


