// Validation of all pages
$(document).ready(function() {	
		// start date picker
	$("#startDate").datepicker();
	// end date picker
	$("#endDate").datepicker();

//courier report
$('#getCourierReportForm').bootstrapValidator({
	message: 'This value is not valid',
	fields: {
		startDate: {
			validators: {
				notEmpty: {
					message: 'Start Date is required and cannot be empty'
				},
			}
		},
		endDate: {
			validators: {
				notEmpty: {
					message: 'End Date is required and cannot be empty'
				},
			}
		},
	}
});
	 $('.startDate').on('changeDate show', function(e) {
           $('#getCourierReportForm').bootstrapValidator('revalidateField', 'startDate');
         });
	 $('.endDate').on('changeDate show', function(e) {
           $('#getCourierReportForm').bootstrapValidator('revalidateField', 'endDate');
         });
});


