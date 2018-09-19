<?php 	

require_once 'core.php';

$sql = "SELECT courier_id, req_date, req_by, dept_name, part_name, dispatch_center, courier_status FROM courier WHERE status = 1";
$result = $connect->query($sql);



$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $courierStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$courierId = $row[0];

 	$countCourierItemSql = "SELECT count(*) FROM courier_item WHERE courier_id = $courierId";
 	$itemCountResult = $connect->query($countCourierItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();


 	// active 
 	if($row[6] == 1) { 		
 		$courierStatus = "<label class='label label-success'>Packed</label>";
 	} else if($row[6] == 2) { 		
 		$courierStatus = "<label class='label label-info'>Initiated</label>";
 	} else { 		
 		$courierStatus = "<label class='label label-warning'>Dispatched</label>";
 	} // /else
		
 	if($row[4] == 1) { 		
 		$particularType = "Documents";
 	} else if($row[4] == 2) { 		
 		$particularType = "Assets";
 	} else { 		
 		$particularType = "Mixed";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default" data-toggle="modal" id="dispatchCourierModalBtn" data-target="#dispatchCourierModal" onclick="DispatchCourier('.$courierId.')"> <i class="fas fa-wrench">&nbsp;</i> Update Status
	  </button>
	</div>';		

 	$output['data'][] = array( 		
 		// image
 		$x,
 		// order date
 		$row[1],
 		// client name
 		$row[2], 
 		// client contact
 		$row[3], 		 	
 		// client contact
 		$particularType, 		 	
 		$row[5], 		 	
 		$itemCountRow, 		 	
 		$courierStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);