<?php 	

require_once 'core.php';

$sql = "SELECT d.courier_id, courier.req_date, d.dis_date, courier.dept_name, courier.dispatch_center, d.cour_comp, d.pod, d.courier_status FROM courier, dispatch d WHERE courier.courier_id = d.courier_id and d.mode=1";
$result = $connect->query($sql);



$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $courierStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$courierId = $row[0];


		
	
 	// active 
 	if($row[7] == 1) { 		
 		$courierStatus = "<label class='label label-warning'>Dispatched</label>";
 	} else if($row[7] == 2) { 		
 		$courierStatus = "<label class='label label-info'>In-Transit</label>";
 	} else { 		
 		$courierStatus = "<label class='label label-success'>Delivered</label>";
 	} // /else
		
 	if($row[5] == 1) { 		
 		$courierService = "First Flight";
 	} else if($row[5] == 2) { 		
 		$courierService = "Blue Dart";
 	} else if($row[5] == 3) { 		
 		$courierService = "DTDC";
 	} else { 		
 		$courierService = "Others";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
		<button type="button" class="btn btn-default" data-toggle="modal" id="dispatchCourierModalBtn" data-target="#dispatchCourierModal" onclick="dispatchCourier('.$courierId.')"> <i class="fas fa-wrench">&nbsp;</i> Update Status
	  </button>
	    
	    
	</div>';		

 	$output['data'][] = array( 		
 		// image
 		$row[0],
 		// order date
 		$row[1],
 		// client name
 		$row[2], 
 		// client contact
 		$row[3], 		 	
 		// client contact
 		$row[4], 		 	
 		$courierService, 		 	
 		$row[6], 		 	
 		$courierStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);